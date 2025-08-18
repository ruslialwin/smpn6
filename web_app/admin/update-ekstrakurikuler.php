<?php
   include 'koneksi.php';

   /* query untuk menampilkan data ekstrakurikuler(yang ingin diupdate), di halaman update data ekstrakurikuler, untuk admin */
   $dataekstrakurikuler = "SELECT e.nama nama_ekskul, e.keterangan keterangan, g.nama_lengkap guru_pembina, g.id id_guru 
   FROM guru g JOIN ekstrakurikuler e ON e.id_guru = g.id WHERE e.id = '".$_GET['idekstrakurikuler']."'";

   $query = mysqli_query($koneksi, $dataekstrakurikuler);
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
        <title>Update Data Ekstrakurikuler - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Ekstrakurikuler</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nama">Nama Ekstrakurikuler</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $data->nama_ekskul ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" class="form-control"><?php echo $data->keterangan ?></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="gurupembina">Guru Pembina</label> <br>
                                <?php $gid = $data->id_guru; ?>
                                <select name="gurupembina" class="form-control" required>
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
                                <a href="tabel-ekstrakurikuler.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updateekstrakurikuler" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updateekstrakurikuler'])) {
                            $idekstrakurikuler  = $_GET['idekstrakurikuler']; 
                            $nama               = $_POST['nama'];
                            $keterangan         = $_POST['keterangan'];
                            $idguru             = $_POST['gurupembina'];

                            /*  query untuk update data ekstrakurikuler di halaman admin */
                           /*  $updateekstrakurikuler = "UPDATE ekstrakurikuler SET id_guru= $idguru , nama= '$nama', keterangan= '$keterangan' 
                            WHERE id = $idekstrakurikuler "; */

                           /*  PROCEDURE update_ekstrakurikuler */
                            $updateekstrakurikuler = "CALL update_ekskul($idekstrakurikuler, $idguru, '$nama','$keterangan')";
                            $update = mysqli_query($koneksi, $updateekstrakurikuler);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-ekstrakurikuler.php"</script>';
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
