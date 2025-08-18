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
                    <h2 class="mt-4">Data Archive Kegiatan</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Archive Kegiatan
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tabel-kegiatan.php">Data Kegiatan</a>
                            <table id="example" class="dataTable-table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id kegiatan</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data log delete prestasi di halaman admin */
                                    $log = "SELECT * FROM log_kegiatan WHERE aksi='delete'";

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
                                            $idk = $data['id_kegiatan']; 
                                            $idlog = $data['id_log'];
                                            echo $idk;
                                            ?>
                                        </td>
                                        <td><?php 
                                             $judul = $data['old_judul'];
                                             echo $judul;
                                            ?>
                                        </td>
                                        <td><?php 
                                            $des = $data['old_deskripsi'];
                                            echo $des;
                                        ?></td>
                                        <td><?php 
                                            $tanggal = $data['old_tanggal'];
                                            echo $tanggal;
                                        ?></td>
                                        <td><?php 
                                            $gambar = $data['old_gambar'];
                                            echo $gambar;
                                        ?></td>
                                        <td>
                                             <!-- restore  -->
                                             <a class="btn btn-warning" href="restore-kegiatan.php?idrestorek=<?php echo $data['id_kegiatan']?>" onclick="return confirm('Apakah anda yakin untuk restore data??')">
                                             <div class="sb-nav-link-icon"><i class="fas fa-trash-can-arrow-up"></i></div>
                                             Restore
                                            </a>

                                            <a class="btn btn-danger mt-3" href="restore-kegiatan.php?iddeletek=<?php echo $data['id_log']?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?? Data yang terhapus tidak bisa dikembalikan!!')">
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
                    if(isset($_GET['idrestorek'])){
                    $insert = "CALL restore_kegiatan($idk,'$judul','$des','$tanggal','$gambar', $idlog)";
                    $insertk = mysqli_query($koneksi, $insert);
                    if ($insertk) {
                        echo '<script>alert("Data berita kegiatan berhasil direstore")</script>';
                        echo '<script>window.location="restore-kegiatan.php"</script>';
                    } else {
                        /* echo 'gagal' . mysqli_error($koneksi); */
                        echo '<script>alert("Data tidak dapat direstore! '.mysqli_error($koneksi).'")</script>';
                    }
                    }

                    if(isset($_GET['iddeletek'])){
                        $iddel = $_GET['iddeletek'];
                        $delete = "DELETE FROM log_kegiatan WHERE id_log = $iddel";
                        $deletek = mysqli_query($koneksi, $delete);
                        if ($deletek) {
                            echo '<script>alert("Data berita kegiatan berhasil dihapus secara permanen")</script>';
                            echo '<script>window.location="restore-kegiatan.php"</script>';
                        } else {
                            /* echo 'gagal' . mysqli_error($koneksi); */
                            echo '<script>alert("Data tidak dapat dihapus! '.mysqli_error($koneksi).'")</script>';
                            echo '<script>window.location="restore-kegiatan.php"</script>';
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
