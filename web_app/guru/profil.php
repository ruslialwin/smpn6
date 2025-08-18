<?php
    session_start();
    include 'koneksi.php';

    /* query menampilkan data guru pada halaman dashboard guru */
    $guru = "SELECT a.username, g.nama_lengkap, a.password FROM akun_guru a JOIN guru g ON g.id = a.id_guru WHERE id_guru = '".$_SESSION['id_guru']."'";
    $data_guru = mysqli_query($koneksi, $guru);

    $get = mysqli_fetch_object($data_guru); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Guru</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php 
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Profil</h1>
                    </div>
                    <div class="container-fluid px-4">
                        <form method="POST">
                            <div class="form-group row py-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $get->username ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $get->password ?>">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </main>
                
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <?php
        if(isset($_POST['submit'])){
            $username         = $_POST['username'];
            $password         = md5($_POST['password']);

            /* query update profile guru */
            $ua = "UPDATE akun_guru SET username ='$username', password ='$password' WHERE id_guru = '".$_SESSION['id_guru']."'";
            $update = mysqli_query($koneksi, $ua);

        if($update){
            echo "<script>alert('Data telah berhasil diubah.')</script>";
            echo "<script>window.location='index.php'</script>";
        }else{
            echo mysqli_error($koneksi);
        }

        }
    ?>
    </body>
</html>
