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
        <title>Tambah Data Pengaturan Kelas - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="idtahunajar">Tahun Pelajaran</label> <br>
                                <select name="idtahunajar" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $tahun = mysqli_query($koneksi, "SELECT id, tahun_pelajaran, semester FROM tahun_pelajaran");
                                    while($data = mysqli_fetch_array($tahun)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['tahun_pelajaran']?> - <?php echo $data['semester']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label for="idwalikelas">Wali Kelas</label> <br>
                                <select name="idwalikelas" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $walikelas = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM guru");
                                    while($data = mysqli_fetch_array($walikelas)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <div class="form-group mt-2">
                                <a href="pengaturan-kelas.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahpengaturankelas" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahpengaturankelas'])) {
                                $kelas         = $_POST['kelas'];
                                $idtahunajar     = $_POST['idtahunajar'];
                                $idwalikelas     = $_POST['idwalikelas'];
                                
                                /* query insert data pengaturan kelas di halaman admin */
                                /* $insert = "INSERT INTO pengaturan_kelas(nama, id_tahun_pelajaran, id_guru) 
                                VALUES ('$kelas',$idtahunajar,$idwalikelas)"; */

                                /* PROCEDURE insert_pengaturan_kelas */
                                $insert = "CALL insert_pengaturan_kelas('$kelas',$idtahunajar,$idwalikelas)";

                                $insertpengaturankelas = mysqli_query($koneksi, $insert);
                                if ($insertpengaturankelas) {
                                    echo '<script>alert("Data pengaturan kelas berhasil ditambahkan")</script>';
                                    echo '<script>window.location="pengaturan-kelas.php"</script>';
                                } else {
                                   /*  echo 'gagal' . mysqli_error($koneksi); */
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
