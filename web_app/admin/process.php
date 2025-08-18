<?php
include 'koneksi.php';

if (isset($_GET['deletesiswa'])) { //jika terdapat deletesiswa pada url
    $id = $_GET['deletesiswa'];

    /* query untuk delete data siswa pada halaman admin */
    /* $delsiswa = "DELETE FROM siswa WHERE id = $id"; */
    $delsiswa = "CALL delete_siswa($id)";
    $delete = mysqli_query($koneksi, $delsiswa);
    echo '<script>window.location="tabel-siswa.php"</script>';
}

if (isset($_GET['deleteguru'])) { //jika terdapat deleteguru pada url
    $id = $_GET['deleteguru'];

    /* query untuk delete data guru pada halaman admin */
    /* $delguru = "DELETE FROM guru WHERE id = $id"; */
    $delguru = "CALL delete_guru($id)";
    $delete = mysqli_query($koneksi, $delguru);
    echo '<script>window.location="tabel-guru.php"</script>';
}

if (isset($_GET['deletefasilitas'])) { //jika terdapat deletefasilitas pada url
    $id = $_GET['deletefasilitas'];

    /* $gambar_fasilitas = "SELECT gambar FROM fasilitas WHERE id = $id";
    $query = mysqli_query($koneksi, $gambar_fasilitas);
    $data = mysqli_fetch_object($query);
 
    $img = $data->gambar; */
    /* delete gambar dari folder */
    /* unlink('gambar/' . $img);  */

    /* query untuk delete data fasilitas pada halaman admin */
    /* $delfasilitas = "DELETE FROM fasilitas WHERE id = $id"; */
    $delfasilitas = "CALL delete_fasilitas($id)";
    $delete = mysqli_query($koneksi, $delfasilitas);
    echo '<script>window.location="tabel-fasilitas.php"</script>';
}

if (isset($_GET['deleteprestasi'])) { //jika terdapat deleteprestasi pada url
    $id = $_GET['deleteprestasi'];

   /*  $gambar_prestasi = "SELECT gambar FROM prestasi WHERE id = $id";
    $query = mysqli_query($koneksi, $gambar_prestasi);
    $data = mysqli_fetch_object($query);
 
    $img = $data->gambar; */
    /* delete gambar dari folder */
   /*  unlink('gambar/' . $img); 
 */
    /* query untuk delete data prestasi pada halaman admin */
    /* $delprestasi = "DELETE FROM prestasi WHERE id = $id"; */
    $delprestasi = "CALL delete_prestasi($id)";
    $delete = mysqli_query($koneksi, $delprestasi);
    echo '<script>window.location="tabel-prestasi.php"</script>';
}

if (isset($_GET['deletematapelajaran'])) { //jika terdapat deletematapelajaran pada url
    $id = $_GET['deletematapelajaran'];

    /* query untuk delete mata pelajaran pada halaman admin */
   /*  $delmatapelajaran = "DELETE FROM mata_pelajaran WHERE id = $id"; */
    $delmatapelajaran = "CALL delete_pelajaran($id)";
    $delete = mysqli_query($koneksi, $delmatapelajaran);
    echo '<script>window.location="tabel-matapelajaran.php"</script>';
}

if (isset($_GET['deletetahunpelajaran'])) { //jika terdapat deletetahunpelajaran pada url
    $id = $_GET['deletetahunpelajaran'];

    /* query untuk delete tahun pelajaran  pada halaman admin */
    /* $deltahunpelajaran = "DELETE FROM tahun_pelajaran WHERE id = $id"; */
    $deltahunpelajaran = "CALL delete_tahun_pelajaran($id)";
    $delete = mysqli_query($koneksi, $deltahunpelajaran);
    echo '<script>window.location="tabel-tahunpelajaran.php"</script>';
}

if (isset($_GET['deleteekstrakurikuler'])) { //jika terdapat deleteekstrakurikuler pada url
    $id = $_GET['deleteekstrakurikuler'];

    /* query untuk delete ekstrakurikuler  pada halaman admin */
    /* $delekstrakurikuler = "DELETE FROM ekstrakurikuler WHERE id = $id"; */
    $delekstrakurikuler = "CALL delete_ekskul($id)";
    $delete = mysqli_query($koneksi, $delekstrakurikuler);
    echo '<script>window.location="tabel-ekstrakurikuler.php"</script>';
}

if (isset($_GET['deleteasalmula'])) { //jika terdapat deleteasalmula pada url
    $id = $_GET['deleteasalmula'];

    /* query untuk delete asal mula  pada halaman admin */
    /* $delasalmula = "DELETE FROM asal_mula WHERE id = $id"; */
    $delasalmula = "CALL delete_asal_mula($id)";
    $delete = mysqli_query($koneksi, $delasalmula);
    echo '<script>window.location="tabel-asalmula.php"</script>';
}

if (isset($_GET['deleteortu'])) { //jika terdapat deleteortu pada url
    $id = $_GET['deleteortu'];

    /* query untuk delete orang tua siswa  pada halaman admin */
    /* $delortu = "DELETE FROM ortu WHERE id = $id"; */
    $delortu = "CALL delete_ortu($id)";
    $delete = mysqli_query($koneksi, $delortu);
    echo '<script>window.location="tabel-ortu.php"</script>';
}

if (isset($_GET['deletekegiatan'])) { //jika terdapat delete kegiatan pada url
    $id = $_GET['deletekegiatan'];

   /*  $gambar_kegiatan = "SELECT gambar FROM kegiatan WHERE id = $id";
    $query = mysqli_query($koneksi, $gambar_kegiatan);
    $data = mysqli_fetch_object($query);
 
    $img = $data->gambar; */
    /* delete gambar dari folder */
   /*  unlink('gambar/' . $img);  */

    /* query untuk delete data kegiatan pada halaman admin */
    /* $deletek = "DELETE FROM kegiatan WHERE id = $id"; */
    $deletek = "CALL delete_kegiatan($id)";
    $delete = mysqli_query($koneksi, $deletek);
    echo '<script>window.location="tabel-kegiatan.php"</script>';
}

if (isset($_GET['deletemapelguru'])) { //jika terdapat deletemapelguru pada url
    $id = $_GET['deletemapelguru'];

    /* query untuk delete data pelajaran_guru pada halaman admin */
    /* $deletepg = "DELETE FROM pelajaran_guru WHERE id = $id"; */
    $deletepg = "CALL delete_pelajaran_guru($id)";
    $delete = mysqli_query($koneksi, $deletepg);
    echo '<script>window.location="pengaturan-mapelguru.php"</script>';
}

if (isset($_GET['deletepengaturankelas'])) { //jika terdapat deletepengaturankelas pada url
    $id = $_GET['deletepengaturankelas'];

    /* query untuk delete data pengaturan kelas pada halaman admin */
    /* $deletepk = "DELETE FROM pengaturan_kelas WHERE id = $id"; */
    $deletepk = "CALL delete_pengaturan_kelas($id)";
    $delete = mysqli_query($koneksi, $deletepk);
    echo '<script>window.location="pengaturan-kelas.php"</script>';
}

if (isset($_GET['deletepengaturankelassiswa'])) { //jika terdapat deletepengaturankelassiswa pada url
    $id = $_GET['deletepengaturankelassiswa'];

    /* query untuk delete data pengaturan kelas siswa pada halaman admin */
    /* $deletepks = "DELETE FROM pengaturan_kelas_siswa WHERE id = $id"; */
    $deletepks = "CALL delete_kelas_siswa($id)";
    $delete = mysqli_query($koneksi, $deletepks);
    echo '<script>window.location="pengaturan-kelas-siswa.php"</script>';
}

if (isset($_GET['deletekepsek'])) { //jika terdapat deletekepsek pada url
    $id = $_GET['deletekepsek'];

    /* query untuk delete data kepsek pada halaman admin */
    /* $deletekepsek = "DELETE FROM kepala_sekolah WHERE id = $id"; */
    $deletekepsek = "CALL delete_kepala_sekolah($id)";
    $delete = mysqli_query($koneksi, $deletekepsek);
    echo '<script>window.location="tabel-kepsek.php"</script>';
}

if (isset($_GET['deleteakunguru'])) { //jika terdapat deleteakunguru pada url
    $id = $_GET['deleteakunguru'];

    /* query untuk delete data akun guru pada halaman admin */
    /* $deleteakunguru = "DELETE FROM akun_guru WHERE id = $id"; */
    $deleteakunguru = "CALL delete_akun_guru($id)";
    $delete = mysqli_query($koneksi, $deleteakunguru);
    echo '<script>window.location="tabel-akunguru.php"</script>';
}

if (isset($_GET['deletenilaisiswa'])) { //jika terdapat deletenilaisiswa pada url
    $id = $_GET['deletenilaisiswa'];

    /* query untuk delete data nilai siswa pada halaman admin */
    /* $deletenilaisiswa = "DELETE FROM nilai_siswa WHERE id = $id"; */
    $deletenilaisiswa = "CALL delete_nilai_siswa($id)";
    $delete = mysqli_query($koneksi, $deletenilaisiswa);
    echo '<script>window.location="tabel-nilai.php"</script>';
}
