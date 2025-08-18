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
                    <h2 class="mt-4">Data Archive Kelas</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Archive Kelas
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="pengaturan-kelas.php">Data Kelas</a>
                            <table id="example" class="dataTable-table">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Pengaturan Kelas</th>
                                            <th>Nama Kelas</th>
                                            <th>Id Tahun Pelajaran</th>
                                            <th>Tahun Pelajaran</th>
                                            <th>Id Walikelas</th>
                                            <th>Nama Walikelas</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data log delete prestasi di halaman admin */
                                    $log = "SELECT * FROM log_pengaturan_kelas WHERE aksi='delete'";

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
                                            $idp = $data['id_pengaturan_kelas'];
                                            $idlog = $data['id_log']; 
                                            echo $idp;
                                            ?>
                                        </td>
                                        <td><?php 
                                             $kelas = $data['old_nama_kelas'];
                                             echo $kelas;
                                            ?>
                                        </td>
                                        
                                        <td><?php 
                                            $idt = $data['old_id_tahun_pelajaran'];
                                            echo $idt;
                                        ?></td>
                                        <td>
                                            <?php
                                             $ta = mysqli_query($koneksi, "SELECT tahun_pelajaran, semester FROM tahun_pelajaran WHERE id = $idt");
                                             $thn = mysqli_fetch_array($ta);
                                             $tahun = $thn['tahun_pelajaran'];
                                            $sem = $thn['semester'];
                                            echo $tahun; ?> - <?php echo $sem;
                                            ?>
                                        </td>
                                        <td><?php 
                                            $idg = $data['old_id_guru'];
                                            echo $idg;
                                        ?></td>
                                        <td><?php 
                                            $nama = mysqli_query($koneksi, "SELECT nama_lengkap FROM guru WHERE id = $idg");
                                            $dn = mysqli_fetch_array($nama);
                                            $namaguru = $dn['nama_lengkap'];
                                            echo $namaguru;
                                        ?></td>
                                        <td>
                                             <!-- restore  -->
                                             <a class="btn btn-warning" href="restore-kelas.php?idrestorepk=<?php echo $data['id_pengaturan_kelas']?>" onclick="return confirm('Apakah anda yakin untuk restore data??')">
                                             <div class="sb-nav-link-icon"><i class="fas fa-trash-can-arrow-up"></i></div>
                                             Restore
                                            </a>

                                            <a class="btn btn-danger mt-3" href="restore-kelas.php?iddeletepk=<?php echo $data['id_log']?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?? Data yang terhapus tidak bisa dikembalikan!!')">
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
                    if(isset($_GET['idrestorepk'])){
                    $insert = "CALL restore_pengaturan_kelas($idp,'$kelas',$idt,$idg,$idlog)";
                    $insertpk = mysqli_query($koneksi, $insert);
                    if ($insertpk) {
                        echo '<script>alert("Data pengaturan kelas berhasil direstore")</script>';
                        echo '<script>window.location="restore-kelas.php"</script>';
                    } else {
                        /* echo 'gagal' . mysqli_error($koneksi); */
                        echo '<script>alert("Data tidak dapat direstore! '.mysqli_error($koneksi).'")</script>';
                    }
                    }

                    if(isset($_GET['iddeletepk'])){
                        $iddel = $_GET['iddeletepk'];
                        $delete = "DELETE FROM log_pengaturan_kelas WHERE id_log = $iddel";
                        $deletepk = mysqli_query($koneksi, $delete);
                        if ($deletepk) {
                            echo '<script>alert("Data pengaturan kelas berhasil dihapus secara permanen")</script>';
                            echo '<script>window.location="restore-kelas.php"</script>';
                        } else {
                            /* echo 'gagal' . mysqli_error($koneksi); */
                            echo '<script>alert("Data tidak dapat dihapus! '.mysqli_error($koneksi).'")</script>';
                            echo '<script>window.location="restore-kelas.php"</script>';
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
