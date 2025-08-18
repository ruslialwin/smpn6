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
        <title>Tabel Data Profil Sekolah - Halaman Admin</title>
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
                    <h2 class="mt-4">Data Profil Sekolah</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Profil Sekolah
                        </div>
                        <div class="card-body">
                            <table class="table">
                            <?php
                            /*  query menampilkan data profil sekolah di halaman admin */
                                $datasekolah = "SELECT id, nama, npsn, alamat, kode_pos, status, jenjang_pendidikan, akreditasi, email, visi, misi FROM profil_sekolah";

                                $sekolah=mysqli_query($koneksi, $datasekolah);
                                $data = mysqli_fetch_array($sekolah);
                            ?>
                                <tbody>
                                    <tr>
                                        <th>Nama Sekolah</th>
                                        <td><?php echo $data['nama']?></td>
                                    </tr>
                                    <tr>
                                        <th>NPSN</th>
                                        <td><?php echo $data['npsn']?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo $data['alamat']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Kode Pos</th>
                                        <td><?php echo $data['kode_pos']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Status</th>
                                        <td><?php echo $data['status']?></td>
                                    </tr>   
                                    <tr>
                                        <th>Jenjang Pendidikan</th>
                                        <td><?php echo $data['jenjang_pendidikan']?></td>
                                    </tr>  
                                    <tr>
                                        <th>Akreditasi</th>
                                        <td><?php echo $data['akreditasi']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $data['email']?></td>
                                    </tr>   
                                    <tr>
                                        <th>Visi</th>
                                        <td><?php echo $data['visi']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Misi</th>
                                        <td><?php echo nl2br($data['misi']);?></td>
                                    </tr>   
                                    <tr>   
                                        <td colspan='2'>
                                            <!-- query update ada pada update-sekolah.php -->
                                            <a class="btn btn-success" href="update-sekolah.php?idsekolah=<?php echo $data['id']?>">Edit</a>
                                        </td>
                                    </tr>
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
