<?php
    session_start();
    include 'koneksi.php';
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Direktori Siswa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            <!-- /* Styles for wrapping the search box */ -->

            .main {
                width: 50%;
                margin: 50px auto;
            }

            .center{
                margin: 5px auto;
            }

            td{
                vertical-align: top;
            }

        </style>
    </head>
    <body class="bg-dark">
        <div class="main">
            <div class="text-center">
                <a href="index.php" class="btn btn-primary">Halaman Home</a>
            </div>
            <h1 class="mt-4 text-center text-light">Selamat Datang di</h1> 
            <p class="mt-2 text-center text-light" style="font-size:64px"><b>Direktori Siswa</b></p>  
            
            <!-- search bar -->
            <div class="row mt-4">
                <div class="col text-center">
                    <form class="form-inline my-2 my-lg-0" action="direktori-siswa.php" method="get">
                        <div class="row">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Masukkan NIS/Nama" aria-label="Search" style="width:600px" required <?php if(isset($_GET['search'])){ ?>
                                value = "<?php echo $_GET['search']?>"
                            <?php } ?>>
                            <button class="btn btn-primary my-2 my-sm-0" type="submit" style="width:50px">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <?php
                /* query menampilkan data siswa*/
                if(isset($_GET['search'])){
                    /* query menampilkan data siswa berdasarkan kata yg disearch */
                    /* $siswa = mysqli_query($koneksi, "SELECT nis, nama_lengkap, status FROM siswa WHERE nis = '".$_GET['search']."' OR nama_lengkap LIKE '%".$_GET['search']."%'");  */
                    $siswa = mysqli_query($koneksi, "SELECT nis, nama_lengkap, status FROM view_status_siswa WHERE nis = '".$_GET['search']."' OR nama_lengkap LIKE '%".$_GET['search']."%'"); 
                }
                if(mysqli_num_rows($siswa)>0){
                    while($data = mysqli_fetch_array($siswa)){
            ?>
            <div class="card main" >
                <img src="image/profile.png" alt="" class="border-bottom center" style="height:172px; width:200px;">
                <div class="row">
                    <div class="card-body center">
                        <table class="mt-0 ml-4">
                            <tr>
                                <td>NIS </td>
                                <td> : <?php echo $data['nis']?></td>
                            </tr>
                            <tr>
                                <td>Nama </td>
                                <td> : <?php echo $data['nama_lengkap']?></td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td> : <i><?php echo $data['status']?></i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <?php }}else { ?>
                <p class="mt-4 text-light">Pencarian data siswa : <?php echo $_GET['search']?>, tidak ditemukan</p>
            <?php } ?>
        </div>  
        
    </body>

    

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</html>