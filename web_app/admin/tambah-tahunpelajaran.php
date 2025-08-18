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
        <title>Tambah Data Tahun Pelajaran - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Tahun Pelajaran</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="tahunpelajaran">Tahun Pelajaran</label>
                                <input type="text" name="tahunpelajaran" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="semester">Semester</label> <br>
                                <select name="semester">
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-tahunpelajaran.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahtahunpelajaran" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahtahunpelajaran'])) {
                                $tahunpelajaran   = $_POST['tahunpelajaran'];
                                $semester         = $_POST['semester'];
                                
                                /* query insert data tahun pelajaran di halaman admin */
                                /* $insert = "INSERT INTO tahun_pelajaran(tahun_pelajaran, semester) 
                                VALUES ('$tahunpelajaran', '$semester')"; */

                                /* PROCEDURE insert_tahun_pelajaran */
                                $insert = "CALL insert_tahun_pelajaran('$tahunpelajaran', '$semester')";

                                $inserttahunpelajaran = mysqli_query($koneksi, $insert);
                                if ($inserttahunpelajaran) {
                                    echo '<script>alert("Data tahun pelajaran berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-tahunpelajaran.php"</script>';
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
