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
        <title>Tambah Data Siswa - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Siswa</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nis">NIS</label>
                                <input type="number" name="nis" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="jenis_kelamin">Jenis Kelamin</label> <br>
                                <select name="jenis_kelamin">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="agama">Agama</label> <br>
                                <select name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="anak_ke">Anak_ke</label>
                                <input type="number" name="anak_ke" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="jumlah_saudara">Jumlah Saudara</label>
                                <input type="number" name="jumlah_saudara" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="berat_badan">Berat Badan (kg)</label>
                                <input type="number" name="berat_badan" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                <input type="number" name="tinggi_badan" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="gol_darah">Golongan Darah</label> <br>
                                <select name="gol_darah">
                                    <option>O</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>AB</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="no_hp">Nomor hp</label>
                                <input type="number" name="no_hp" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="gambar">Foto</label> <br>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-siswa.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahsiswa" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahsiswa'])) {
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
                                
                                 //menampung data file yang diupload
                                 $filename = $_FILES['gambar']['name'];
                                 $tmp_name = $_FILES['gambar']['tmp_name'];
                                 
                                 //jika tidak ada gambar yang diupload
                                 if(empty($tmp_name)){
                                      /* query insert data siswa di halaman admin */
                                $insert = "INSERT INTO siswa(nis,nisn,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,anak_ke,jumlah_saudara,berat_badan,
                                tinggi_badan,gol_darah,no_hp,alamat) 
                                VALUES ('$nis','$nisn','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$anak_ke', '$jumlah_saudara', 
                                '$berat_badan','$tinggi_badan','$gol_darah','$no_hp','$alamat')";

                                $insertsiswa = mysqli_query($koneksi, $insert);
                                if ($insertsiswa) {
                                    echo '<script>alert("Data siswa berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-siswa.php"</script>';
                                } else {
                                    /* echo 'gagal' . mysqli_error($koneksi); */
                                    echo '<script>alert("Gagal '.mysqli_error($koneksi).'")</script>'; 
                                }
                                }
                                //jika ada gambar yang diupload
                                else{
                                    $part = explode('.', $filename);
                                    $type = $part[1]; //array 0 berisi nama file, array 1 berisi tipe file
                                
                                    $newname = 'siswa' . time() . '.' . $type;

                                    //menampung data format file yang diizinkan
                                    $allowed_type = array('png', 'jpg', 'jpeg', 'gif');
                                    //validasi format file
                                    if (!in_array($type, $allowed_type)) { //jika format file tidak terdapat dalam tipe yang diizinkan
                                        echo '<script>alert("Maaf, format file tidak sesuai!")</script>';
                                    } else {
                                        //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                                        //proses upload file sekaligus insert ke database
                                        move_uploaded_file($tmp_name, 'gambar/' . $newname);
                                        
                                        /* query insert data siswa di halaman admin */
                                       /*  $insert = "INSERT INTO siswa(nis,nisn,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,anak_ke,jumlah_saudara,berat_badan,
                                        tinggi_badan,gol_darah,no_hp,alamat,foto) 
                                        VALUES ('$nis','$nisn','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$anak_ke', '$jumlah_saudara', 
                                        '$berat_badan','$tinggi_badan','$gol_darah','$no_hp','$alamat','$newname')"; */

                                        /* PROCEDURE insert_siswa() */
                                    $insert = "CALL insert_siswa('$nis','$nisn','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$anak_ke', '$jumlah_saudara', 
                                    '$berat_badan','$tinggi_badan','$gol_darah','$no_hp','$alamat','$newname')";

                                        $insertsiswa = mysqli_query($koneksi, $insert);
                                        if ($insertsiswa) {
                                            echo '<script>alert("Data siswa berhasil ditambahkan")</script>';
                                            echo '<script>window.location="tabel-siswa.php"</script>';
                                        } else {
                                            /* echo 'gagal' . mysqli_error($koneksi); */
                                            echo '<script>alert("Data tidak dapat ditambah! '.mysqli_error($koneksi).'")</script>';
                                        }
                                    }
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
