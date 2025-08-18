<?php
    include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Raport</title>

    <!--Table css-->
    <link rel="stylesheet" href="assets/css/table.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!--Font Type : Inter-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    
    </head>
<body>
    <section class="tabel" id="tabel">
        <div class="container p-2">
            <div class="row">
                <div class="col">
                    <h2 class="text-center h2">Pencapaian Kompetensi Siswa</h2>
                </div>
            </div>
            
            <div class="row my-5">
                <div class="col py-2">
                    <table class="warna">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td> : </td>
                        <?php 
                            $sekolah = "SELECT nama FROM profil_sekolah";
                            $data_sekolah=mysqli_query($koneksi, $sekolah);
                            $data = mysqli_fetch_array($data_sekolah);
                        ?>
                        <td><?php echo $data['nama']?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td> : </td>
                        <td>Jl. Gatot Subroto Km 5 Tebing Tinggi</td>
                    </tr>
                    <tr>
                        <?php
                            $idsiswa = $_GET['idsiswa'];
                            $siswa = "SELECT nama_lengkap, nis FROM siswa WHERE id = $idsiswa";
                            $data_siswa=mysqli_query($koneksi, $siswa);
                            $datas = mysqli_fetch_array($data_siswa);
                        ?>
                        <td>Nama</td>
                        <td> : </td>
                        <td><?php echo $datas['nama_lengkap'];?></td>
                    </tr>
                    <tr>
                        <td>Nomor Induk Siswa/NIS</td>
                        <td> : </td>
                        <td><?php echo $datas['nis'];?></td>
                    </tr>
                </table>
                </div>
                <div class="col  py-2">
                    <table class="warna">
                    <tr>
                        <?php
                            $idtp = $_GET['idtp'];
                            $tp = "SELECT tahun_pelajaran, semester FROM tahun_pelajaran WHERE id = $idtp";
                            $data_tp=mysqli_query($koneksi, $tp);
                            $datatp = mysqli_fetch_array($data_tp);

                            $kelas = "SELECT kelas FROM view_kelas_siswa WHERE nis = '".$datas['nis']."' AND tahun_pelajaran = '".$datatp['tahun_pelajaran']."' AND semester = '".$datatp['semester']."'";
                            $data_kelas=mysqli_query($koneksi, $kelas);
                            $datak = mysqli_fetch_array($data_kelas);
                        ?>
                        <td>Kelas</td>
                        <td> : </td>
                        <td><?php echo $datak['kelas'];?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td> : </td>
                        <td><?php echo $datatp['semester'];?></td>
                    </tr>
                    <tr>
                        <td>Tahun Pelajaran</td>
                        <td> : </td>
                        <td><?php echo $datatp['tahun_pelajaran'];?></td>
                    </tr>
                </table>
                </div>
            
                <div class="row">
                    <div class="col">
                        <table class="styled-table" style = "width: 100%">
                            <thead>
                                <tr>
                                    <th colspan="2" rowspan="2">Mata Pelajaran</th>
                                    <th colspan="2">Pengetahuan</th>
                                    <th colspan="2">Keterampilan</th>
                                    
                                </tr>
                                <tr>
                                    <th>Angka</th>
                                    <th>Pred</th>
                                    <th>Angka</th>
                                    <th>Pred</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">KELOMPOK A</td>
                                </tr>
                                <?php
                                    $no = 1;
                                    $mp = "SELECT id, nama FROM mata_pelajaran WHERE kelompok='A'";
                                    $data_mp=mysqli_query($koneksi, $mp);
                                    while ($datamp = mysqli_fetch_array($data_mp)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $datamp['nama'];?></td>
                                    <?php 
                                        $idmapel = $datamp['id'];
                                        $nilai = "SELECT nilai_pengetahuan, hurufnp, nilai_keterampilan, hurufnk FROM view_rapor WHERE id_siswa = $idsiswa AND id_mapel = $idmapel AND id_tahunajar = $idtp";
                                        $dnilai = mysqli_query($koneksi, $nilai);
                                    if(mysqli_num_rows($dnilai)>0){
                                        while ($datanilai = mysqli_fetch_array($dnilai)) {
                                    ?>
                                    <td><?php echo $datanilai['nilai_pengetahuan'] ?></td>
                                    <td><?php echo $datanilai['hurufnp']?></td>
                                    <td><?php echo $datanilai['nilai_keterampilan'] ?></td>
                                    <td><?php echo $datanilai['hurufnk']?></td>
                                    <?php }} else { ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    <?php }} ?>
                                </tr>
                                <tr>
                                    <td colspan="6">KELOMPOK B</td>
                                </tr>
                                <?php
                                    $no = 1;
                                    $mp = "SELECT id, nama FROM mata_pelajaran WHERE kelompok='B'";
                                    $data_mp=mysqli_query($koneksi, $mp);
                                    while ($datamp = mysqli_fetch_array($data_mp)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $datamp['nama'];?></td>
                                    <?php 
                                        $idmapel = $datamp['id'];
                                        $nilai = "SELECT nilai_pengetahuan, hurufnp, nilai_keterampilan, hurufnk FROM view_rapor WHERE id_siswa = $idsiswa AND id_mapel = $idmapel AND id_tahunajar = $idtp";
                                        $dnilai = mysqli_query($koneksi, $nilai);
                                    if(mysqli_num_rows($dnilai)>0){
                                        while ($datanilai = mysqli_fetch_array($dnilai)) {
                                    ?>
                                    <td><?php echo $datanilai['nilai_pengetahuan'] ?></td>
                                    <td><?php echo $datanilai['hurufnp']?></td>
                                    <td><?php echo $datanilai['nilai_keterampilan'] ?></td>
                                    <td><?php echo $datanilai['hurufnk']?></td>
                                    <?php }} else { ?>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    <?php }} ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-btn">
                    <form method="POST">
					    <input type="submit" class="submit-btn" value="Download Rapor" name="download">
                    </form>
                    <?php if (isset($_POST['download'])) {
                        echo '<script>window.open("download-rapor.php?idsiswa='.$idsiswa.'&idtp='.$idtp.'", "_blank")</script>';
                    }
                    ?>
				</div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>