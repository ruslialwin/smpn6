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
        <title>Tabel Data Asal Mula - Halaman Admin</title>
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
                    <h2 class="mt-4">Data Asal Mula</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Asal Mula
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tambah-asalmula.php">Tambah Data Asal Mula</a>
                            <table id="example" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama SD Asal</th>
                                        <th>Alamat SD</th>
                                        <th>Tgl Diterima SD</th>
                                        <th>Tgl Tamat SD</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data semua asal mula di halaman admin */
                                    $dataasalmula = "SELECT a.id id_asalmula, a.nama_sd, a.alamat_sd, a.diterima_sd tgl_diterima, a.tamat_sd tgl_tamat, 
                                    s.nama_lengkap nama_siswa FROM siswa s JOIN asal_mula a ON a.id_siswa = s.id ";

                                    $asalmula=mysqli_query($koneksi, $dataasalmula);
                                    if(mysqli_num_rows($asalmula)>0){
                                    while($data = mysqli_fetch_array($asalmula)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['nama_siswa']?></td>
                                        <td><?php echo $data['nama_sd']?></td>
                                        <td><?php echo $data['alamat_sd']?></td>
                                        <td><?php echo $data['tgl_diterima']?></td>
                                        <td><?php echo $data['tgl_tamat']?></td>
                                        <td>
                                            <!-- query update pada update-asalmula.php -->
                                            <a class="btn btn-success" href="update-asalmula.php?idasalmula=<?php echo $data['id_asalmula']?>">Edit</a>
                                            <!-- query delete pada process.php -->
                                            <a class="btn btn-danger" href="process.php?deleteasalmula=<?php echo $data['id_asalmula']?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
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
