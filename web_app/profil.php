<?php
    include 'header.php';
    include 'koneksi.php';
?>
    <div class="container">
        <p>
            <center><h4>VISI, MISI, DAN SEJARAH SEKOLAH</h4></center>
        </p>
        <?php
            $profil = mysqli_query($koneksi, "SELECT visi, misi FROM profil_sekolah");
            $data = mysqli_fetch_array($profil);    
        ?>
        <div class="container">
            <h4>Visi & Misi</h4> <br>
            <p>
                <b>Visi :</b>
                <br> 
                <i><?php echo $data['visi'];?></i>
            </p>
            <p>
                <b>Misi :</b> <br>
                <i><?php echo nl2br($data['misi']);?></i>
            </p>
        </div>
        <br>
        <div class="container" id="sejarah">
            <h4>Sejarah SMP Negeri 6 Tebing Tinggi</h4>
            <p class="text-justify">
                SMP Negeri 6 Tebing Tinggi berlokasi di Jalan Gatot Subroto Km. 5 Kota Tebing Tinggi Kecamatan Padang Hulu Kelurahan Pabatu, yang terletak di perbatasan antara Kota Tebing Tinggi dengan Kabupaten Serdang Bedagai. Sekolah ini didirikan dengan alasan kebutuhan dari masyarakat Kelurahan Pabatu, sehingga Pemerintah Kota Tebing Tinggi dengan menggunakan Lahan Iba dari PTPN IV Pabatu Kabupaten Serdang Bedagai mendirikan sekolah, dengan nama sekolah pada saat itu bernama SMP Negeri 5 Tebing Tinggi.
            </p>
            <p class="text-justify">
            Seiring dengan perkembangan, dan semakinnya bertambahnya masyarakat yang berminat sekolah di Kota Tebing Tinggi, Pemerintah Kota Tebing Tinggi membangun beberapa Sekolah SMP Negeri, dan membagi dan mengatur nama-nama SMP Negeri yang terdapat di Pemerintahan Kota Tebing Tinggi, sehingga pada Tahun 1994 SMP Negeri 5 Tebing Tinggi berubah nama menjadi SMP NEGERI 6 TEBING TINGGI.
            Dan sampai sekarang SMP Negeri 6 Kota Tebing Tinggi tetap di lirik oleh masyarakat, karena walaupun lokasi di perbatasan kota, namun dapat menghasilkan berbagai prestasi.
            Berikut ini adalah Bapak-Ibu yang pernah memimpin SMP Negeri 6 Kota Tebing Tinggi:
            </p>
            <ol class="px-3">
                <li> <i>Bapak Drs. Loren Pakpahan</i></li>
                <li> <i>Bapak Timbul Lubis</i></li>
                <li> <i>Ibu Dra. Lela Kesuma</i></li>
                <li> <i>Bapak Drs. Irwan Saragih</i></li>
                <li> <i>Bapak Adrul Damanik, S.Pd.</i></li>
                <li> <i>Ibu Salmah Nasution, S.Pd.</i></li>
                <li> <i>Ibu Sri Idrahwaty, S.Pd., M.M. </i></li>
                <li> <i>Aman Juni Aris Medi Ginting, S.Pd</i></li>
                <li> <i>Plt. Doanta Surbakti, S.Pd</i></li>
            </ol>
        </div>
    </div>


<?php
    include 'footer.php';
?>