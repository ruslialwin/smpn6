<?php
   include 'koneksi.php';

   /* query untuk menampilkan data pengaturankelas(yang ingin diupdate), di halaman update data pengaturan kelas, untuk admin */
   $datapengaturankelas = "SELECT p.id id_atur, p.nama kelas, t.tahun_pelajaran tahun_pelajaran, g.nama_lengkap walikelas, t.id id_tahunajar, p.id id_kelas, g.id id_guru 
   FROM pengaturan_kelas p JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran JOIN guru g ON g.id = p.id_guru WHERE p.id = '".$_GET['idpengaturankelas']."'";

   $query = mysqli_query($koneksi, $datapengaturankelas);
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
        <title>Update Data Pengaturan Kelas - Halaman Admin</title>
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
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="<?php echo $data->kelas ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="idtp">Tahun Pelajaran</label> <br>
                                <?php $tpid = $data->id_tahunajar; ?>
                                <select name="idtp" class="form-control" required>
                                    <?php
                                    $tp = mysqli_query($koneksi, "SELECT id, tahun_pelajaran, semester FROM tahun_pelajaran");
                                    while($datasemuatahunajar = mysqli_fetch_array($tp)){
                                    ?>
                                    <option value="<?php echo $datasemuatahunajar['id']?>" <?php echo ($tpid == $datasemuatahunajar['id']) ?'selected': '';?>>
                                        <?php echo $datasemuatahunajar['tahun_pelajaran']?> - <?php echo $datasemuatahunajar['semester']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="idguru">Nama Wali Kelas</label> <br>
                                <?php $gid = $data->id_guru; ?>
                                <select name="idguru" class="form-control" required>
                                    <?php
                                    $guru = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM guru");
                                    while($datasemuaguru = mysqli_fetch_array($guru)){
                                    ?>
                                    <option value="<?php echo $datasemuaguru['id']?>" <?php echo ($gid == $datasemuaguru['id']) ?'selected': '';?>>
                                        <?php echo $datasemuaguru['nama_lengkap']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div class="form-group mt-2">
                                <a href="pengaturan-kelas.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatepengaturankelas" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updatepengaturankelas'])) {
                            $idatur        = $_GET['idpengaturankelas'];
                            $kelas         = $_POST['kelas'];
                            $idtp          = $_POST['idtp']; 
                            $idguru        = $_POST['idguru'];

                            /*  query untuk update data pengaturan kelas di halaman admin */
                           /*  $updatepengaturankelas = "UPDATE pengaturan_kelas SET nama= '$kelas', id_tahun_pelajaran= $idtp, id_guru = $idguru WHERE id = $idatur "; */

                           /* PROCEDURE update_pengaturan_kelas */
                            $updatepengaturankelas = "CALL update_pengaturan_kelas($idatur,'$kelas', $idtp, $idguru)";
                            $update = mysqli_query($koneksi, $updatepengaturankelas);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="pengaturan-kelas.php"</script>';
                            } else {
                                /* die('Tidak bisa update. '.mysqli_error($koneksi)); */    
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
