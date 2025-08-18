<?php
   include 'koneksi.php';
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Data Orang Tua Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Orang Tua Siswa</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="idsiswa">Nama Siswa</label> <br>
                                <select name="idsiswa" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    <?php
                                    $siswa = mysqli_query($koneksi, "SELECT id, nama_lengkap FROM siswa");
                                    while($data = mysqli_fetch_array($siswa)){
                                    ?>
                                    <option value="<?php echo $data['id']?>"><?php echo $data['nama_lengkap']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="namaayah">Nama Ayah</label>
                                <input type="text" name="namaayah" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="namaibu">Nama Ibu</label>
                                <input type="text" name="namaibu" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanayah">Pendidikan Ayah</label>
                                <input type="text" name="pendidikanayah" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanibu">Pendidikan Ibu</label>
                                <input type="text" name="pendidikanibu" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tempatlahirayah">Tempat Lahir Ayah</label>
                                <input type="text" name="tempatlahirayah" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tempatlahiribu">Tempat Lahir Ibu</label>
                                <input type="text" name="tempatlahiribu" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggallahirayah">Tanggal Lahir Ayah</label>
                                <input type="date" name="tanggallahirayah" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggallahiribu">Tanggal Lahir Ibu</label>
                                <input type="date" name="tanggallahiribu" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanayah">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaanayah" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanibu">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaanibu" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="namawali">Nama Wali</label>
                                <input type="text" name="namawali" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pendidikanwali">Pendidikan Wali</label>
                                <input type="text" name="pendidikanwali" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="hubunganterhadapsiswa">Hubungan Terhadap Siswa</label>
                                <input type="text" name="hubunganterhadapsiswa" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pekerjaanwali">Pekerjaan Wali</label>
                                <input type="text" name="pekerjaanwali" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nohp">Nomor Hp Orang Tua/Wali</label>
                                <input type="number" name="nohp" class="form-control" required>
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-ortu.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahortu" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahortu'])) {
                                $idsiswa         = $_POST['idsiswa'];
                                $namaayah          = $_POST['namaayah'];
                                $namaibu        = $_POST['namaibu'];
                                $pendidikanayah = $_POST['pendidikanayah'];
                                $pendidikanibu    = $_POST['pendidikanibu'];
                                $tempatlahirayah = $_POST['tempatlahirayah'];    
                                $tempatlahiribu = $_POST['tempatlahiribu'];  
                                $tanggallahirayah = $_POST['tanggallahirayah'];
                                $tanggallahiribu = $_POST['tanggallahiribu'];
                                $pekerjaanayah = $_POST['pekerjaanayah'];
                                $pekerjaanibu = $_POST['pekerjaanibu'];
                                $namawali = $_POST['namawali'];
                                $pendidikanwali = $_POST['pendidikanwali'];
                                $hubunganterhadapsiswa = $_POST['hubunganterhadapsiswa'];
                                $pekerjaanwali = $_POST['pekerjaanwali'];
                                $nohp = $_POST['nohp'];
                                
                                /* query insert data ortu di halaman admin */
                               /*  $insert = "INSERT INTO ortu(id_siswa,nama_ayah,nama_ibu,pendidikan_ayah,pendidikan_ibu,tempat_lahir_ayah, 
                                tempat_lahir_ibu,tgl_lahir_ayah,tgl_lahir_ibu,pekerjaan_ayah,pekerjaan_ibu,nama_wali,pendidikan_wali,hub_thd_siswa,
                                pekerjaan_wali,no_hp) VALUES ($idsiswa,'$namaayah','$namaibu','$pendidikanayah','$pendidikanibu','$tempatlahirayah',
                                '$tempatlahiribu','$tanggallahirayah','$tanggallahiribu','$pekerjaanayah','$pekerjaanibu','$namawali','$pendidikanwali',
                                '$hubunganterhadapsiswa','$pekerjaanwali','$nohp')"; */
                                $insert = "CALL insert_ortu($idsiswa, '$namaayah','$namaibu','$pendidikanayah','$pendidikanibu','$tempatlahirayah',
                                '$tempatlahiribu','$tanggallahirayah','$tanggallahiribu','$pekerjaanayah','$pekerjaanibu','$namawali','$pendidikanwali',
                                '$hubunganterhadapsiswa','$pekerjaanwali','$nohp')";

                                $insertortu = mysqli_query($koneksi, $insert);
                                if ($insertortu) {
                                    echo '<script>alert("Data orang tua siswa berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-ortu.php"</script>';
                                } else {
                                    /* echo 'gagal' . mysqli_error($koneksi); */
                                    echo '<script>alert("Data tidak dapat ditambah! '.mysqli_error($koneksi).'")</script>';
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
