<?php
   include 'koneksi.php';

   /* query untuk menampilkan data akunguru(yang ingin diupdate), di halaman update data akunguru, untuk admin */
   $dataakunguru = "SELECT a.username, a.password, g.nama_lengkap nama_guru, g.id id_guru 
   FROM guru g JOIN akun_guru a ON a.id_guru = g.id WHERE a.id = '".$_GET['idakunguru']."'";

   $query = mysqli_query($koneksi, $dataakunguru);
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
        <title>Update Data Akun Guru - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Akun Guru</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-2">
                                <label for="namaguru">Nama Guru</label> <br>
                                <?php $gid = $data->id_guru; ?>
                                <select name="namaguru" class="form-control" required>
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
                            <div class="form-group mt-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $data->username ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $data->password ?>">
                            </div>
                            
                            <div class="form-group mt-2">
                                <a href="tabel-akunguru.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updateakunguru" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updateakunguru'])) {
                            $idakun      = $_GET['idakunguru']; 
                            $username    = $_POST['username'];
                            $password    = md5($_POST['password']);
                            $idguru      = $_POST['namaguru'];

                            /*  query untuk update data akun_guru di halaman admin */
                            /* $updateakunguru = "UPDATE akun_guru SET id_guru= $idguru , username= '$username', password= '$password' 
                            WHERE id = $idakun "; */
                            $updateakunguru = "CALL update_akun_guru($idakun,$idguru,'$username','$password')";
                            $update = mysqli_query($koneksi, $updateakunguru);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-akunguru.php"</script>';
                            } else {
                                /* die('Tidak bisa update nama'.mysqli_error($koneksi));   */ 
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
