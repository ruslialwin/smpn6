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
        <title>Tambah Data Akun Guru - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Akun Guru</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="idguru">Nama Guru</label> <br>
                                <select name="idguru" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $guru = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM guru");
                                    while($data = mysqli_fetch_array($guru)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required value='Username default : nip guru' readonly>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" required value='Password default : nip guru' readonly>
                            </div>
                                <div class="form-group mt-2">
                                <a href="tabel-akunguru.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahakunguru" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahakunguru'])) {
                                $idguru   = $_POST['idguru'];
                                $guru     = mysqli_query($koneksi, "SELECT nip FROM guru WHERE id = $idguru");
                                $data     = mysqli_fetch_array($guru);
                                $username = $data['nip'];
                                $password = md5($data['nip']);
                                
                                /* query insert data akun guru di halaman admin */
                                /* $insert = "INSERT INTO akun_guru(id_guru,username,password) 
                                VALUES ($idguru,'$username','$password')"; */
                                $insert = "CALL insert_akun_guru($idguru, '$username', '$password')";

                                $insertakunguru = mysqli_query($koneksi, $insert);
                                if ($insertakunguru) {
                                    echo '<script>alert("Data akun guru berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-akunguru.php"</script>';
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
