<?php
   include 'koneksi.php';

   /* query untuk menampilkan data fasilitas(yang ingin diupdate), di halaman update data fasilitas untuk admin */
   $data_fasilitas = "SELECT judul, deskripsi, gambar FROM fasilitas WHERE id = '".$_GET['idfasilitas']."'";

   $query = mysqli_query($koneksi, $data_fasilitas);
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
        <title>Update Data Fasilitas - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Data Fasilitas</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <img src="gambar/<?php echo $data->gambar?>" width="100px">
                                <input type="hidden" name="namagambar" value="<?php echo $data->gambar?>"> <!-- berisi nama foto  --> <br>
                                <input type="file" name="gambar" class="input-control pt-3">
                            </div>
                            <div class="form-group mt-3">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo $data->judul ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control"><?php echo $data->deskripsi ?></textarea>
                            </div>

                            <div class="form-group mt-2">
                                <a href="tabel-fasilitas.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatefasilitas" value="Update">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['updatefasilitas'])) {
                                $idfasilitas     = $_GET['idfasilitas']; 
                                $judul           = $_POST['judul'];
                                $deskripsi       = $_POST['deskripsi'];
                                $namagambar = $_POST['namagambar'];
                                //menampung data gambar yang baru
                                $filename = $_FILES['gambar']['name'];
                                $tmp_name = $_FILES['gambar']['tmp_name'];
                                $part = explode('.', $filename);
                                $type = strtolower(end($part)); //array 0 berisi nama file, array 1 berisi tipe file

                                $newname = 'fasilitas' . time() . '.' . $type;

                                //menampung data format file yang diizinkan
                                $allowed_type = array('png', 'jpg', 'jpeg', 'gif');

                                // validasi jika admin ganti gambar
                                if ($filename != '') { //jika bagian upload gambar terisi

                                    //validasi format file
                                    if (!in_array($type, $allowed_type)) { //jika format file tidak terdapat dalam tipe yang diizinkan
                                        echo '<script>alert("Maaf, format file tidak sesuai!")</script>';
                                        echo '<script>window.location="tabel-fasilitas.php"</script>';
                                    } else {
                                        unlink('gambar/' . $namagambar); // gambar lama di folder di delete
                                        move_uploaded_file($tmp_name, 'gambar/' . $newname); //gambar baru disimpan ke folder
                                        //tampung data gambar baru
                                        $new_image = $newname;
                                    }
                                } else {
                                    //jika admin tidak ganti gambar
                                    $new_image = $img_name;
                                }

                                /*  query untuk update data fasilitas di halaman admin */
                               /*  $updatefasilitas = "UPDATE fasilitas SET judul= '$judul', deskripsi='$deskripsi' , gambar = '$new_image'
                                WHERE id = $idfasilitas "; */

                                /* PROCEDURE update_fasilitas */
                                $updatefasilitas = "CALL update_fasilitas($idfasilitas,'$judul','$deskripsi','$new_image')";
                                
                                $update = mysqli_query($koneksi, $updatefasilitas);
                                if($update){
                                    echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                    echo '<script>window.location="tabel-fasilitas.php"</script>';
                                } else {
                                    /* die('Tidak bisa update'.mysqli_error($koneksi)); */    
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
