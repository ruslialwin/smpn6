<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/play-books.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Website Resmi SMP Negeri 6 Tebing Tinggi</title>
</head>
<body>
<div class="container">
        <nav class="navbar navbar-light">
            <!-- logo dan alamat sekolah -->
            <a class="navbar-brand" href="index.php">
                <div class="row">
                    <img src="image/logosekolah.png" width="80" height="80" class="d-inline-block align-top" alt="">
                    <div class="col">
                        <span style="font-size : 30px; font-weight : bold;">SMP Negeri 6 Tebing Tinggi</span> <br>
                        <span style="font-size : 15px; font-weight : bold;">Jl Gatot Subroto KM 5, Kec Padang Hulu, Kota Tebing Tinggi, Sumatera Utara 20998 </span>
                    </div>
                </div>
            </a>
            <!--  Telefon dan email -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><i class="fa fa-phone" aria-hidden="true"></i> (062)121708</li>
                <li class="nav-item"><i class="fa fa-envelope" aria-hidden="true"></i> <a> 
                    enamsmpnegeri@yahoo.co.id</a>
                </li>
            </ul>
            <!-- Tombol Sign In -->
            <ul class="navbar-nav ml-auto">
                <form class="form-inline mr-0">
                    <a class="btn btn-warning my-2 my-sm-0 mr-3 font-weight-bold" role="button" href="login.php">Sign in</a>
                </form>
            </ul>
        </nav>
    </div>
    <!-- Navigation Header -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link bg-dark px-3" href="index.php" style="letter-spacing:2.5px;font-weight:bold;">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="letter-spacing:2.5px;font-weight:bold;">
                Tentang Kami</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="profilsekolah.php" class="dropdown-item">Profil</a>
                    <a class="dropdown-item" href="profil.php">Visi Misi</a>
                    <a class="dropdown-item" href="profil.php#sejarah">Sejarah Sekolah</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-dark px-3" href="fasilitas.php" style="letter-spacing:2.5px;font-weight:bold;">Fasilitas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="letter-spacing:2.5px;font-weight:bold;">
                Siswa</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ekstrakurikuler.php">Ekstrakurikuler</a>
                    <a class="dropdown-item" href="rapor/index.php">e-Raport</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="letter-spacing:2.5px;font-weight:bold;">
                Direktori</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="direktori-siswa.php">Direktori Siswa</a>
                    <a class="dropdown-item" href="direktori-guru.php">Direktori Guru</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="letter-spacing:2.5px;font-weight:bold;">
                Berita</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="kegiatan.php">Kegiatan</a>
                    <a class="dropdown-item" href="prestasi.php">Prestasi</a>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
<marquee class="bg-secondary text-light">
    Selamat Datang di website SMP Negeri 6 Tebing Tinggi
</marquee>