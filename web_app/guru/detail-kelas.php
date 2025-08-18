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
        <title>Detail Kelas (Data Siswa) - Halaman Guru</title>
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
                    <h2 class="mt-4">Kelas <?php 
                     $detailkelas = "SELECT  pk.nama, tp.tahun_pelajaran, tp.semester FROM pengaturan_kelas pk JOIN tahun_pelajaran tp ON tp.id = pk.id_tahun_pelajaran WHERE pk.id = '".$_GET['idkelas']."'";
                     $dk=mysqli_query($koneksi, $detailkelas);
                     $datad = mysqli_fetch_array($dk);
                     echo $datad['nama'];
                    ?> <small>(<?php echo $datad['tahun_pelajaran']; ?> - <?php echo $datad['semester'];?>) </small>
                    </h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Siswa
                            <a href="walikelas.php" class="btn btn-success btn-sm" style="float: right;"> BACK </a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data pengaturan kelas siswa di halaman admin */
                                    /* $pengaturankelassiswa = "SELECT pk.id id_atur_ks, s.nama_lengkap nama_siswa, k.nama kelas, t.tahun_pelajaran tahun_pelajaran, t.semester, g.nama_lengkap walikelas 
                                    FROM pengaturan_kelas_siswa pk JOIN pengaturan_kelas p ON p.id = pk.id_pengaturan_kelas JOIN kelas k ON k.id = p.id_kelas 
                                    JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran JOIN guru g ON g.id = p.id_guru JOIN siswa s ON s.id = pk.id_siswa"; */
                                    $pengaturankelassiswa = "SELECT vk.nis, vk.nama_siswa, vs.status, vk.kelas, vk.tahun_pelajaran, vk.semester FROM view_kelas_siswa vk JOIN view_status_siswa vs ON vs.nis = vk.nis JOIN pengaturan_kelas_siswa pk ON pk.id = vk.id_atur_ks WHERE id_pengaturan_kelas = '".$_GET['idkelas']."'";
                                    $kelas=mysqli_query($koneksi, $pengaturankelassiswa);
                                    if(mysqli_num_rows($kelas)>0){
                                    while($data = mysqli_fetch_array($kelas)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['nis']?></td>
                                        <td><?php echo $data['nama_siswa']?></td>
                                        <td><?php echo $data['status']?></td>
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
