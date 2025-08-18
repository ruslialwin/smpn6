<?php
   include 'koneksi.php';

   /* query untuk menampilkan data mapel guru(yang ingin diupdate), di halaman update data mapel guru, untuk admin */
   $datamapelguru = "SELECT p.id id_atur, g.nama_lengkap nama_guru, m.nama mata_pelajaran, g.id id_guru, m.id id_mapel 
   FROM pelajaran_guru p JOIN guru g ON g.id = p.id_guru JOIN mata_pelajaran m ON m.id = p.id_mapel WHERE p.id = '".$_GET['idmapelguru']."'";

   $query = mysqli_query($koneksi, $datamapelguru);
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
        <title>Update Data Mata Pelajaran Guru - Halaman Admin</title>
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
                                <label for="idguru">Nama Guru</label> <br>
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
                                <label for="idmapel">Nama Mata Pelajaran</label> <br>
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
                                <a href="pengaturan-mapelguru.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatemapelguru" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updatemapelguru'])) {
                            $idmapelguru       = $_GET['idmapelguru']; 
                            $idguru            = $_POST['idguru'];
                            $idmapel           = $_POST['idmapel'];

                            /*  query untuk update data mapel guru di halaman admin */
                            /* $updatemapelguru = "UPDATE pelajaran_guru SET id_guru= $idguru, id_mapel= $idmapel WHERE id = $idmapelguru "; */

                            /* PROCEDURE mapel_guru */
                            $updatemapelguru = "CALL update_pelajaran_guru($idmapelguru,$idguru,$idmapel)";

                            $update = mysqli_query($koneksi, $updatemapelguru);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="pengaturan-mapelguru.php"</script>';
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
