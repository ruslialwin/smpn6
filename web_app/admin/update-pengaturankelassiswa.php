<?php
   include 'koneksi.php';

   /* query untuk menampilkan data pengaturankelassiswa(yang ingin diupdate), di halaman update data pengaturan kelas siswa, untuk admin */
   $pengaturankelassiswa = "SELECT pk.id id_atur, s.nama_lengkap nama_siswa, p.nama kelas, t.tahun_pelajaran tahun_pelajaran, 
   g.nama_lengkap walikelas, p.id id_pengaturan_kelas, t.id id_tahunajar, g.id id_guru, s.id id_siswa 
   FROM pengaturan_kelas_siswa pk JOIN pengaturan_kelas p ON p.id = pk.id_pengaturan_kelas JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran 
   JOIN guru g ON g.id = p.id_guru JOIN siswa s ON s.id = pk.id_siswa 
   WHERE pk.id = '".$_GET['idpengaturankelassiswa']."'";

   $query = mysqli_query($koneksi, $pengaturankelassiswa);
   $data = mysqli_fetch_object($query); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Data Pengaturan Kelas Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-2">
                                <label for="idsiswa">Siswa</label> <br>
                                <?php $sid = $data->id_siswa; ?>
                                <select name="idsiswa" class="form-control" required>
                                    <?php
                                    $siswa = mysqli_query($koneksi, "SELECT id, nis, nama_lengkap FROM siswa");
                                    while($datasemuasiswa = mysqli_fetch_array($siswa)){
                                    ?>
                                    <option value="<?php echo $datasemuasiswa['id']?>" <?php echo ($sid == $datasemuasiswa['id']) ?'selected': '';?>>
                                        <?php echo $datasemuasiswa['nis']?> - <?php echo $datasemuasiswa['nama_lengkap']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <div class="form-group mt-2">
                                <label for="idpengaturankelas">Kelas - Tahun Pelajaran - Semester</label> <br>
                                <?php $pkid = $data->id_pengaturan_kelas; ?>
                                <select name="idpengaturankelas" class="form-control" required>
                                    <?php 
                                        $select = mysqli_query($koneksi, "SELECT pk.id, pk.nama, t.tahun_pelajaran, t.semester FROM pengaturan_kelas pk JOIN tahun_pelajaran t ON t.id = pk.id_tahun_pelajaran");
                                        while($kelas = mysqli_fetch_array($select)){ 
                                    ?>
                                    <option value="<?php echo $kelas['id']?>" <?php echo ($pkid == $kelas['id']) ?'selected': '';?>>
                                        <?php echo $kelas['nama']?> - <?php echo $kelas['tahun_pelajaran']?> - <?php echo $kelas['semester']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group mt-2">
                                <a href="pengaturan-kelas-siswa.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatepengaturankelas" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updatepengaturankelas'])) {
                            $idatur     = $_GET['idpengaturankelassiswa'];
                            $idsiswa    = $_POST['idsiswa'];
                            $idpk       = $_POST['idpengaturankelas']; 
                            
                            /*  query untuk update data pengaturan kelas siswa di halaman admin */
                            /* $updatepengaturankelassiswa = "UPDATE pengaturan_kelas_siswa SET id_siswa = $idsiswa, id_pengaturan_kelas = $idpk WHERE id = $idatur "; */

                            /* PROCEDURE update_pengaturan_kelas_siswa */
                            $updatepengaturankelassiswa = "CALL update_pengaturan_kelas_siswa($idatur,$idpk,$idsiswa)";
                            $update = mysqli_query($koneksi, $updatepengaturankelassiswa);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="pengaturan-kelas-siswa.php"</script>';
                            } else {
                               /*  die('Tidak bisa update. '.mysqli_error($koneksi)); */  
                               echo '<script>alert("Tidak bisa update! '.mysqli_error($koneksi).'")</script>';  
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
