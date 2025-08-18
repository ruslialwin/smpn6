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
        <title>Tabel Data Kegiatan - Halaman Admin</title>
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
                    <h2 class="mt-4">Data Kegiatan</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Kegiatan
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tambah-kegiatan.php">Tambah Data Kegiatan</a>
                            <a class="btn btn-warning mb-3" href="restore-kegiatan.php">Restore Data</a>
                            <table id="example" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data semua kegiatan di halaman admin */
                                    $datakegiatan = "SELECT id, judul, deskripsi, tanggal, gambar FROM kegiatan";

                                    $kegiatan=mysqli_query($koneksi, $datakegiatan);
                                    if(mysqli_num_rows($kegiatan)>0){
                                    while($data = mysqli_fetch_array($kegiatan)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['judul']?></td>
                                        <td><?php echo $data['deskripsi']?></td>
                                        <td><?php echo $data['tanggal']?></td>
                                        <?php
                                            if (empty($data['gambar'])){
                                        ?>
                                            <td> - </td>
                                        <?php } else{ ?>
                                            <td><?php echo $data['gambar']?></td>
                                        <?php } ?>
                                        <td>
                                            <!-- query update pada update-kegiatan.php -->
                                            <a class="btn btn-success" href="update-kegiatan.php?idkegiatan=<?php echo $data['id']?>">Edit</a>
                                            <!-- query delete pada process.php -->
                                            <a class="btn btn-danger" href="process.php?deletekegiatan=<?php echo $data['id']?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        <script>
            // Initialize the Simple-DataTables library
            const table = new simpleDatatables.DataTable("#example");
        </script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
