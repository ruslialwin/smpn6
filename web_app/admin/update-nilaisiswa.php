<?php
   include 'koneksi.php';
   $idtahunajar = $_GET['idtahunpelajaran'];
   $idnilaisiswa = $_GET['idnilaisiswa'];
   /* query untuk menampilkan data nilai siswa(yang ingin diupdate), di halaman update data nilai siswa, untuk admin */
   $datanilaisiswa = "SELECT n.id id_nilai_siswa, s.nis, s.nama_lengkap nama_siswa, m.nama nama_mapel, n.nilai_pengetahuan, n.nilai_keterampilan, 
   s.id id_siswa, m.id id_mapel, t.id id_tp FROM nilai_siswa n 
   JOIN siswa s ON s.id = n.id_siswa JOIN mata_pelajaran m ON m.id = n.id_mapel JOIN tahun_pelajaran t ON t.id = n.id_tahunajar 
   WHERE n.id_tahunajar = $idtahunajar AND n.id = $idnilaisiswa ";

   $query = mysqli_query($koneksi, $datanilaisiswa);
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
        <title>Update Data Nilai Siswa - Halaman Admin</title>
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
                                <label for="idmapel">Mata Pelajaran</label> <br>
                                <?php $mid = $data->id_mapel; ?>
                                <select name="idmapel" class="form-control" required>
                                    <?php
                                    $mapel = mysqli_query($koneksi, "SELECT id, nama FROM mata_pelajaran");
                                    while($datasemuamapel = mysqli_fetch_array($mapel)){
                                    ?>
                                    <option value="<?php echo $datasemuamapel['id']?>" <?php echo ($mid == $datasemuamapel['id']) ?'selected': '';?>>
                                        <?php echo $datasemuamapel['nama']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="idtp">Tahun Pelajaran</label> <br>
                                <?php $tid = $data->id_tp; ?>
                                <select name="idtp" class="form-control" required>
                                    <?php
                                    $tp = mysqli_query($koneksi, "SELECT id, tahun_pelajaran, semester FROM tahun_pelajaran");
                                    while($datasemuatp = mysqli_fetch_array($tp)){
                                    ?>
                                    <option value="<?php echo $datasemuatp['id']?>" <?php echo ($tid == $datasemuatp['id']) ?'selected': '';?>>
                                        <?php echo $datasemuatp['tahun_pelajaran']?> - <?php echo $datasemuatp['semester']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="number" name="nilai_pengetahuan" class="form-control" value="<?php echo $data->nilai_pengetahuan ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="number" name="nilai_keterampilan" class="form-control" value="<?php echo $data->nilai_keterampilan ?>">
                            </div>
                            
                            <div class="form-group mt-2">
                                <a href="tabel-nilai.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatenilai" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updatenilai'])) {
                            $idnilaisiswa  = $_GET['idnilaisiswa'];
                            $idtp          = $_POST['idtp']; 
                            $idsiswa       = $_POST['idsiswa'];
                            $idmapel       = $_POST['idmapel'];
                            $np            = $_POST['nilai_pengetahuan'];
                            $nk            = $_POST['nilai_keterampilan'];

                            /*  query untuk update data nilai siswa di halaman admin */
                            /* $updatenilaisiswa = "UPDATE nilai_siswa SET id_siswa= $idsiswa, id_mapel= $idmapel, id_tahunajar = $idtp, 
                            nilai_pengetahuan = $np, nilai_keterampilan = $nk WHERE id = $idnilaisiswa "; */

                           /*  PROCEDURE update_nilai_siswa */
                            $updatenilaisiswa = "CALL update_nilai_siswa($idnilaisiswa,$idsiswa,$idmapel,$idtahunajar,$np,$nk)";

                            $update = mysqli_query($koneksi, $updatenilaisiswa);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-nilai.php"</script>';
                            } else {
                                /* die('Tidak bisa update nama'.mysqli_error($koneksi));  */   
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
