<?php
    include 'header.php';
    include 'koneksi.php';
?>
<div class="container">
    <p>
        <center><h4>Berita Kegiatan</h4></center>
    </p>
</div>
<?php
    /* query menampilkan data kegiatan */
    $data_kegiatan = "SELECT judul, deskripsi, tanggal, gambar FROM kegiatan";

    $query = mysqli_query($koneksi, $data_kegiatan);
?>
<div class="container">
    <?php
    if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_object($query)) {
    ?>
    <div class="container my-4 no-gutter">
        <div class="row gy-4 my-4 p-2 align-items-center" style="border: 1px solid">       
                <div class="col-md-4 p-2">
                    <?php if(empty($data->gambar)){?>
                        <img class="img-fluid" alt="Card image cap" style="width:300px;height:200px;border:1px outset" src="image/labBio.jpg">
                    <?php } else { ?>
                        <img class="img-fluid" alt="Card image cap" style="width:300px;height:200px;" src="admin/gambar/<?php echo $data->gambar ?>">
                    <?php } ?>
                </div>
                <div class="col-md-8 p-2">
                <?php
                    function tgl_indo($tanggal){
                        $bulan = array (
                            1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );
                        $pecahkan = explode('-', $tanggal);
                        
                        // variabel pecahkan 0 = tanggal
                        // variabel pecahkan 1 = bulan
                        // variabel pecahkan 2 = tahun
                    
                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                    }
                ?>
                    <h3><?php echo $data->judul; ?></h3>
                    <ul style="list-style: none;padding: 0;">
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo tgl_indo($data->tanggal); ?></li>
                    </ul>
                    <p>
                        <?php echo $data->deskripsi; ?>
                    </p>
                </div>
        </div>
    </div>
    <?php }} ?>
</div>

<?php
    include 'footer.php';
?>