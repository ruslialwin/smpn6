<?php
    session_start();

    if(empty($_SESSION['id_guru'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data akun guru pada halaman dashboard guru */
    $guru = "SELECT a.username, g.nama_lengkap FROM akun_guru a JOIN guru g ON g.id = a.id_guru WHERE id_guru = '".$_SESSION['id_guru']."'";
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
        <title>Data Ekstrakurikuler - Halaman Guru</title>
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
                    <h2 class="mt-4">Data Guru Pembina Ekstrakurikuler</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Guru Pembina
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Ekstrakurikuler</th>
                                        <th>Keterangan</th>
                                        <th>Nama Guru Pembina</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data ekstrakurikuler di halaman admin */
                                    /* $dataekstrakurikuler = "SELECT e.id id_ekskul, e.nama nama_ekskul, e.keterangan keterangan, g.nama_lengkap guru_pembina 
                                    FROM guru g JOIN ekstrakurikuler e ON e.id_guru = g.id WHERE id_guru = '".$_SESSION['id_guru']."'"; */
                                    
                                    $dataekstrakurikuler = "SELECT v.ekstrakurikuler, v.keterangan, v.guru_pembina 
                                    FROM view_ekstrakurikuler v JOIN ekstrakurikuler e ON e.id = v.id WHERE id_guru = '".$_SESSION['id_guru']."'";

                                    $ekstrakurikuler=mysqli_query($koneksi, $dataekstrakurikuler);
                                    if(mysqli_num_rows($ekstrakurikuler)>0){
                                    while($data = mysqli_fetch_array($ekstrakurikuler)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['ekstrakurikuler']?></td>
                                        <td><?php echo $data['keterangan']?></td>
                                        <td><?php echo $data['guru_pembina']?></td>
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
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
