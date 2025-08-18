<?php
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        window.print();
    </script>
    <style type="text/css">
    #print {
        margin:auto;
        text-align:center;
        font-family:"Calibri", Courier, monospace;
        width:1000px;
        font-size:14px;
    }
    #print .title {
        margin:20px;
        text-align:right;
        font-family:"Calibri", Courier, monospace;
        font-size:12px;
    }
    #print span {
        text-align:center;
        font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;   
        font-size:18px;
    }
    #print table {
        border-collapse:collapse;
        width:100%;
        margin:10px;
    }
    #print .table1 {
        border-collapse:collapse;
        width:100%;
        text-align:center;
        margin:10px;
    }
    #print table hr {
        border:3px double #000;   
    }
    #print .ttd {
        float:right;
        width:250px;
        background-position:center;
        background-size:contain;
    }
    #print table th {
        color:#000;
        font-family:Verdana, Geneva, sans-serif;
        font-size:12px;
    }
    #logo{
        width:111px;
        height:90px;
        padding-top:10px;   
        margin-left:10px;
    }

    h2,h3{
        margin: 0px 0px 0px 0px;
    }
    </style>
</head>
<body>
    <div>
    <title>E-RAPORT</title>
    <div id="print">
    <table class='table1'>
        <tr>
            <td>
            <h2> E-RAPORT SMP NEGERI 6 TEBING TINGGI</h2>
            </td>
        </tr>
    </table>
    <hr />
    <td><h3>Pencapaian Kompetensi Siswa</h3></td>
    <tr>
        <table style="width:75%; text-align: left;">
            <tr>
                <td>Nama Sekolah</td>
                <td> : </td>
                <?php 
                    $sekolah = "SELECT nama FROM profil_sekolah";
                    $data_sekolah=mysqli_query($koneksi, $sekolah);
                    $data = mysqli_fetch_array($data_sekolah);

                    $idtp = $_GET['idtp'];
                    $tp = "SELECT tahun_pelajaran, semester FROM tahun_pelajaran WHERE id = $idtp";
                    $data_tp=mysqli_query($koneksi, $tp);
                    $datatp = mysqli_fetch_array($data_tp);

                    $idsiswa = $_GET['idsiswa'];
                     $siswa = "SELECT nama_lengkap, nis FROM siswa WHERE id = $idsiswa";
                     $data_siswa=mysqli_query($koneksi, $siswa);
                     $datas = mysqli_fetch_array($data_siswa);

                    $kelas = "SELECT kelas FROM view_kelas_siswa WHERE nis = '".$datas['nis']."' AND tahun_pelajaran = '".$datatp['tahun_pelajaran']."' AND semester = '".$datatp['semester']."'";
                    $data_kelas=mysqli_query($koneksi, $kelas);
                    $datak = mysqli_fetch_array($data_kelas);
                ?>
                <td><?php echo $data['nama']?></td>

                <td></td>
                <td></td>
                <td></td>

                <td>Kelas</td>
                <td> : </td>
                <td><?php echo $datak['kelas'];?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td>Jl. Gatot Subroto Km 5 Tebing Tinggi</td>

                <td></td>
                <td></td>
                <td></td>

                <td>Semester</td>
                <td> : </td>
                <td><?php echo $datatp['semester'];?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td><?php echo $datas['nama_lengkap'];?></td>
                
                <td></td>
                <td></td>
                <td></td>

                <td>Tahun Pelajaran</td>
                <td> : </td>
                <td><?php echo $datatp['tahun_pelajaran'];?></td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa/NIS</td>
                <td> : </td>
                <td><?php echo $datas['nis'];?></td>
            </tr>
        </table>
    <table class="table1" style = "width: 100%" border="1">
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
                <td colspan="6" style="text-align: left; padding-left: 5px; font-weight: bold;">KELOMPOK A</td>
            </tr>
            <?php
            $idsiswa = 1;
            $idtp = 6;
                $no = 1;
                $mp = "SELECT id, nama FROM mata_pelajaran WHERE kelompok='A'";
                $data_mp=mysqli_query($koneksi, $mp);
                while ($datamp = mysqli_fetch_array($data_mp)) {
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td style="text-align: left;"><?php echo $datamp['nama'];?></td>
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
                <td colspan="6" style="text-align: left; padding-left: 5px; font-weight: bold;">KELOMPOK B</td>
            </tr>
            <?php
                $no = 1;
                $mp = "SELECT id, nama FROM mata_pelajaran WHERE kelompok='B'";
                $data_mp=mysqli_query($koneksi, $mp);
                while ($datamp = mysqli_fetch_array($data_mp)) {
            ?>
            <tr>
                <td><?php echo $no++?></td>
                <td style="text-align: left;"><?php echo $datamp['nama'];?></td>
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
        
    </tr>
</table>
</div>
<div id="print">
    <table width="450" align="right" class="ttd">
        <tr>
            <td width="100px" style="padding:20px 20px 20px 20px;" align="center">
                <strong>WALIKELAS,</strong>
                <br><br><br><br>
                <strong><u>TTD</u><br></strong><strong> <?php
                $s = mysqli_query($koneksi, "SELECT walikelas FROM walikelas WHERE kelas = '" . $datak['kelas'] . "' AND tahun_pelajaran = '" . $datatp['tahun_pelajaran'] . "' AND semester = '" . $datatp['semester'] . "'");
                $wk = mysqli_fetch_array($s);
                $walikelas = $wk['walikelas'];
                echo $walikelas;
                ?></strong>
            </td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
    
    
    
    