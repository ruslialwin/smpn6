<?php
   include 'koneksi.php';
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Data Pengaturan Kelas Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="idsiswa">Siswa</label> <br>
                                <select name="idsiswa" class="form-control" required>
                                    <option value="">NIS - Nama</option>
                                    <?php
                                    $siswa = mysqli_query($koneksi, "SELECT id, nis, nama_lengkap FROM siswa");
                                    while($data = mysqli_fetch_array($siswa)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nis']?> - <?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label for="idpengaturankelas">Kelas</label> <br>
                                <select name="idpengaturankelas" class="form-control" required>
                                    <option value="">Kelas - TahunPelajaran - Semester</option>
                                    <?php 
                                        $select = mysqli_query($koneksi, "SELECT pk.id, pk.nama, t.tahun_pelajaran, t.semester FROM pengaturan_kelas pk JOIN tahun_pelajaran t ON t.id = pk.id_tahun_pelajaran");
                                        while($kelas = mysqli_fetch_array($select)){ 
                                    ?>
                                    <option value="<?php echo $kelas['id']?>"><?php echo $kelas['nama']?> - <?php echo $kelas['tahun_pelajaran']?> - <?php echo $kelas['semester']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <div class="form-group mt-2">
                                <a href="pengaturan-kelas-siswa.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahpengaturankelassiswa" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahpengaturankelassiswa'])) {
                                $idpengaturankelas  = $_POST['idpengaturankelas'];
                                $idsiswa            = $_POST['idsiswa'];

                                /* query insert data pengaturan kelas siswa di halaman admin */
                               /*  $insert = "INSERT INTO pengaturan_kelas_siswa(id_pengaturan_kelas, id_siswa) 
                                VALUES ($idpengaturankelas,$idsiswa)"; */

                                /* PROCEDURE insert_pengaturan_kelas_siswa */
                                $insert = "CALL insert_pengaturan_kelas_siswa($idpengaturankelas, $idsiswa)";

                                $insertpengaturankelassiswa = mysqli_query($koneksi, $insert);
                                if ($insertpengaturankelassiswa) {
                                    echo '<script>alert("Data pengaturan kelas siswa berhasil ditambahkan")</script>';
                                    echo '<script>window.location="pengaturan-kelas-siswa.php"</script>';
                                } else {
                                    /* echo 'gagal' . mysqli_error($koneksi); */
                                    echo '<script>alert("Data tidak dapat ditambah! '.mysqli_error($koneksi).'")</script>';
                                }
                            }

                        ?>
                    </div>
                </div>
            </main>
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
