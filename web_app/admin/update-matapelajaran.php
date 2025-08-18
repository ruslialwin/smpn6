<?php
   include 'koneksi.php';

   /* query untuk menampilkan data matapelajaran(yang ingin diupdate), di halaman update data mata pelajaran untuk admin */
   $data_matapelajaran = "SELECT nama, kelompok FROM mata_pelajaran WHERE id = '".$_GET['idmatapelajaran']."'";

   $query = mysqli_query($koneksi, $data_matapelajaran);
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
        <title>Update Data Mata Pelajaran - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Mata Pelajaran</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nama">Nama Mata Pelajaran</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $data->nama ?>">
                            </div>
                            <div class="mt-2">
                                <label for="kelompok">Kelompok</label> <br>
                                <?php $kelompok = $data->kelompok; ?>
                                <select name="kelompok">
                                    <option value="A" <?php echo ($kelompok == 'A') ?'selected': '';?>>A</option>
                                    <option value="B" <?php echo ($kelompok == 'B') ? 'selected': '';?>>B</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-matapelajaran.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatematapelajaran" value="Update">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['updatematapelajaran'])) {
                                $idmatapelajaran    = $_GET['idmatapelajaran']; 
                                $nama               = $_POST['nama'];
                                $kelompok           = $_POST['kelompok'];
                            
                                /*  query untuk update data mata pelajaran di halaman admin */
                                /* $updatematapelajaran = "UPDATE mata_pelajaran SET nama= '$nama', kelompok ='$kelompok'
                                WHERE id = $idmatapelajaran "; */
                                
                                /* PROCEDURE update_mata_pelajaran */
                                $updatematapelajaran = "CALL update_mata_pelajaran($idmatapelajaran, '$nama', '$kelompok')";
                                $update = mysqli_query($koneksi, $updatematapelajaran);
                                if($update){
                                    echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                    echo '<script>window.location="tabel-matapelajaran.php"</script>';
                                } else {
                                    /* die('Tidak bisa update'.mysqli_error($koneksi)); */ 
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
