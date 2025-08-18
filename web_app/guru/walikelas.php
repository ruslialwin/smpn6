<?php
    session_start();

    if(empty($_SESSION['id_guru'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data akun guru pada halaman dashboard guru */
    $guru = "SELECT a.username, g.nama_lengkap FROM akun_guru a JOIN guru g ON g.id = a.id_guru WHERE id_guru = '".$_SESSION['id_guru']."'";
    $data_guru = mysqli_query($koneksi, $guru);

    $get = mysqli_fetch_object($data_guru); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data WaliKelas - Halaman Guru</title>
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
                    <h2 class="mt-4">Data Wali Kelas</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Wali Kelas
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Kelas</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Wali Kelas</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data pengaturan kelas di halaman admin */
                                   /*  $datapengaturankelas = "SELECT p.id id_atur, k.nama kelas, t.tahun_pelajaran tahun_pelajaran, t.semester, g.nama_lengkap walikelas FROM pengaturan_kelas p 
                                    JOIN kelas k ON k.id = p.id_kelas JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran JOIN guru g ON g.id = p.id_guru"; */

                                    $datawalikelas = "SELECT v.id_atur, v.kelas, v.tahun_pelajaran, v.semester, v.walikelas, p.id id_kelas FROM walikelas v JOIN pengaturan_kelas p ON p.id = v.id_atur WHERE id_guru = '".$_SESSION['id_guru']."' ";

                                    $kelas=mysqli_query($koneksi, $datawalikelas);
                                    if(mysqli_num_rows($kelas)>0){
                                    while($data = mysqli_fetch_array($kelas)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['kelas']?></td>
                                        <td><?php echo $data['tahun_pelajaran']?></td>
                                        <td><?php echo $data['semester']?></td>
                                        <td><?php echo $data['walikelas']?></td>
                                        <td>
                                            <!-- query detail kelas pada update-pengaturankelas.php -->
                                            <a class="btn btn-info" href="detail-kelas.php?idkelas=<?php echo $data['id_kelas']?>">Detail Kelas</a>
                                        </td>
                                    </tr>
                                <?php }} ?>
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
