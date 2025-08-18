<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id = $_GET['id'];
$query = mysqli_query($koneksi,"select * from siswa WHERE id = $id");


$html = '<center><h3>KETERANGAN TENTANG DIRI PESERTA DIDIK</h3></center><br/><br/><hr/>';
$html .= '<table width="100%">
 <tr>
 <td>Nama Peserta Didik (Lengkap)</td>';
 $row = mysqli_fetch_array($query);
 if($row['jenis_kelamin'] == 'P'){
    $row['jenis_kelamin'] = 'Perempuan';
 } 
 else if($row['jenis_kelamin'] == 'L'){
    $row['jenis_kelamin'] = 'Laki-laki';
 }
 $queryy = mysqli_query($koneksi,"select * from asal_mula WHERE id_siswa = $id");
        $roww = mysqli_fetch_array($queryy);
        $queryyy = mysqli_query($koneksi,"select * from ortu where id_siswa = $id");
        $rowww = mysqli_fetch_array($queryyy);
$html.='
 <td> :&nbsp;'.$row['nama_lengkap'].'</td>
 </tr>';
 $html .= "
 <tr>
 <td>Nomor Induk/NISN</td>
 <td> :&nbsp;".$row['nis']."&nbsp;/&nbsp;".$row['nisn']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Tempat, Tanggal Lahir</td>
 <td> :&nbsp;".$row['tempat_lahir']."&nbsp;/&nbsp;".$row['tanggal_lahir']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Jenis Kelamin</td>
 <td> :&nbsp;".$row['jenis_kelamin']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Agama</td>
 <td> :&nbsp;".$row['agama']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Status dalam Keluarga</td>
 <td> : Anak Kandung</td
 </tr>";
 $html .= "
 <tr>
 <td>Anak ke</td>
 <td>:&nbsp;".$row['anak_ke']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Alamat Peserta Didik</td>
 <td> :&nbsp;".$row['alamat']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>No hp</td>
 <td> :&nbsp;".$row['no_hp']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Sekolah Asal</td>
 <td> :&nbsp;".$roww['alamat_sd']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Nama Orang Tua</td>
 <td> &nbsp;</td>
 </tr>";
 $html .= "
 <tr>
 <td>a Ayah</td>
 <td> :&nbsp;".$rowww['nama_ayah']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>a Ibu</td>
 <td> :&nbsp;".$rowww['nama_ibu']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Pekerjaan Orang Tua</td>
 <td> &nbsp;</td>
 </tr>";
 $html .= "
 <tr>
 <td>a Ayah</td>
 <td> :&nbsp;".$rowww['pekerjaan_ayah']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>a Ibu</td>
 <td> :&nbsp;".$rowww['pekerjaan_ibu']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Nama Wali</td>
 <td> :&nbsp;".$rowww['nama_wali']."</td>
 </tr>";
 $html .= "
 <tr>
 <td>Pekerjaan Wali</td>
 <td> :&nbsp;".$rowww['pekerjaan_wali']."</td>
 </tr>";
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
ob_end_clean();
// Melakukan output file Pdf
$print = 'print_siswa"'.$row['nis'].'".pdf';
$dompdf->stream($print);
?>