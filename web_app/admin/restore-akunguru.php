<?php
    session_start();

    if(empty($_SESSION['admin_id'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data admin pada halaman dashboard admin */
    $admin = "SELECT username, nama_lengkap FROM akun_admin WHERE admin_id = '".$_SESSION['admin_id']."'";
    $data_admin = mysqli_query($koneksi, $admin);

    $get = mysqli_fetch_object($data_admin); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Restore Data - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Data Archive Akun Guru</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Archive Akun Guru
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tabel-akunguru.php">Data Akun Guru</a>
                            <table id="example" class="dataTable-table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Akun Guru</th>
                                            <th>Id Guru</th>
                                            <th>Nama lengkap Guru</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data log delete prestasi di halaman admin */
                                    $log = "SELECT * FROM log_akun_guru WHERE aksi='delete'";

                                    $query=mysqli_query($koneksi, $log);
                                    if(mysqli_num_rows($query)>0){
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                    <td><?php echo $no++?></td>
                                        <td><?php echo $data['waktu']?></td>
                                        <td><?php echo $data['aksi']?></td>
                                        <td><?php echo $data['who']?></td>
                                        <td><?php 
                                            $ida = $data['id_akun_guru'];
                                            $idlog = $data['id_log']; 
                                            echo $ida;
                                            ?>
                                        </td>
                                        <td><?php 
                                             $idg = $data['id_guru'];
                                             echo $idg;
                                            ?>
                                        </td>
                                        <td><?php 
                                            $nama = mysqli_query($koneksi, "SELECT nama_lengkap FROM guru WHERE id = $idg");
                                            $dn = mysqli_fetch_array($nama);
                                            $namaguru = $dn['nama_lengkap'];
                                            echo $namaguru;
                                        ?></td>
                                        <td><?php 
                                            $uname = $data['old_username'];
                                            echo $uname;
                                        ?></td>
                                        <td><?php 
                                            $pass = $data['old_password'];
                                            echo $pass;
                                        ?></td>
                                        <td>
                                             <!-- restore  -->
                                             <a class="btn btn-warning" href="restore-akunguru.php?idrestoreag=<?php echo $data['id_akun_guru']?>" onclick="return confirm('Apakah anda yakin untuk restore data??')">
                                             <div class="sb-nav-link-icon"><i class="fas fa-trash-can-arrow-up"></i></div>
                                             Restore
                                            </a>

                                            <a class="btn btn-danger mt-3" href="restore-akunguru.php?iddeleteag=<?php echo $data['id_log']?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?? Data yang terhapus tidak bisa dikembalikan!!')">
                                              Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['idrestoreag'])){
                    $insert = "CALL restore_akun_guru($ida,$idg,'$uname','$pass',$idlog)";
                    $insertag = mysqli_query($koneksi, $insert);
                    if ($insertag) {
                        echo '<script>alert("Data akun guru berhasil direstore")</script>';
                        echo '<script>window.location="restore-akunguru.php"</script>';
                    } else {
                        /* echo 'gagal' . mysqli_error($koneksi); */
                        echo '<script>alert("Data tidak dapat direstore! '.mysqli_error($koneksi).'")</script>';
                    }
                    }

                    if(isset($_GET['iddeleteag'])){
                        $iddel = $_GET['iddeleteag'];
                        $delete = "DELETE FROM log_akun_guru WHERE id_log = $iddel";
                        $deleteag = mysqli_query($koneksi, $delete);
                        if ($deleteag) {
                            echo '<script>alert("Data akun guru berhasil dihapus secara permanen")</script>';
                            echo '<script>window.location="restore-akunguru.php"</script>';
                        } else {
                            /* echo 'gagal' . mysqli_error($koneksi); */
                            echo '<script>alert("Data tidak dapat dihapus! '.mysqli_error($koneksi).'")</script>';
                            echo '<script>window.location="restore-akunguru.php"</script>';
                    }
                    }
                ?>
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
        <script>
            // Initialize the Simple-DataTables library
            const table = new simpleDatatables.DataTable("#example");
        </script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
