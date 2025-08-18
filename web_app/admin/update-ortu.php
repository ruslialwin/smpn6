<?php
   include 'koneksi.php';

   /* query untuk menampilkan data orang tua(yang ingin diupdate), di halaman update data orang tua siswa, untuk admin */
   $dataortu = "SELECT o.nama_ayah, o.nama_ibu, o.pendidikan_ayah, o.pendidikan_ibu, o.tempat_lahir_ayah, o.tempat_lahir_ibu, 
    o.tgl_lahir_ayah, o.tgl_lahir_ibu, o.pekerjaan_ayah, o.pekerjaan_ibu, o.nama_wali, o.pendidikan_wali, o.hub_thd_siswa, o.pekerjaan_wali,
    o.no_hp, s.id id_siswa, s.nama_lengkap nama_siswa FROM siswa s JOIN ortu o ON o.id_siswa = s.id WHERE o.id = '".$_GET['idortu']."'";

   $query = mysqli_query($koneksi, $dataortu);
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
        <title>Update Data Orang Tua Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Orang Tua Siswa</h2>
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
                                <label for="namaayah">Nama Ayah</label>
                                <input type="text" name="namaayah" class="form-control" required value="<?php echo $data->nama_ayah?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="namaibu">Nama Ibu</label>
                                <input type="text" name="namaibu" class="form-control" required value="<?php echo $data->nama_ibu?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanayah">Pendidikan Ayah</label>
                                <input type="text" name="pendidikanayah" class="form-control" required value="<?php echo $data->pendidikan_ayah?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanibu">Pendidikan Ibu</label>
                                <input type="text" name="pendidikanibu" class="form-control" required value="<?php echo $data->pendidikan_ibu?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tempatlahirayah">Tempat Lahir Ayah</label>
                                <input type="text" name="tempatlahirayah" class="form-control" required value="<?php echo $data->tempat_lahir_ayah?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tempatlahiribu">Tempat Lahir Ibu</label>
                                <input type="text" name="tempatlahiribu" class="form-control" required value="<?php echo $data->tempat_lahir_ibu?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggallahirayah">Tanggal Lahir Ayah</label>
                                <input type="date" name="tanggallahirayah" class="form-control" required value="<?php echo $data->tgl_lahir_ayah?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggallahiribu">Tanggal Lahir Ibu</label>
                                <input type="date" name="tanggallahiribu" class="form-control" required value="<?php echo $data->tgl_lahir_ibu?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanayah">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaanayah" class="form-control" required value="<?php echo $data->pekerjaan_ayah?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanibu">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaanibu" class="form-control" required value="<?php echo $data->pekerjaan_ibu?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="namawali">Nama Wali</label>
                                <input type="text" name="namawali" class="form-control" value="<?php echo $data->nama_wali?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanwali">Pendidikan Wali</label>
                                <input type="text" name="pendidikanwali" class="form-control" value="<?php echo $data->pendidikan_wali?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="hubunganterhadapsiswa">Hubungan Terhadap Siswa</label>
                                <input type="text" name="hubunganterhadapsiswa" class="form-control" value="<?php echo $data->hub_thd_siswa?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanwali">Pekerjaan Wali</label>
                                <input type="text" name="pekerjaanwali" class="form-control" value="<?php echo $data->pekerjaan_wali?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nohp">Nomor Hp Orang Tua/Wali</label>
                                <input type="number" name="nohp" class="form-control" required value="<?php echo $data->no_hp?>">
                            </div>
                            
                            <div class="form-group mt-2">
                                <a href="tabel-ortu.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updateortu" value="Update">
                            </div>
                            
                        </form>
                        <?php
                        if(isset($_POST['updateortu'])) {
                            $idortu                    = $_GET['idortu']; 
                            $namaayah                  = $_POST['namaayah'];
                            $namaibu                   = $_POST['namaibu'];
                            $pendidikanayah            = $_POST['pendidikanayah'];
                            $pendidikanibu             = $_POST['pendidikanibu'];
                            $tempatlahirayah           = $_POST['tempatlahirayah'];    
                            $tempatlahiribu            = $_POST['tempatlahiribu'];  
                            $tanggallahirayah          = $_POST['tanggallahirayah'];
                            $tanggallahiribu           = $_POST['tanggallahiribu'];
                            $pekerjaanayah             = $_POST['pekerjaanayah'];
                            $pekerjaanibu              = $_POST['pekerjaanibu'];
                            $namawali                  = $_POST['namawali'];
                            $pendidikanwali            = $_POST['pendidikanwali'];
                            $hubunganterhadapsiswa     = $_POST['hubunganterhadapsiswa'];
                            $pekerjaanwali             = $_POST['pekerjaanwali'];
                            $nohp                      = $_POST['nohp'];
                            $idsiswa                   = $_POST['idsiswa'];

                            /*  query untuk update data orang tua siswa di halaman admin */
                            /* $updateortu = "UPDATE ortu SET id_siswa= $idsiswa , nama_ayah= '$namaayah', nama_ibu= '$namaibu', 
                            pendidikan_ayah = '$pendidikanayah', pendidikan_ibu ='$pendidikanibu',tempat_lahir_ayah = '$tempatlahirayah',
                            tempat_lahir_ibu = '$tempatlahiribu', tgl_lahir_ayah = '$tanggallahirayah', tgl_lahir_ibu = '$tanggallahiribu',
                            pekerjaan_ayah = '$pekerjaanayah', pekerjaan_ibu = '$pekerjaanibu', nama_wali = '$namawali', pendidikan_wali = '$pendidikanwali',
                            hub_thd_siswa = '$hubunganterhadapsiswa', pekerjaan_wali = '$pekerjaanwali', no_hp = '$nohp'  WHERE id = $idortu "; */
                             
                            /* PROCEDURE update_ortu */
                            $updateortu = "CALL update_ortu($idortu,$idsiswa, '$namaayah','$namaibu','$pendidikanayah','$pendidikanibu','$tempatlahirayah',
                            '$tempatlahiribu','$tanggallahirayah','$tanggallahiribu','$pekerjaanayah','$pekerjaanibu','$namawali','$pendidikanwali',
                            '$hubunganterhadapsiswa','$pekerjaanwali','$nohp')";
                            $update = mysqli_query($koneksi, $updateortu);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-ortu.php"</script>';
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
