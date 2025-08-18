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
        <title>Export Data Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Export Data Siswa</h2>
                    <div class="row justify-content-center">
                        <form action="print-siswa.php" method="GET" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="id">Siswa</label> <br>
                                <select name="id" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $sis = mysqli_query($koneksi, "SELECT id, nama_lengkap, nis FROM siswa");
                                    while($data = mysqli_fetch_array($sis)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nis']?> - <?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" value="Print">
                            </div>
                        </form>
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
