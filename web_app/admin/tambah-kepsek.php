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
        <title>Tambah Data Kepala Sekolah - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Kepala Sekolah</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control">
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
                                <label for="jenjang">Jenjang Pendidikan</label>
                                <input type="text" name="jenjang" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="masa_jabatan">Masa Jabatan</label>
                                <input type="text" name="masa_jabatan" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="gambar">Foto</label> <br>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-kepsek.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahkepsek" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahkepsek'])) {
                                $nip             = $_POST['nip'];
                                $jenis_kelamin   = $_POST['jenis_kelamin'];
                                $nama_lengkap    = $_POST['nama_lengkap'];
                                $tempat_lahir    = $_POST['tempat_lahir'];
                                $tanggal_lahir   = $_POST['tanggal_lahir']; 
                                $agama           = $_POST['agama'];
                                $jenjang         = $_POST['jenjang'];
                                $masa_jabatan    = $_POST['masa_jabatan'];

                                //menampung data file yang diupload
                                $filename = $_FILES['gambar']['name'];
                                $tmp_name = $_FILES['gambar']['tmp_name'];
                                
                                //jika tidak ada gambar yang diupload
                                if(empty($tmp_name)){
                                     /* query insert data kepala sekolah di halaman admin */
                                /* $insert = "INSERT INTO kepala_sekolah(nip,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,jenjang,masa_jabatan) 
                                VALUES ('$nip','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama','$jenjang','$masa_jabatan')"; */

                                /* PROCEDURE insert_kepala_sekolah */
                                $insert = "CALL insert_kepala_sekolah('$nip','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama','$jenjang','$masa_jabatan')";

                                $insertkepsek = mysqli_query($koneksi, $insert);
                                if ($insertkepsek) {
                                    echo '<script>alert("Data kepala sekolah berhasil ditambahkan")</script>';
                                    echo '<script>window.location="tabel-kepsek.php"</script>';
                                } else {
                                    echo 'gagal' . mysqli_error($koneksi);
                                }
                               }
                                //jika ada gambar yang diupload
                                else{
                                    $part = explode('.', $filename);
                                    $type = $part[1]; //array 0 berisi nama file, array 1 berisi tipe file
                                
                                    $newname = 'kepsek' . time() . '.' . $type;
    
                                    //menampung data format file yang diizinkan
                                    $allowed_type = array('png', 'jpg', 'jpeg', 'gif');
                                    //validasi format file
                                    if (!in_array($type, $allowed_type)) { //jika format file tidak terdapat dalam tipe yang diizinkan
                                        echo '<script>alert("Maaf, format file tidak sesuai!")</script>';
                                } else {
                                    //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                                    //proses upload file sekaligus insert ke database
                                    move_uploaded_file($tmp_name, 'gambar/' . $newname);

                                    /* query insert data kepala sekolah di halaman admin */
                                    $insert = "INSERT INTO kepala_sekolah(nip,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,jenjang,masa_jabatan,foto) 
                                VALUES ('$nip','$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama','$jenjang','$masa_jabatan','$newname')";

                                    $insertkepsek = mysqli_query($koneksi, $insert);
                                    if ($insertkepsek) {
                                        echo '<script>alert("Data kepala sekolah berhasil ditambahkan")</script>';
                                        echo '<script>window.location="tabel-kepsek.php"</script>';
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
