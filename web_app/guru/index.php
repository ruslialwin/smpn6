<?php
    session_start();

    if(empty($_SESSION['id_guru'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data guru pada halaman dashboard admin */
    $guru = "SELECT a.username, g.nama_lengkap, a.password, g.nip, a.id_guru FROM akun_guru a JOIN guru g ON g.id = a.id_guru  WHERE id_guru = '".$_SESSION['id_guru']."'";
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/Chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php 
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $nipguru = $get->nip;
                            $passguru = $get->password;
                        if ($passguru == $nipguru) {
                            ?>
                        <div class="alert alert-danger mt-3">
                            <strong>Ganti Password Default Akun Anda Menjadi Password Baru !! </strong>
                        </div>
                        <?php } ?>
                        <h1 class="mt-4">Selamat Datang di Halaman Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang <?php echo $get->nama_lengkap ?></li>
                        </ol>
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <?php
                                        
                                    ?>
                                    <div class="card-body">
                                        Data Profil
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="profile.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php
                                         $datawalikelas = "SELECT v.id_atur, v.kelas, v.tahun_pelajaran, v.semester, v.walikelas, p.id id_kelas FROM walikelas v JOIN pengaturan_kelas p ON p.id = v.id_atur WHERE id_guru = '".$_SESSION['id_guru']."' ";

                                         $kelas=mysqli_query($koneksi, $datawalikelas);
                                
                                        $jlhwalikelas = mysqli_num_rows($kelas);
                                    ?>
                                    <div class="card-body">
                                        Data WaliKelas
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhwalikelas; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="walikelas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php
                                         $dataekstrakurikuler = "SELECT v.ekstrakurikuler, v.keterangan, v.guru_pembina 
                                         FROM view_ekstrakurikuler v JOIN ekstrakurikuler e ON e.id = v.id WHERE id_guru = '".$_SESSION['id_guru']."'";
     
                                         $ekstrakurikuler=mysqli_query($koneksi, $dataekstrakurikuler);
                                        $jlhguru = mysqli_num_rows($ekstrakurikuler);
                                    ?>
                                    <div class="card-body">
                                        Data Guru Pembina
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhguru; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ekstrakurikuler.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $counts = "select id from pengaturan_kelas;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhk = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">Data Kelas (<?php 
                                            echo $jlhk; 
                                        ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pengaturan-kelas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4"><?php
                                        $counts = "select id from ekstrakurikuler;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhe = mysqli_num_rows($countss);
                                    ?>

                                    <div class="card-body">Data Ekstrakurikuler (<?php 
                                            echo $jlhe; 
                                        ?>)</div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-ekstrakurikuler.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <?php
                                        $counts = "select id from kegiatan";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhkeg = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Kegiatan
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhkeg; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-kegiatan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-light text-dark mb-4">
                                    <?php
                                        $counts = "select id from prestasi;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhpres = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Prestasi
                                        <text class="bold text-dark">(
                                        <?php 
                                            echo $jlhpres; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link" href="tabel-prestasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <?php
                                        $counts = "select id from fasilitas;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhf = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">Data Fasilitas (<?php 
                                            echo $jlhf; 
                                        ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-fasilitas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </main>
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
       
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
