<?php
   include 'koneksi.php';

   /* query untuk menampilkan data asal mula(yang ingin diupdate), di halaman update data asal mula, untuk admin */
   $dataasalmula = "SELECT a.nama_sd, a.alamat_sd, a.diterima_sd tgl_diterima, a.tamat_sd tgl_tamat, s.id id_siswa,
   s.nama_lengkap nama_siswa FROM siswa s JOIN asal_mula a ON a.id_siswa = s.id WHERE a.id = '".$_GET['idasalmula']."'";

   $query = mysqli_query($koneksi, $dataasalmula);
   $data = mysqli_fetch_object($query); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Data Asal Mula - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Asal Mula</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-2">
                                <label for="idsiswa">Nama Siswa</label> <br>
                                <?php $sid = $data->id_siswa; ?>
                                <select name="idsiswa" class="form-control" required>
                                    <?php
                                    $siswa = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM siswa");
                                    while($datasemuasiswa = mysqli_fetch_array($siswa)){
                                    ?>
                                    <option value="<?php echo $datasemuasiswa['id']?>" <?php echo ($sid == $datasemuasiswa['id']) ?'selected': '';?>>
                                        <?php echo $datasemuasiswa['nama_lengkap']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="namasd">Nama SD Asal</label>
                                <input type="text" name="namasd" class="form-control" value="<?php echo $data->nama_sd ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamatsd">Alamat SD Asal</label>
                                <textarea name="alamatsd" class="form-control"><?php echo $data->alamat_sd ?></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggalditerima">Tanggal Diterima SD</label>
                                <input type="date" name="tanggalditerima" class="form-control" value="<?php echo $data->tgl_diterima?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggaltamat">Tanggal Tamat SD</label>
                                <input type="date" name="tanggaltamat" class="form-control" value="<?php echo $data->tgl_tamat?>">
                            </div>
                            
                            <div class="form-group mt-2">
                                <a href="tabel-asalmula.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updateasalmula" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updateasalmula'])) {
                            $idasalmula         = $_GET['idasalmula']; 
                            $namasd             = $_POST['namasd'];
                            $alamatsd           = $_POST['alamatsd'];
                            $tanggalditerima    = $_POST['tanggalditerima'];
                            $tanggaltamat       = $_POST['tanggaltamat'];
                            $idsiswa            = $_POST['idsiswa'];

                            /*  query untuk update data asal mula di halaman admin */
                            /* $updateasalmula = "UPDATE asal_mula SET id_siswa= $idsiswa , nama_sd= '$namasd', alamat_sd= '$alamatsd', 
                            diterima_sd = '$tanggalditerima', tamat_sd ='$tanggaltamat' WHERE id = $idasalmula "; */
                           
                            $updateasalmula = "CALL update_asal_mula($idasalmula, $idsiswa, '$namasd', '$alamatsd', '$tanggalditerima', '$tanggaltamat')";
                            $update = mysqli_query($koneksi, $updateasalmula);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-asalmula.php"</script>';
                            } else {
                                /* die('Tidak bisa update nama'.mysqli_error($koneksi)); */    
                                echo '<script>alert("Tidak bisa update! '.mysqli_error($koneksi).'")</script>';
                            }
                        }

                        ?>
                    </div>
                </div>
            </main>
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
