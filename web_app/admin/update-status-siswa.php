<?php
   include 'koneksi.php';

   /* query untuk menampilkan data siswa(yang ingin diupdate), di halaman update data siswa, untuk admin */
   $data_siswa = "SELECT nis, nama_lengkap, status FROM view_status_siswa WHERE nis = '".$_GET['idsiswa']."'";

   $query = mysqli_query($koneksi, $data_siswa);
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
        <title>Update Status Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Status Siswa</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nis">NIS</label>
                                <input type="number" name="nis" class="form-control" value="<?php echo $data->nis ?>" readonly>
                            </div>
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data->nama_lengkap ?>" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="status">Status</label> <br>
                                <?php $status = $data->status; ?>
                                <select name="status" class="form-control">
                                    <option <?php echo ($status == 'Aktif') ? "selected": "";?>>Aktif</option>
                                    <option <?php echo ($status == 'Pindah') ? "selected": "";?>>Pindah</option>
                                    <option <?php echo ($status == 'Lulus') ? "selected": "";?>>Lulus</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <a href="status-siswa.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatesiswa" value="Update">
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['updatesiswa'])) {
                            $nis             = $_POST['nis'];
                            $nama_lengkap    = $_POST['nama_lengkap'];
                            $status          = $_POST['status'];
                               
                            /*  query untuk update data siswa di halaman admin */
                            $updatesiswa = "UPDATE siswa SET nis= $nis , nama_lengkap= '$nama_lengkap' , status = '$status' 
                            WHERE nis = $nis ";
                            $update = mysqli_query($koneksi, $updatesiswa);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="status-siswa.php"</script>';
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
