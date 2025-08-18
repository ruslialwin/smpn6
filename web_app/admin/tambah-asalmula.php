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
        <title>Tambah Data Asal Mula - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Asal Mula</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="idsiswa">Nama Siswa</label> <br>
                                <select name="idsiswa" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $siswa = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM siswa");
                                    while($data = mysqli_fetch_array($siswa)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="namasd">Nama SD Asal</label>
                                <input type="text" name="namasd" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamatsd">Alamat SD Asal</label>
                                <textarea name="alamatsd" class="form-control" required></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggalditerima">Tanggal Diterima SD</label>
                                <input type="date" name="tanggalditerima" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggaltamat">Tanggal Tamat SD</label>
                                <input type="date" name="tanggaltamat" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-asalmula.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahasalmula" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahasalmula'])) {
                                $idsiswa         = $_POST['idsiswa'];
                                $namasd          = $_POST['namasd'];
                                $alamatsd        = $_POST['alamatsd'];
                                $tanggalditerima = $_POST['tanggalditerima'];
                                $tanggaltamat    = $_POST['tanggaltamat'];
                                
                                /* query insert data asal mula di halaman admin */
                               /*  $insert = "INSERT INTO asal_mula(id_siswa,nama_sd,alamat_sd,diterima_sd,tamat_sd) 
                                VALUES ($idsiswa,'$namasd','$alamatsd','$tanggalditerima','$tanggaltamat')"; */
                                $insert = "CALL insert_asal_mula($idsiswa, '$namasd', '$alamatsd', '$tanggalditerima', '$tanggaltamat')";

                                $insertasalmula = mysqli_query($koneksi, $insert);
                                if ($insertasalmula) {
                                    echo '<script>alert("Data asal mula berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-asalmula.php"</script>';
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
