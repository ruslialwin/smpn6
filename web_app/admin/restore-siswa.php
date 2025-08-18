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
                    <h2 class="mt-4">Data Archive Siswa</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Archive Data Siswa
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tabel-siswa.php">Data Siswa</a>
                            <table id="example" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                        <th>Who</th>
                                        <th>Id siswa</th>
                                        <th>NIS lama</th>
                                        <th>NISN lama</th>
                                        <th>Nama lama</th>
                                        <th>JK lama</th>
                                        <th>TmptLahir lama</th>
                                        <th>TglLahir lama</th>
                                        <th>Agama lama</th>
                                        <th>Anak ke(lama)</th>
                                        <th>Jlh saudara(lama)</th>
                                        <th>Berat badan lama</th>
                                        <th>Tinggi badan lama</th>
                                        <th>Goldar lama</th>
                                        <th>No hp lama</th>
                                        <th>Alamat lama</th>
                                        <th>Status lama</th>
                                        <th>Foto lama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data log delete siswa di halaman admin */
                                    $log = "SELECT * FROM log_siswa WHERE aksi='delete'";

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
                                        $idlog = $data['id_log'];
                                            $idsiswa = $data['id_siswa']; 
                                            echo $idsiswa;
                                            ?>
                                        </td>
                                        <td><?php 
                                             $nis = $data['old_nis'];
                                             echo $nis;
                                            ?>
                                        </td>
                                        <td><?php 
                                            $nisn = $data['old_nisn'];
                                            echo $nisn;
                                        ?></td>
                                        <td><?php 
                                            $nama = $data['old_nama_lengkap'];
                                            echo $nama;
                                        ?></td>
                                        <td><?php 
                                            $jk = $data['old_jk'];
                                            echo $jk;
                                        ?></td>
                                        <td><?php 
                                            $tl = $data['old_tempat_lahir'];
                                            echo $tl;
                                        ?></td>
                                        <td><?php 
                                            $ttl = $data['old_tanggal_lahir'];
                                            echo $ttl;
                                        ?></td>
                                        <td><?php  
                                         $agama = $data['old_agama'];
                                         echo $agama;
                                        ?></td>
                                        <td><?php  
                                        $anakke = $data['old_anak_ke'];
                                        echo $anakke;
                                        ?></td>
                                        <td><?php  
                                            $jlhs = $data['old_jlh_saudara'];
                                            echo $jlhs;
                                        ?></td>
                                        <td><?php  
                                        $bb = $data['old_berat_badan'];
                                        echo $bb;
                                        ?></td>
                                        <td><?php 
                                         $tb = $data['old_tinggi_badan'];
                                        echo $tb;
                                        ?></td>
                                        <td><?php 
                                         $goldar = $data['old_gol_darah'];
                                        echo $goldar;
                                        ?></td>
                                        <td><?php  
                                        $hp = $data['old_no_hp'];
                                        echo $hp;
                                        ?></td>
                                        <td><?php 
                                         $alamat = $data['old_alamat'];
                                         echo $alamat;
                                        ?></td>
                                        <td><?php 
                                        $status =  $data['old_status'];
                                        echo $status;
                                        ?></td>
                                        <td><?php 
                                         $foto = $data['old_foto'];
                                         echo $foto;
                                        ?></td>
                                        <td>
                                             <!-- restore  -->
                                             <a class="btn btn-warning" href="restore-siswa.php?idrestoresiswa=<?php echo $data['id_siswa']?>" onclick="return confirm('Apakah anda yakin untuk restore data??')">
                                             <div class="sb-nav-link-icon"><i class="fas fa-trash-can-arrow-up"></i></div>
                                             Restore
                                            </a>

                                            <a class="btn btn-danger mt-3" href="restore-siswa.php?iddeletesiswa=<?php echo $data['id_log']?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?? Data yang terhapus tidak bisa dikembalikan!!')">
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
                    if(isset($_GET['idrestoresiswa'])){
                    $insert = "CALL restore_siswa($idsiswa,'$nis','$nisn','$nama','$jk', '$tl','$ttl', '$agama', $anakke,$jlhs,$bb,$tb,'$goldar','$hp','$alamat','$status','$foto',$idlog)";
                    $insertsiswa = mysqli_query($koneksi, $insert);
                    if ($insertsiswa) {
                        echo '<script>alert("Data siswa berhasil direstore")</script>';
                        echo '<script>window.location="restore-siswa.php"</script>';
                    } else {
                        /* echo 'gagal' . mysqli_error($koneksi); */
                        echo '<script>alert("Data tidak dapat direstore! '.mysqli_error($koneksi).'")</script>';
                        echo '<script>window.location="restore-siswa.php"</script>';
                    }
                    }

                    if(isset($_GET['iddeletesiswa'])){
                        $iddel = $_GET['iddeletesiswa'];
                        $delete = "DELETE FROM log_siswa WHERE id_log = $iddel";
                        $deletesiswa = mysqli_query($koneksi, $delete);
                        if ($deletesiswa) {
                            echo '<script>alert("Data siswa berhasil dihapus secara permanen")</script>';
                            echo '<script>window.location="restore-siswa.php"</script>';
                        } else {
                            /* echo 'gagal' . mysqli_error($koneksi); */
                            echo '<script>alert("Data tidak dapat dihapus! '.mysqli_error($koneksi).'")</script>';
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
