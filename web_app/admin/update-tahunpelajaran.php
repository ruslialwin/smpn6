<?php
   include 'koneksi.php';

   /* query untuk menampilkan data tahun pelajaran(yang ingin diupdate), di halaman update data tahun pelajaran untuk admin */
   $data_tahunpelajaran = "SELECT tahun_pelajaran, semester FROM tahun_pelajaran WHERE id = '".$_GET['idtahunpelajaran']."'";

   $query = mysqli_query($koneksi, $data_tahunpelajaran);
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
        <title>Update Data Tahun Pelajaran - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Tahun Pelajaran</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="tahunpelajaran">Tahun Pelajaran</label>
                                <input type="text" name="tahunpelajaran" class="form-control" value="<?php echo $data->tahun_pelajaran ?>">
                            </div>
                            <div class="mt-2">
                                <label for="semester">Semester</label> <br>
                                <?php $semester = $data->semester; ?>
                                <select name="semester">
                                    <option <?php echo ($semester == 'Ganjil') ? "selected": "";?>>Ganjil</option>
                                    <option <?php echo ($semester == 'Genap') ? "selected": "";?>>Genap</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-tahunpelajaran.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatetahunpelajaran" value="Update">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['updatetahunpelajaran'])) {
                                $idtahunpelajaran   = $_GET['idtahunpelajaran']; 
                                $tahunpelajaran     = $_POST['tahunpelajaran'];
                                $semester           = $_POST['semester'];
                            
                                /*  query untuk update data tahun pelajaran di halaman admin */
                               /*  $updatetahunpelajaran = "UPDATE tahun_pelajaran SET tahun_pelajaran= '$tahunpelajaran', semester = '$semester'
                                WHERE id = $idtahunpelajaran "; */

                                $updatetahunpelajaran = "CALL update_tahun_pelajaran($idtahunpelajaran,'$tahunpelajaran', '$semester')";

                                $update = mysqli_query($koneksi, $updatetahunpelajaran);
                                if($update){
                                    echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                    echo '<script>window.location="tabel-tahunpelajaran.php"</script>';
                                } else {
                                    /* die('Tidak bisa update'.mysqli_error($koneksi));     */
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
