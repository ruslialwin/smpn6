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
        <title>Tambah Data Fasilitas - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Tambah Data Fasilitas</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="gambar">Gambar</label> <br>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <a href="tabel-fasilitas.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="tambahfasilitas" value="Tambah">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['tambahfasilitas'])) {
                                $judul             = $_POST['judul'];
                                $deskripsi         = $_POST['deskripsi'];
                          
                                //menampung data file yang diupload
                                $filename = $_FILES['gambar']['name'];
                                $tmp_name = $_FILES['gambar']['tmp_name'];
                                
                                //jika tidak ada gambar yang diupload
                                if(empty($tmp_name)){
                                    /* query insert data fasilitas di halaman admin */
                                    $insert = "INSERT INTO fasilitas(judul,deskripsi) 
                                    VALUES ('$judul','$deskripsi')";

                                    $insertfasilitas = mysqli_query($koneksi, $insert);
                                    if ($insertfasilitas) {
                                        echo '<script>alert("Data fasilitas berhasil ditambahkan")</script>';
                                        echo '<script>window.location="tabel-fasilitas.php"</script>';
                                    } else {
                                        echo 'gagal' . mysqli_error($koneksi);
                                    }
                                }
                                //jika ada gambar yang diupload
                                else{
                                    $part = explode('.', $filename);
                                    $type = $part[1]; //array 0 berisi nama file, array 1 berisi tipe file
                                
                                    $newname = 'kegiatan' . time() . '.' . $type;

                                    //menampung data format file yang diizinkan
                                    $allowed_type = array('png', 'jpg', 'jpeg', 'gif');
                                    //validasi format file
                                    if (!in_array($type, $allowed_type)) { //jika format file tidak terdapat dalam tipe yang diizinkan
                                        echo '<script>alert("Maaf, format file tidak sesuai!")</script>';
                                    } else {
                                        //jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                                        //proses upload file sekaligus insert ke database
                                        move_uploaded_file($tmp_name, 'gambar/' . $newname);
                                        
                                        /* query insert data fasilitas di halaman admin */
                                        $insert = "INSERT INTO fasilitas(judul,deskripsi,gambar) 
                                        VALUES ('$judul','$deskripsi','$newname')"; 

                                       /*  PROCEDURE insert_fasilitas */
                                        // $insert = "insert_fasilitas('$judul','$deskripsi','$newname')";

                                        $insertfasilitas = mysqli_query($koneksi, $insert);
                                        if ($insertfasilitas) {
                                            echo '<script>alert("Data fasilitas berhasil ditambahkan")</script>';
                                            echo '<script>window.location="tabel-fasilitas.php"</script>';
                                        } else {
                                           /*  echo 'gagal' . mysqli_error($koneksi); */
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
