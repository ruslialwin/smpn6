<?php
    session_start();

    error_reporting(0);

    if(empty($_SESSION['admin_id'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data admin pada halaman dashboard admin */
    $admin = "SELECT username, nama_lengkap FROM akun_admin WHERE admin_id = '".$_SESSION['admin_id']."'";
    $data_admin = mysqli_query($koneksi, $admin);

    $get = mysqli_fetch_object($data_admin); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pengaturan Data Kelas - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Pengaturan Kelas</h2>
                    <a class="btn btn-info mb-3" href="tambah-pengaturankelas.php">Tambah Data</a>
                    <a class="btn btn-warning mb-3" href="restore-kelas.php">Restore Data</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Pengaturan Kelas
                        </div>
                        <div class="card-body">
                            <form action="" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col">
                                    <label for="idtahunajar">Tahun Pelajaran</label> <br>
                                    <?php $tid = $_GET['idtahunajar']; ?>
                                    <select name="idtahunajar" required class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        $tahun = mysqli_query($koneksi, "SELECT id, tahun_pelajaran, semester FROM tahun_pelajaran");
                                        while($data = mysqli_fetch_array($tahun)){
                                        ?>
                                        <option value="<?php echo $data['id']?>" <?php echo ($tid == $data['id']) ?'selected': '';?>>
                                            <?php echo $data['tahun_pelajaran']?> - <?php echo $data['semester']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col mt-2 pl-auto mb-3">
                                    <input type="submit" class="btn btn-success mt-3 mx-3" name="pilih" value="OK" >
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                </div>
                            </form>
                            <?php
                            if (isset($_GET['pilih'])) {
                                $idtahunajar = $_GET['idtahunajar'];
                                $select = mysqli_query($koneksi, "SELECT tahun_pelajaran, semester FROM tahun_pelajaran WHERE id = $idtahunajar");
                                $datata = mysqli_fetch_array($select);
                                $ta = $datata['tahun_pelajaran'];
                                $sem = $datata['semester'];
                                ?>
                            
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Kelas</th>
                                        <!-- <th>Tahun Pelajaran</th>
                                        <th>Semester</th> -->
                                        <th>Wali Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;

                                /*  query menampilkan data pengaturan kelas di halaman admin */
                                /*  $datapengaturankelas = "SELECT p.id id_atur, k.nama kelas, t.tahun_pelajaran tahun_pelajaran, t.semester, g.nama_lengkap walikelas FROM pengaturan_kelas p 
                                JOIN kelas k ON k.id = p.id_kelas JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran JOIN guru g ON g.id = p.id_guru"; */

                                $datapengaturankelas = "SELECT id_atur, kelas, tahun_pelajaran, semester, walikelas FROM walikelas WHERE tahun_pelajaran = '$ta' AND semester = '$sem'";

                                $kelas = mysqli_query($koneksi, $datapengaturankelas);
                                if (mysqli_num_rows($kelas) > 0) {
                                    while ($data = mysqli_fetch_array($kelas)) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['kelas'] ?></td>
                                        <!-- <td><?php echo $data['tahun_pelajaran'] ?></td>
                                        <td><?php echo $data['semester'] ?></td> -->
                                        <td><?php echo $data['walikelas'] ?></td>
                                        <td>
                                            <!-- query update pada update-pengaturankelas.php -->
                                            <a class="btn btn-success" href="update-pengaturankelas.php?idpengaturankelas=<?php echo $data['id_atur'] ?>">Edit</a>
                                            <!-- query delete pada process.php -->
                                            <a class="btn btn-danger" href="process.php?deletepengaturankelas=<?php echo $data['id_atur'] ?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                                }
                            } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php 
                include 'footer.php';
            ?>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
