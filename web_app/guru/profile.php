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
        <title>Data Profil Guru - Halaman Guru</title>
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
                    <h2 class="mt-4">Profil Guru</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Profil
                        </div>
                        <div class="card-body">
                            <table class="table">
                            <?php
                            /*  query menampilkan data profil guru di halaman guru */
                                $dataguru = "SELECT nip, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, golongan_darah, jenjang, no_hp, foto FROM guru WHERE id = '".$_SESSION['id_guru']."'";

                                $guru=mysqli_query($koneksi, $dataguru);
                                $data = mysqli_fetch_array($guru);
                            ?>
                                <tbody>
                                    <tr>
                                        <th>NIP</th>
                                        <td><?php echo $data['nip']?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama lengkap</th>
                                        <td><?php echo $data['nama_lengkap']?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td><?php echo $data['jenis_kelamin']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td><?php echo $data['tempat_lahir']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td><?php echo $data['tanggal_lahir']?></td>
                                    </tr>   
                                    <tr>
                                        <th>Agama</th>
                                        <td><?php echo $data['agama']?></td>
                                    </tr>  
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td><?php echo $data['golongan_darah']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Jenjang</th>
                                        <td><?php echo $data['jenjang']?></td>
                                    </tr>   
                                    <tr>
                                        <th>Nomor hp</th>
                                        <td><?php echo $data['no_hp']?></td>
                                    </tr>    
                                    <tr>
                                        <th>Foto</th>
                                        <?php
                                            if (empty($data['foto'])){
                                        ?>
                                            <td> - </td>
                                        <?php } else{ ?>
                                            <td><img src="../admin/gambar/<?php echo $data['foto']?>" width="50px"></td>
                                        <?php } ?>
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
