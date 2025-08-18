<?php
    include 'header.php';
    include 'koneksi.php';
?>
    <div class="container">
        <p>
            <center><h4>PROFIL SEKOLAH</h4></center>
        </p>
        <?php
            $profil = mysqli_query($koneksi, "SELECT nama, npsn, alamat, kode_pos, status, jenjang_pendidikan, akreditasi, email FROM profil_sekolah");
            $data = mysqli_fetch_array($profil);    
        ?>
        <div class="container">
        <table class="table">
                <tbody>
                    <tr>
                        <th>Nama Sekolah</th>
                        <td><?php echo $data['nama']?></td>
                    </tr>
                    <tr>
                        <th>NPSN</th>
                        <td><?php echo $data['npsn']?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $data['alamat']?></td>
                    </tr>    
                    <tr>
                        <th>Kode Pos</th>
                        <td><?php echo $data['kode_pos']?></td>
                    </tr>    
                    <tr>
                        <th>Status</th>
                        <td><?php echo $data['status']?></td>
                    </tr>   
                    <tr>
                        <th>Jenjang Pendidikan</th>
                        <td><?php echo $data['jenjang_pendidikan']?></td>
                    </tr>  
                    <tr>
                        <th>Akreditasi</th>
                        <td><?php echo $data['akreditasi']?></td>
                    </tr>    
                    <tr>
                        <th>Email</th>
                        <td><?php echo $data['email']?></td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>


<?php
    include 'footer.php';
?>