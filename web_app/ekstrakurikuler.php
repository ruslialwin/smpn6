<?php
    include 'header.php';
    include 'koneksi.php';
?>

<div class="container">
    <p>
        <center><h4>Ekstrakurikuler</h4></center>
    </p>
</div>
    
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/ekstrakurikuler1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/ekstrakurikuler5.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/ekstrakurikuler3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>
    <p>
        Kualitas tamatan sekolah kejuruan dituntut untuk memenuhi standar kompetensi dunia kerja. Salah satunya, selain mampu menguasai materi pelajaran, siswa harus dapat berinteraksi dan aktif dalam hubungan sosial.
        Kegiatan ekstrakurikuler merupakan salah satu alat pengenalan siswa pada hubungan sosial. Di dalamnya terdapat pendidikan pengenalan diri dan pengembangan kemampuan selain pemahaman materi pelajaran.
        Berangkat dari pemikiran tersebut, di SMP Negeri 6 TEBING TINGGI diselenggarakan berbagai kegiatan ekstrakurikuler.
    </p>
        Kegiatan ekstrakurikuler pada sekolah yaitu, antara lain:
        <ol class="px-3">
           <!--  <li>Pramuka</li>
            <li>Paskibra</li>
            <li>Palang Merah Remaja (PMR)/ UKS</li>
            <li>Multimedia Club</li>
            <li>Adiwiyata ( AC )</li>
            <li>Olahraga (Bola Voli, Bola Basket, silat)</li>
            <li>Kerohanian / ROHIS</li>
            <li>Teater</li>
            <li>Tari</li> -->
            <?php
                $eks = mysqli_query($koneksi, "SELECT ekstrakurikuler, keterangan, guru_pembina FROM view_ekstrakurikuler");
                while ($data = mysqli_fetch_array($eks)) {
                    $nama = $data['ekstrakurikuler'];
                    $ket  = $data['keterangan'];
                    $guru = $data['guru_pembina'];
            ?>
                <li> 
                    <?php echo $nama;?>, guru pembina : <?php echo $guru;?>
                    <p><?php echo $ket;?></p>
                </li>
               <?php } ?>
        </ol>
</div>

</div>
<?php
    include 'footer.php';
?>