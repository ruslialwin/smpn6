<?php
   include 'koneksi.php';

   /* query untuk menampilkan data siswa(yang ingin diupdate), di halaman update data siswa, untuk admin */
   $data_siswa = "SELECT nis, nisn, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, anak_ke, 
   jumlah_saudara, berat_badan, tinggi_badan, gol_darah, no_hp, alamat, foto, status FROM siswa WHERE id = '".$_GET['idsiswa']."'";

   $query = mysqli_query($koneksi, $data_siswa);
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
        <title>Update Data Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Siswa</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <img src="gambar/<?php echo $data->foto?>" width="50px">
                                <input type="hidden" name="namagambar" value="<?php echo $data->foto?>"> <!-- berisi nama foto  --> <br>
                                <input type="file" name="gambar" class="input-control pt-3">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nis">NIS</label>
                                <input type="number" name="nis" class="form-control" value="<?php echo $data->nis ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control" value="<?php echo $data->nisn ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data->nama_lengkap ?>">
                            </div>
                            <div class="mt-2">
                                <label for="jenis_kelamin">Jenis Kelamin</label> <br>
                                <?php $jenis_kelamin = $data->jenis_kelamin; ?>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L" <?php echo ($jenis_kelamin == 'L') ?'selected': '';?>>L</option>
                                    <option value="P" <?php echo ($jenis_kelamin == 'P') ? 'selected': '';?>>P</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data->tempat_lahir ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data->tanggal_lahir ?>">
                            </div>
                            <div class="mt-2">
                                <label for="agama">Agama</label> <br>
                                <?php $agama = $data->agama; ?>
                                <select name="agama" class="form-control">
                                    <option value="Islam" <?php echo ($agama == 'Islam') ?'selected': '';?>>Islam</option>
                                    <option value="Katolik" <?php echo ($agama == 'Katolik') ? 'selected': '';?>>Katolik</option>
                                    <option value="Protestan" <?php echo ($agama == 'Protestan') ? 'selected': '';?>>Protestan</option>
                                    <option value="Buddha" <?php echo ($agama == 'Buddha') ? 'selected': '';?>>Buddha</option>
                                    <option value="Hindu" <?php echo ($agama == 'Hindu') ? 'selected': '';?>>Hindu</option>
                                    <option value="Konghucu" <?php echo ($agama == 'Konghucu') ? 'selected': '';?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="anak_ke">Anak_ke</label>
                                <input type="number" name="anak_ke" class="form-control" value="<?php echo $data->anak_ke ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="jumlah_saudara">Jumlah Saudara</label>
                                <input type="number" name="jumlah_saudara" class="form-control" value="<?php echo $data->jumlah_saudara ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="berat_badan">Berat Badan (kg)</label>
                                <input type="number" name="berat_badan" class="form-control" value="<?php echo $data->berat_badan ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                <input type="number" name="tinggi_badan" class="form-control" value="<?php echo $data->tinggi_badan ?>">
                            </div>
                            <div class="mt-2">
                                <label for="gol_darah">Golongan Darah</label> <br>
                                <?php $gol_darah = $data->gol_darah; ?>
                                <select name="gol_darah" class="form-control">
                                    <option <?php echo ($gol_darah == 'O') ? "selected": "";?>>O</option>
                                    <option <?php echo ($gol_darah == 'A') ? "selected": "";?>>A</option>
                                    <option <?php echo ($gol_darah == 'B') ? "selected": "";?>>B</option>
                                    <option <?php echo ($gol_darah == 'AB') ? "selected": "";?>>AB</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="no_hp">Nomor hp</label>
                                <input type="number" name="no_hp" class="form-control" value="<?php echo $data->no_hp ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control"><?php echo $data->alamat ?></textarea>
                            </div>
                            <div class="mt-2">
                                <label for="status">Status</label> <br>
                                <?php $status = $data->status; ?>
                                <select name="status" class="form-control">
                                    <option <?php echo ($status == 'Aktif') ? "selected": "";?>>Aktif</option>
                                    <option <?php echo ($status == 'Pindah') ? "selected": "";?>>Pindah</option>
                                    <option <?php echo ($status == 'Lulus') ? "selected": "";?>>Lulus</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-siswa.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatesiswa" value="Update">
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['updatesiswa'])) {
                            $idsiswa         = $_GET['idsiswa']; 
                            $nis             = $_POST['nis'];
                            $nisn            = $_POST['nisn'];
                            $jenis_kelamin   = $_POST['jenis_kelamin'];
                            $nama_lengkap    = $_POST['nama_lengkap'];
                            $tempat_lahir    = $_POST['tempat_lahir'];
                            $tanggal_lahir   = $_POST['tanggal_lahir']; 
                            $agama           = $_POST['agama'];
                            $anak_ke         = $_POST['anak_ke'];
                            $jumlah_saudara  = $_POST['jumlah_saudara'];
                            $berat_badan     = $_POST['berat_badan'];
                            $tinggi_badan    = $_POST['tinggi_badan'];
                            $gol_darah       = $_POST['gol_darah'];
                            $no_hp           = $_POST['no_hp'];
                            $alamat          = $_POST['alamat'];
                            $status          = $_POST['status'];
                            $namagambar      = $_POST['namagambar'];

                            //menampung data gambar yang baru
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];
                            $part = explode('.', $filename);
                            $type = strtolower(end($part)); //array 0 berisi nama file, array 1 berisi tipe file

                            $newname = 'siswa' . time() . '.' . $type;

                            //menampung data format file yang diizinkan
                            $allowed_type = array('png', 'jpg', 'jpeg', 'gif');

                             // validasi jika admin ganti gambar
                             if ($filename != '') { //jika bagian upload gambar terisi

                                //validasi format file
                                if (!in_array($type, $allowed_type)) { //jika format file tidak terdapat dalam tipe yang diizinkan
                                    echo '<script>alert("Maaf, format file tidak sesuai!")</script>';
                                    echo '<script>window.location="tabel-siswa.php"</script>';
                                } else {
                                    unlink('gambar/' . $namagambar); // gambar lama di folder di delete
                                    move_uploaded_file($tmp_name, 'gambar/' . $newname); //gambar baru disimpan ke folder
                                    //tampung data gambar baru
                                    $new_image = $newname;
                                }
                            } else {
                                //jika admin tidak ganti gambar
                                $new_image = $namagambar;
                            }

                            /*  query untuk update data siswa di halaman admin */
                            $updatesiswa = "UPDATE siswa SET nis= $nis , nisn= $nisn, nama_lengkap= '$nama_lengkap' , jenis_kelamin = '$jenis_kelamin', tempat_lahir= '$tempat_lahir',
                            tanggal_lahir= '$tanggal_lahir', agama='$agama', anak_ke= $anak_ke, jumlah_saudara=$jumlah_saudara, 
                            berat_badan=$berat_badan, tinggi_badan=$tinggi_badan, gol_darah='$gol_darah', no_hp='$no_hp', alamat= '$alamat', foto = '$new_image', status = '$status' 
                            WHERE id = $idsiswa ";
                           
                            /*  PROCEDURE update_siswa */
                           /*  $updatesiswa = "CALL update_siswa($idsiswa,'$nis','$nisn','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$anak_ke', '$jumlah_saudara', 
                            '$berat_badan','$tinggi_badan','$gol_darah','$no_hp','$alamat','$newname','$status')";
 */
                            $update = mysqli_query($koneksi, $updatesiswa);
                            if($update){
                                echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                echo '<script>window.location="tabel-siswa.php"</script>';
                            } else {
                                /* die('Tidak bisa update nama'.mysqli_error($koneksi));  */   
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
