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
        <title>Tabel Data Orang Tua - Halaman Admin</title>
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
                    <h2 class="mt-4">Data Orang Tua</h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabel Data Orang Tua
                        </div>
                        <div class="card-body">
                            <a class="btn btn-info mb-3" href="tambah-ortu.php">Tambah Data Orang Tua</a>
                            <table id="example" class="dataTable-table">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Pendidikan Ayah</th>
                                        <th>Pendidikan Ibu</th>
                                        <th>Tempat Lahir Ayah</th>
                                        <th>Tempat Lahir Ibu</th>
                                        <th>Tanggal Lahir Ayah</th>
                                        <th>Tanggal Lahir Ibu</th>
                                        <th>Pekerjaan Ayah</th>
                                        <th>Pekerjaan Ibu</th>
                                        <th>Nama Wali</th>
                                        <th>Pendidikan Wali</th>
                                        <th>Hubungan terhadap siswa</th>
                                        <th>Pekerjaan Wali</th>
                                        <th>No hp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;

                                /*  query menampilkan data semua ortu di halaman admin */
                                    $dataortu = "SELECT o.id id_ortu, o.nama_ayah, o.nama_ibu, o.pendidikan_ayah, o.pendidikan_ibu, o.tempat_lahir_ayah, o.tempat_lahir_ibu, 
                                    o.tgl_lahir_ayah, o.tgl_lahir_ibu, o.pekerjaan_ayah, o.pekerjaan_ibu, o.nama_wali, o.pendidikan_wali, o.hub_thd_siswa, o.pekerjaan_wali,
                                    o.no_hp, s.nama_lengkap nama_siswa FROM siswa s JOIN ortu o ON o.id_siswa = s.id ";

                                    $ortu=mysqli_query($koneksi, $dataortu);
                                    if(mysqli_num_rows($ortu)>0){
                                    while($data = mysqli_fetch_array($ortu)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data['nama_siswa']?></td>
                                        <td><?php echo $data['nama_ayah']?></td>
                                        <td><?php echo $data['nama_ibu']?></td>
                                        <td><?php echo $data['pendidikan_ayah']?></td>
                                        <td><?php echo $data['pendidikan_ibu']?></td>
                                        <td><?php echo $data['tempat_lahir_ayah']?></td>
                                        <td><?php echo $data['tempat_lahir_ibu']?></td>
                                        <td><?php echo $data['tgl_lahir_ayah']?></td>
                                        <td><?php echo $data['tgl_lahir_ibu']?></td>
                                        <td><?php echo $data['pekerjaan_ayah']?></td>
                                        <td><?php echo $data['pekerjaan_ibu']?></td>
                                        <?php
                                            if (empty($data['nama_wali'])) {
                                        ?>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                            <td> - </td>
                                        <?php } else{ ?>
                                            <td><?php echo $data['nama_wali'] ?></td>
                                            <td><?php echo $data['pendidikan_wali'] ?></td>
                                            <td><?php echo $data['hub_thd_siswa'] ?></td>
                                            <td><?php echo $data['pekerjaan_wali'] ?></td>
                                            <td><?php echo $data['no_hp'] ?></td>
                                        <?php } ?>    
                                        <td>
                                            <!-- query update pada update-ortu.php -->
                                            <a class="btn btn-success" href="update-ortu.php?idortu=<?php echo $data['id_ortu']?>">Edit</a>
                                            <!-- query delete pada process.php -->
                                            <a class="btn btn-danger" href="process.php?deleteortu=<?php echo $data['id_ortu']?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
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
