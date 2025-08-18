<?php
   include 'koneksi.php';

   /* query untuk menampilkan data profil sekolah(yang ingin diupdate), di halaman update data profil sekolah untuk admin */
   $datasekolah = "SELECT nama, npsn, alamat, kode_pos, status, jenjang_pendidikan, akreditasi, email, visi, misi FROM profil_sekolah WHERE id = '".$_GET['idsekolah']."'";

   $query = mysqli_query($koneksi, $datasekolah);
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
        <title>Update Profil Sekolah - Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Edit Profil Sekolah</h2>
                    <div class="row justify-content-center">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label for="nama">Nama Sekolah</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $data->nama ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="npsn">NPSN</label>
                                <input type="number" name="npsn" class="form-control" value="<?php echo $data->npsn ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="alamat">alamat</label>
                                <textarea name="alamat" class="form-control"><?php echo $data->alamat ?></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="kode_pos">Kode pos</label>
                                <input type="number" name="kode_pos" class="form-control" value="<?php echo $data->kode_pos ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" value="<?php echo $data->status ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="jenjang_pendidikan">Jenjang pendidikan</label>
                                <input type="text" name="jenjang_pendidikan" class="form-control" value="<?php echo $data->jenjang_pendidikan ?>">
                            </div>
                            <div class="mt-2">
                                <label for="akreditasi">Akreditasi</label> <br>
                                <?php $akreditasi = $data->akreditasi; ?>
                                <select name="akreditasi">
                                    <option value="A" <?php echo ($akreditasi == 'A') ?'selected': '';?>>A</option>
                                    <option value="B" <?php echo ($akreditasi == 'B') ? 'selected': '';?>>B</option>
                                    <option value="C" <?php echo ($akreditasi == 'C') ? 'selected': '';?>>C</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $data->email ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="visi">Visi</label>
                                <textarea name="visi" class="form-control"><?php echo $data->visi ?></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="misi">Misi</label>
                                <textarea name="misi" class="form-control"><?php echo $data->misi ?></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <a href="profil-sekolah.php" class="btn btn-secondary mt-3">Kembali</a>
                                <input type="submit" class="btn btn-success mt-3 mx-3" name="updatesekolah" value="Update">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['updatesekolah'])) {
                                $idsekolah          = $_GET['idsekolah']; 
                                $nama               = $_POST['nama'];
                                $npsn               = $_POST['npsn'];
                                $alamat             = $_POST['alamat'];
                                $kode_pos           = $_POST['kode_pos'];
                                $status             = $_POST['status'];
                                $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
                                $akreditasi         = $_POST['akreditasi'];
                                $email              = $_POST['email'];
                                $visi               = $_POST['visi'];
                                $misi               = $_POST['misi'];

                                /*  query untuk update profil sekolah di halaman admin */
                                $updatesekolah = "UPDATE profil_sekolah SET nama= '$nama', npsn=$npsn, alamat = '$alamat', kode_pos = '$kode_pos', 
                                status = '$status', jenjang_pendidikan = '$jenjang_pendidikan', akreditasi = '$akreditasi', email = '$email', 
                                visi = '$visi', misi = '$misi' WHERE id = $idsekolah ";

                                /* PROCEDURE update_profil_sekolah */
                                /* $updatesekolah = "CALL update_profil_sekolah($idsekolah, '$nama', $npsn, '$alamat','$kode_pos','$status','$jenjang_pendidikan','$akreditasi','$email','$visi','$misi')"; */
                                $update = mysqli_query($koneksi, $updatesekolah);
                                if($update){
                                    echo '<script>alert("Data telah berhasil diupdate!")</script>';
                                    echo '<script>window.location="profil-sekolah.php"</script>';
                                } else {
                                    /* die('Tidak bisa update'.mysqli_error($koneksi));    */ 
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
