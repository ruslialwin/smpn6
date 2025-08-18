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
        <title>Pengaturan Data Nilai Siswa - Halaman Admin</title>
    
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
     <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Pengaturan Nilai Siswa</h2>
                    <a class="btn btn-info mb-3" href="tambah-nilaisiswa.php">Tambah Data</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Pengaturan Nilai Siswa
                        </div>
                        <div class="card-body">
                            <form action="" method="GET" enctype="multipart/form-data">
                                
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
                    
                              
                                    <input type="submit" class="btn btn-success mt-3 mb-3 px-3" name="pilih" value="OK" >
                           
                               
                            </form>
                            <?php
                            if (isset($_GET['pilih'])) {
                                $idtahunajar = $_GET['idtahunajar'];
                            ?>
                            <table id="example" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai Pengetahuan</th>
                                        <th>Nilai Keterampilan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;

                                /*  query menampilkan data nilai siswa di halaman admin */
                               /*  $nilaisiswa = "SELECT n.id id_nilai_siswa, s.nis, s.nama_lengkap nama_siswa, k.nama kelas, m.nama nama_mapel, n.nilai 
                                    FROM nilai_siswa n JOIN siswa s ON s.id = n.id_siswa JOIN pengaturan_kelas_siswa pks ON pks.id_siswa = n.id_siswa JOIN pengaturan_kelas pk ON pk.id = pks.id_pengaturan_kelas JOIN kelas k ON k.id = pk.id_kelas
                                    JOIN mata_pelajaran m ON m.id = n.id_mapel JOIN tahun_pelajaran t ON t.id = n.id_tahunajar WHERE n.id_tahunajar = $idtahunajar"; */
                                  $nilaisiswa= "SELECT n.id id_nilai_siswa, s.nis, s.nama_lengkap nama_siswa, m.nama nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, s.id id_siswa FROM nilai_siswa n 
                                  JOIN siswa s ON s.id = n.id_siswa JOIN mata_pelajaran m ON m.id = n.id_mapel JOIN tahun_pelajaran t ON t.id = n.id_tahunajar 
                                  WHERE n.id_tahunajar = $idtahunajar"; 

                                $nilai = mysqli_query($koneksi, $nilaisiswa);
                                if (mysqli_num_rows($nilai) > 0) {
                                    while ($data = mysqli_fetch_array($nilai)) {
                                ?>
                                    <tr>
                                        <?php
                                            $idsiswa = $data['id_nilai_siswa'];
                                            $tahun = mysqli_query($koneksi,"SELECT semester, tahun_pelajaran FROM tahun_pelajaran WHERE id = $idtahunajar");
                                            $datatahun = mysqli_fetch_array($tahun);
                                            $t = $datatahun['tahun_pelajaran'];
                                            $s = $datatahun['semester'];

                                            $kelassiswa = "SELECT kelas FROM view_kelas_siswa WHERE nis = '".$data['nis']."' AND tahun_pelajaran = '$t' AND semester = '$s'";
                                            $kelas = mysqli_query($koneksi, $kelassiswa);
                                            $data_kelas = mysqli_fetch_array($kelas);
                                       
                                        ?>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nis'] ?></td>
                                        <td><?php echo $data['nama_siswa'] ?></td>
                                        <td><?php echo $data_kelas['kelas'] ?></td>
                                        <td><?php echo $data['nama_mapel'] ?></td>
                                        <td><?php echo $data['nilai_pengetahuan']?></td>
                                        <td><?php echo $data['nilai_keterampilan']?></td>
                                        <td>
                                            <!-- query update pada update-nilaisiswa.php -->
                                            <a class="btn btn-success" href="update-nilaisiswa.php?idnilaisiswa=<?php echo $data['id_nilai_siswa']?>&idtahunpelajaran=<?php echo $idtahunajar?>">Edit</a>
                                            <!-- query delete pada process.php -->
                                            <a class="btn btn-danger" href="process.php?deletenilaisiswa=<?php echo $data['id_nilai_siswa'] ?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
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
        <script>
            // Initialize the Simple-DataTables library
            const table = new simpleDatatables.DataTable("#example");
        </script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
