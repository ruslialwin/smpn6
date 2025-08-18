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
        <title>Pengaturan Siswa Lulus - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Pengaturan Siswa Lulus</h2>
                    <i>"Update status siswa kelas 9 pada tahun ajaran baru dari aktif menjadi lulus"</i>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="kelas">Kelas</label> <br>
                                <select name="kelas" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $guru = mysqli_query($koneksi, "SELECT p.id, p.nama, t.tahun_pelajaran, t.semester FROM pengaturan_kelas p JOIN tahun_pelajaran t ON t.id = p.id_tahun_pelajaran WHERE nama LIKE '%".'9-'."%' AND semester='Genap'");
                                    while($data = mysqli_fetch_array($guru)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nama']?> - <?php echo $data['tahun_pelajaran']?> - <?php echo $data['semester']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-warning mt-3 mx-3" name="updatestatus" value="Update" onclick="return confirm('Yakin untuk update data status siswa?')">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['updatestatus'])) {
                                $idkelas       = $_POST['kelas'];
                                
                                /* query update data kelas untuk naik kelas */
                                $update = "CALL lulus($idkelas)";

                                $updatekb = mysqli_query($koneksi, $update);
                                if ($updatekb) {
                                    echo '<script>alert("Data status siswa berhasil diupdate")</script>';
                                    echo '<script>window.location="status-siswa.php"</script>';
                                } else {
                                    /* echo 'gagal' . mysqli_error($koneksi); */
                                    echo '<script>alert("Data status siswa tidak dapat diupdate! '.mysqli_error($koneksi).'")</script>';
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
