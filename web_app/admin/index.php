<?php
    session_start();

    if(empty($_SESSION['admin_id'])){ 
        echo '<script>window.location="../login.php"</script>';
    }

    include 'koneksi.php';
    
    /* query menampilkan data admin pada halaman dashboard admin */
    $admin = "SELECT username, nama_lengkap FROM akun_admin WHERE admin_id = '".$_SESSION['admin_id']."'";
    $data_admin = mysqli_query($koneksi, $admin);

    $get = mysqli_fetch_object($data_admin); //variabel penampung data dalam bentuk object
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/Chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php 
            include 'topnavbar.php';
            include 'sidebar.php';
        ?>
        <?php if(isset($_GET['log'])){?> 
        <div id="layoutSidenav">
            <?php } ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang di Halaman Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang <?php echo $get->nama_lengkap ?></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php
                                        $counts = "select id from siswa WHERE status='aktif';";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhsiswa = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Siswa
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhsiswa; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-siswa.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php
                                        $counts = "select id from guru;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhguru = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Guru
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhguru; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-guru.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php
                                        $counts = "select id from pengaturan_kelas;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhk = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">Data Kelas (<?php 
                                            echo $jlhk; 
                                        ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pengaturan-kelas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4"><?php
                                        $counts = "select id from ekstrakurikuler;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhe = mysqli_num_rows($countss);
                                    ?>

                                    <div class="card-body">Data Ekstrakurikuler (<?php 
                                            echo $jlhe; 
                                        ?>)</div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-ekstrakurikuler.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <?php
                                        $counts = "select id from kegiatan";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhkeg = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Kegiatan
                                        <text class="bold text-white">(
                                        <?php 
                                            echo $jlhkeg; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-kegiatan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-light text-dark mb-4">
                                    <?php
                                        $counts = "select id from prestasi;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhpres = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">
                                        Data Prestasi
                                        <text class="bold text-dark">(
                                        <?php 
                                            echo $jlhpres; 
                                        ?> )</text>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link" href="tabel-prestasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <?php
                                        $counts = "select id from fasilitas;";
                                        $countss = mysqli_query($koneksi, $counts);
                                        $jlhf = mysqli_num_rows($countss);
                                    ?>
                                    <div class="card-body">Data Fasilitas (<?php 
                                            echo $jlhf; 
                                        ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tabel-fasilitas.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Perbandingan Jumlah Siswa Berdasarkan Jenis Kelamin
                                    </div>
                                    <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Jumlah Siswa Setiap Tahun Ajaran
                                    </div>
                                    <div class="card-body"><canvas id="ChartSiswa" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById("myChart").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Laki-laki", "Perempuan"],
                                    datasets: [{
                                        label: '',
                                        data: [
                                        <?php 
                                       /*  $jumlah_laki = mysqli_query($koneksi,"select * from siswa where jenis_kelamin='L'");
                                        echo mysqli_num_rows($jumlah_laki); */

                                        // memanggil function jenis_kelamin_siswa('L')
                                        $jumlah_laki = mysqli_query($koneksi, "SELECT jenis_kelamin_siswa('L')");
                                        $jlhlaki = mysqli_fetch_array($jumlah_laki);
                                        echo $jlhlaki["jenis_kelamin_siswa('L')"];
                                        ?>, 
                                        <?php 
                                        /*  $jumlah_perempuan = mysqli_query($koneksi, "SELECT jenis_kelamin_siswa('L')");
                                        echo $jumlah_perempuan; */

                                        //memanggil function jenis_kelamin_siswa('P')
                                        $jumlah_perempuan = mysqli_query($koneksi,"SELECT jenis_kelamin_siswa('P')");
                                        $jlhp = mysqli_fetch_array($jumlah_perempuan);
                                        echo $jlhp["jenis_kelamin_siswa('P')"];
                                       
                                        ?>
                                        ],
                                        backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 99, 132, 0.2)'
                                        ],
                                        borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(227, 28, 121, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });

                            var ct = document.getElementById("ChartSiswa").getContext('2d');
                            var ChartSiswa = new Chart(ct, {
                                type: 'bar',
                                data: {
                                    labels: ["2020/2021", "2021/2022", "2022/2023"],
                                    datasets: [{
                                        label: 'Jumlah Data Siswa',
                                        data: [
                                        <?php 

                                        // memanggil function tahun_pelajaran_siswa('2020/2021')
                                        $jtp = mysqli_query($koneksi, "SELECT tahun_pelajaran_siswa('2020/2021')");
                                        $jt1 = mysqli_fetch_array($jtp);
                                        echo $jt1["tahun_pelajaran_siswa('2020/2021')"];
                                        ?>, 
                                        <?php 
                                    
                                        //memanggil function tahun_pelajaran_siswa('2021/2022')
                                        $jtp2 = mysqli_query($koneksi,"SELECT tahun_pelajaran_siswa('2021/2022')");
                                        $jt2 = mysqli_fetch_array($jtp2);
                                        echo $jt2["tahun_pelajaran_siswa('2021/2022')"];
                                       
                                        ?>,
                                        <?php 
                                    
                                        //memanggil function tahun_pelajaran_siswa('2022/2023')
                                        $jtp3 = mysqli_query($koneksi,"SELECT tahun_pelajaran_siswa('2022/2023')");
                                        $jt3 = mysqli_fetch_array($jtp3);
                                        echo $jt3["tahun_pelajaran_siswa('2022/2023')"];
                                       
                                        ?>
                                        ],
                                        
                                        backgroundColor: [
                                        'rgba(255, 215, 0, 0.2)',
                                        'rgba(255, 215, 0, 0.2)',
                                        'rgba(255, 215, 0, 0.2)'
                                        ],
                                        borderColor: [
                                        'rgba(255, 255, 0, 1)',
                                        'rgba(255, 255, 0, 1)',
                                        'rgba(255, 255, 0, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });

                            
                        </script>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 <?php if(empty($_GET['log'])){?> 
                                    Tabel Log 
                                    <?php } else{?>
                                Tabel <?php echo $_GET['log'];?><?php } ?>
                            </div>
                            <div class="card-body">
                            <form action="" method="GET" enctype="multipart/form-data">
                                <div class="row mb-4">
                                <div class="col">
                                    <select name="log" required class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="log_akun_guru">log akun guru</option>
                                        <option value="log_asal_mula">log asal mula</option>
                                        <option value="log_ekstrakurikuler">log ekstrakurikuler</option>
                                        <option value="log_fasilitas">log fasilitas</option>
                                        <option value="log_guru">log guru</option>
                                        <option value="log_kegiatan">log kegiatan</option>
                                        <option value="log_kepala_sekolah">log kepala sekolah</option>
                                        <option value="log_mata_pelajaran">log mata pelajaran</option>
                                        <option value="log_nilai_siswa">log nilai siswa</option>
                                        <option value="log_orang_tua">log orang tua</option>
                                        <option value="log_pelajaran_guru">log pelajaran guru</option>
                                        <option value="log_pengaturan_kelas">log pengaturan kelas</option>
                                        <option value="log_pengaturan_kelas_siswa">log pengaturan kelas siswa</option>
                                        <option value="log_prestasi">log prestasi</option>
                                        <option value="log_profil_sekolah">log profil sekolah</option>
                                        <option value="log_siswa">log siswa</option>
                                        <option value="log_tahun_pelajaran">log tahun pelajaran</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="submit" class="btn btn-success"  value="OK" >
                                </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_GET['log'])) {
                                $log = $_GET['log'];
                                $query = mysqli_query($koneksi, "SELECT * FROM $log");
                            ?>
                                <table id="example" class="dataTable-table">
                                    <?php if($log == "log_akun_guru"){
                                    $no = 1;
                                        ?>
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Akun Guru</th>
                                            <th>Id Guru</th>
                                            <th>Username Lama</th>
                                            <th>Username Baru</th>
                                            <th>Password Lama</th>
                                            <th>Password Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($data = mysqli_fetch_array($query)){?>
                                        <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data['waktu']?></td>
                                            <td><?php echo $data['aksi']?></td>
                                            <td><?php echo $data['who']?></td>
                                            <td><?php echo $data['id_akun_guru']?></td>
                                            <td><?php echo $data['id_guru']?></td>
                                            <td><?php echo $data['old_username']?></td>
                                            <td><?php echo $data['new_username']?></td>
                                            <td><?php echo $data['old_password']?></td>
                                            <td><?php echo $data['new_password']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php } else if($log == "log_asal_mula"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Asal Mula</th>
                                            <th>Id Siswa</th>
                                            <th>Nama SD lama</th>
                                            <th>Nama SD baru</th>
                                            <th>Diterima SD lama</th>
                                            <th>Diterima SD baru</th>
                                            <th>Tamat SD lama</th>
                                            <th>Tamat SD baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_asal_mula']?></td>
                                                <td><?php echo $data['id_siswa']?></td>
                                                <td><?php echo $data['old_nama_sd']?></td>
                                                <td><?php echo $data['new_nama_sd']?></td>
                                                <td><?php echo $data['old_diterima_sd']?></td>
                                                <td><?php echo $data['new_diterima_sd']?></td>
                                                <td><?php echo $data['old_tamat_sd']?></td>
                                                <td><?php echo $data['new_tamat_sd']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_ekstrakurikuler"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Ekskul</th>
                                            <th>Nama Ekskul lama</th>
                                            <th>Nama Eksul baru</th>
                                            <th>Id Guru</th>
                                            <th>Keterangan Lama</th>
                                            <th>Keterangan baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_ekskul']?></td>
                                                <td><?php echo $data['old_nama_ekskul']?></td>
                                                <td><?php echo $data['new_nama_ekskul']?></td>
                                                <td><?php echo $data['id_guru']?></td>
                                                <td><?php echo $data['old_keterangan']?></td>
                                                <td><?php echo $data['new_keterangan']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_fasilitas"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Fasilitas</th>
                                            <th>Judul lama</th>
                                            <th>Judul baru</th>
                                            <th>Deskripsi lama</th>
                                            <th>Deskripsi baru</th>
                                            <th>Gambar lama</th>
                                            <th>Gambar baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_fasilitas']?></td>
                                                <td><?php echo $data['old_judul']?></td>
                                                <td><?php echo $data['new_judul']?></td>
                                                <td><?php echo $data['old_deskripsi']?></td>
                                                <td><?php echo $data['new_deskripsi']?></td>
                                                <td><?php echo $data['old_gambar']?></td>
                                                <td><?php echo $data['new_gambar']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_guru"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Guru</th>
                                            <th>NIP lama</th>
                                            <th>NIP baru</th>
                                            <th>Nama lama</th>
                                            <th>Nama baru</th>
                                            <th>Jenis kelamin lama</th>
                                            <th>Jenis kelamin baru</th>
                                            <th>TL lama</th>
                                            <th>TL baru</th>
                                            <th>Tgl Lahir lama</th>
                                            <th>Tgl Lahir baru</th>
                                            <th>Agama lama</th>
                                            <th>Agama Baru</th>
                                            <th>Goldar lama</th>
                                            <th>Goldar baru</th>
                                            <th>Jenjang lama</th>
                                            <th>Jenjang baru</th>
                                            <th>No hp lama</th>
                                            <th>No hp baru</th>
                                            <th>Foto lama</th>
                                            <th>Foto baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_guru']?></td>
                                                <td><?php echo $data['old_nip']?></td>
                                                <td><?php echo $data['new_nip']?></td>
                                                <td><?php echo $data['old_nama_lengkap']?></td>
                                                <td><?php echo $data['new_nama_lengkap']?></td>
                                                <td><?php echo $data['old_jk']?></td>
                                                <td><?php echo $data['new_jk']?></td>
                                                <td><?php echo $data['old_tempat_lahir']?></td>
                                                <td><?php echo $data['new_tempat_lahir']?></td>
                                                <td><?php echo $data['old_tanggal_lahir']?></td>
                                                <td><?php echo $data['new_tanggal_lahir']?></td>
                                                <td><?php echo $data['old_agama']?></td>
                                                <td><?php echo $data['new_agama']?></td>
                                                <td><?php echo $data['old_gol_darah']?></td>
                                                <td><?php echo $data['new_gol_darah']?></td>
                                                <td><?php echo $data['old_jenjang']?></td>
                                                <td><?php echo $data['new_jenjang']?></td>
                                                <td><?php echo $data['old_no_hp']?></td>
                                                <td><?php echo $data['new_no_hp']?></td>
                                                <td><?php echo $data['old_foto']?></td>
                                                <td><?php echo $data['new_foto']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_kegiatan"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Kegiatan</th>
                                            <th>Judul lama</th>
                                            <th>Judul baru</th>
                                            <th>Deskripsi lama</th>
                                            <th>Deskripsi baru</th>
                                            <th>Tanggal lama</th>
                                            <th>Tanggal baru</th>
                                            <th>Gambar lama</th>
                                            <th>Gambar baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_kegiatan']?></td>
                                                <td><?php echo $data['old_judul']?></td>
                                                <td><?php echo $data['new_judul']?></td>
                                                <td><?php echo $data['old_deskripsi']?></td>
                                                <td><?php echo $data['new_deskripsi']?></td>
                                                <td><?php echo $data['old_tanggal']?></td>
                                                <td><?php echo $data['new_tanggal']?></td>
                                                <td><?php echo $data['old_gambar']?></td>
                                                <td><?php echo $data['new_gambar']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_kepala_sekolah"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Kepsek</th>
                                            <th>Nama lama</th>
                                            <th>Nama baru</th>
                                            <th>NIP lama</th>
                                            <th>NIP baru</th>
                                            <th>JK lama</th>
                                            <th>JK baru</th>
                                            <th>TL lama</th>
                                            <th>TL baru</th>
                                            <th>Tgl Lahir lama</th>
                                            <th>Tgl lahir baru</th>
                                            <th>Agama lama</th>
                                            <th>Agama baru</th>
                                            <th>Jenjang lama</th>
                                            <th>Jenjang baru</th>
                                            <th>Masa jabatan lama</th>
                                            <th>Masa jabatan lama</th>
                                            <th>Gambar lama</th>
                                            <th>Gambar baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_kepala_sekolah']?></td>
                                                <td><?php echo $data['old_nama_lengkap']?></td>
                                                <td><?php echo $data['new_nama_lengkap']?></td>
                                                <td><?php echo $data['old_nip']?></td>
                                                <td><?php echo $data['new_nip']?></td>
                                                <td><?php echo $data['old_jk']?></td>
                                                <td><?php echo $data['new_jk']?></td>
                                                <td><?php echo $data['old_tempat_lahir']?></td>
                                                <td><?php echo $data['new_tempat_lahir']?></td>
                                                <td><?php echo $data['old_tanggal_lahir']?></td>
                                                <td><?php echo $data['new_tanggal_lahir']?></td>
                                                <td><?php echo $data['old_agama']?></td>
                                                <td><?php echo $data['new_agama']?></td>
                                                <td><?php echo $data['old_jenjang']?></td>
                                                <td><?php echo $data['new_jenjang']?></td>
                                                <td><?php echo $data['old_masa_jabatan']?></td>
                                                <td><?php echo $data['new_masa_jabatan']?></td>
                                                <td><?php echo $data['old_foto']?></td>
                                                <td><?php echo $data['new_foto']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_mata_pelajaran"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id Mapel</th>
                                            <th>Nama mapel lama</th>
                                            <th>Nama mapel baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_mapel']?></td>
                                                <td><?php echo $data['old_nama_mapel']?></td>
                                                <td><?php echo $data['new_nama_mapel']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_nilai_siswa"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id nilai siswa</th>
                                            <th>Id siswa</th>
                                            <th>Id mapel</th>
                                            <th>Id tahun ajar</th>
                                            <th>Nilai pengetahuan lama</th>
                                            <th>Nilai pengetahuan baru</th>
                                            <th>Nilai keterampilan lama</th>
                                            <th>Nilai keterampilan baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_nilai_siswa']?></td>
                                                <td><?php echo $data['id_siswa']?></td>
                                                <td><?php echo $data['id_mapel']?></td>
                                                <td><?php echo $data['id_tahunajar']?></td>
                                                <td><?php echo $data['old_nilai_pengetahuan']?></td>
                                                <td><?php echo $data['new_nilai_pengetahuan']?></td>
                                                <td><?php echo $data['old_nilai_keterampilan']?></td>
                                                <td><?php echo $data['new_nilai_keterampilan']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php }else if($log == "log_pelajaran_guru"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id pelajaran guru</th>
                                            <th>Id guru lama</th>
                                            <th>Id guru baru</th>
                                            <th>Id mapel lama</th>
                                            <th>Id mapel baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_pelajaran_guru']?></td>
                                                <td><?php echo $data['old_id_guru']?></td>
                                                <td><?php echo $data['new_id_guru']?></td>
                                                <td><?php echo $data['old_id_mapel']?></td>
                                                <td><?php echo $data['new_id_mapel']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_pengaturan_kelas"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id pengaturan kelas</th>
                                            <th>Nama kelas lama</th>
                                            <th>Nama kelas baru</th>
                                            <th>Id TP lama</th>
                                            <th>Id TP baru</th>
                                            <th>Id Guru lama</th>
                                            <th>Id Guru baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_pengaturan_kelas']?></td>
                                                <td><?php echo $data['old_nama_kelas']?></td>
                                                <td><?php echo $data['new_nama_kelas']?></td>
                                                <td><?php echo $data['old_id_tahun_pelajaran']?></td>
                                                <td><?php echo $data['new_id_tahun_pelajaran']?></td>
                                                <td><?php echo $data['old_id_guru']?></td>
                                                <td><?php echo $data['new_id_guru']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php }else if($log == "log_pengaturan_kelas_siswa"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id pengaturan kelas siswa</th>
                                            <th>Id pengaturan kelas lama</th>
                                            <th>Id pengaturan kelas baru</th>
                                            <th>Id siswa lama</th>
                                            <th>Id siswa baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_pengaturan_kelas_siswa']?></td>
                                                <td><?php echo $data['old_id_pengaturan_kelas']?></td>
                                                <td><?php echo $data['new_id_pengaturan_kelas']?></td>
                                                <td><?php echo $data['old_id_siswa']?></td>
                                                <td><?php echo $data['new_id_siswa']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_prestasi"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id prestasi</th>
                                            <th>Judul lama</th>
                                            <th>Judul baru</th>
                                            <th>Deskripsi lama</th>
                                            <th>Deskripsi baru</th>
                                            <th>Penyelenggara lama</th>
                                            <th>Penyelenggara baru</th>
                                            <th>Gambar lama</th>
                                            <th>Gambar baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_prestasi']?></td>
                                                <td><?php echo $data['old_judul_prestasi']?></td>
                                                <td><?php echo $data['new_judul_prestasi']?></td>
                                                <td><?php echo $data['old_deskripsi_prestasi']?></td>
                                                <td><?php echo $data['new_deskripsi_prestasi']?></td>
                                                <td><?php echo $data['old_penyelenggara']?></td>
                                                <td><?php echo $data['new_penyelenggara']?></td>
                                                <td><?php echo $data['old_gambar']?></td>
                                                <td><?php echo $data['new_gambar']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_profil_sekolah"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id profil sekolah</th>
                                            <th>Nama lama</th>
                                            <th>Nama baru</th>
                                            <th>NPSN lama</th>
                                            <th>NPSN baru</th>
                                            <th>Alamat lama</th>
                                            <th>Alamat baru</th>
                                            <th>Kode pos lama</th>
                                            <th>Kode pos baru</th>
                                            <th>Status lama</th>
                                            <th>Status baru</th>
                                            <th>Jenjang Pendidikan lama</th>
                                            <th>Jenjang Pendidikan baru</th>
                                            <th>Akreditasi lama</th>
                                            <th>Akreditasi baru</th>
                                            <th>Email lama</th>
                                            <th>Email baru</th>
                                            <th>Visi lama</th>
                                            <th>Visi baru</th>
                                            <th>Misi lama</th>
                                            <th>Misi baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_profil_sekolah']?></td>
                                                <td><?php echo $data['old_nama_sekolah']?></td>
                                                <td><?php echo $data['new_nama_sekolah']?></td>
                                                <td><?php echo $data['old_npsn']?></td>
                                                <td><?php echo $data['new_npsn']?></td>
                                                <td><?php echo $data['old_alamat']?></td>
                                                <td><?php echo $data['new_alamat']?></td>
                                                <td><?php echo $data['old_kode_pos']?></td>
                                                <td><?php echo $data['new_kode_pos']?></td>
                                                <td><?php echo $data['old_status']?></td>
                                                <td><?php echo $data['new_status']?></td>
                                                <td><?php echo $data['old_jenjang_pendidikan']?></td>
                                                <td><?php echo $data['new_jenjang_pendidikan']?></td>
                                                <td><?php echo $data['old_akreditasi']?></td>
                                                <td><?php echo $data['new_akreditasi']?></td>
                                                <td><?php echo $data['old_email']?></td>
                                                <td><?php echo $data['new_email']?></td>
                                                <td><?php echo $data['old_visi']?></td>
                                                <td><?php echo $data['new_visi']?></td>
                                                <td><?php echo $data['old_misi']?></td>
                                                <td><?php echo $data['new_misi']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_tahun_pelajaran"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id tahun pelajaran</th>
                                            <th>TP lama</th>
                                            <th>TP baru</th>
                                            <th>Semester lama</th>
                                            <th>Semester baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_thn_pelajaran']?></td>
                                                <td><?php echo $data['old_tahun_pelajaran']?></td>
                                                <td><?php echo $data['new_tahun_pelajaran']?></td>
                                                <td><?php echo $data['old_semester']?></td>
                                                <td><?php echo $data['new_semester']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_siswa"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id siswa</th>
                                            <th>NIS lama</th>
                                            <th>NIS baru</th>
                                            <th>NISN lama</th>
                                            <th>NISN baru</th>
                                            <th>Nama lama</th>
                                            <th>Nama baru</th>
                                            <th>JK lama</th>
                                            <th>JK baru</th>
                                            <th>TmptLahir lama</th>
                                            <th>TmptLahir baru</th>
                                            <th>TglLahir lama</th>
                                            <th>TglLahir baru</th>
                                            <th>Agama lama</th>
                                            <th>Agama baru</th>
                                            <th>Anak ke(lama)</th>
                                            <th>Anak ke(baru)</th>
                                            <th>Jlh saudara(lama)</th>
                                            <th>Jlh saudara(baru)</th>
                                            <th>Berat badan lama</th>
                                            <th>Berat badan baru</th>
                                            <th>Tinggi badan lama</th>
                                            <th>Tinggi badan baru</th>
                                            <th>Goldar lama</th>
                                            <th>Goldar baru</th>
                                            <th>No hp lama</th>
                                            <th>No hp baru</th>
                                            <th>Alamat lama</th>
                                            <th>Alamat baru</th>
                                            <th>Status lama</th>
                                            <th>Status baru</th>
                                            <th>Foto lama</th>
                                            <th>Foto baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_siswa']?></td>
                                                <td><?php echo $data['old_nis']?></td>
                                                <td><?php echo $data['new_nis']?></td>
                                                <td><?php echo $data['old_nisn']?></td>
                                                <td><?php echo $data['new_nisn']?></td>
                                                <td><?php echo $data['old_nama_lengkap']?></td>
                                                <td><?php echo $data['new_nama_lengkap']?></td>
                                                <td><?php echo $data['old_jk']?></td>
                                                <td><?php echo $data['new_jk']?></td>
                                                <td><?php echo $data['old_tempat_lahir']?></td>
                                                <td><?php echo $data['new_tempat_lahir']?></td>
                                                <td><?php echo $data['old_tanggal_lahir']?></td>
                                                <td><?php echo $data['new_tanggal_lahir']?></td>
                                                <td><?php echo $data['old_agama']?></td>
                                                <td><?php echo $data['new_agama']?></td>
                                                <td><?php echo $data['old_anak_ke']?></td>
                                                <td><?php echo $data['new_anak_ke']?></td>
                                                <td><?php echo $data['old_jlh_saudara']?></td>
                                                <td><?php echo $data['new_jlh_saudara']?></td>
                                                <td><?php echo $data['old_berat_badan']?></td>
                                                <td><?php echo $data['new_berat_badan']?></td>
                                                <td><?php echo $data['old_tinggi_badan']?></td>
                                                <td><?php echo $data['new_tinggi_badan']?></td>
                                                <td><?php echo $data['old_gol_darah']?></td>
                                                <td><?php echo $data['new_gol_darah']?></td>
                                                <td><?php echo $data['old_no_hp']?></td>
                                                <td><?php echo $data['new_no_hp']?></td>
                                                <td><?php echo $data['old_alamat']?></td>
                                                <td><?php echo $data['new_alamat']?></td>
                                                <td><?php echo $data['old_status']?></td>
                                                <td><?php echo $data['new_status']?></td>
                                                <td><?php echo $data['old_foto']?></td>
                                                <td><?php echo $data['new_foto']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } else if($log == "log_orang_tua"){
                                    $no = 1;
                                    ?>
                                        <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                            <th>Who</th>
                                            <th>Id ortu</th>
                                            <th>Id siswa</th>
                                            <th>Nama ayah lama</th>
                                            <th>Nama ayah baru</th>
                                            <th>Nama ibu lama</th>
                                            <th>Nama ibu baru</th>
                                            <th>Pend.ayah lama</th>
                                            <th>Pend.ayah baru</th>
                                            <th>Pend.ibu lama</th>
                                            <th>Pend.ibu baru</th>
                                            <th>TmptLahir ayah lama</th>
                                            <th>TmptLahir ayah baru</th>
                                            <th>TmptLahir ibu lama</th>
                                            <th>TmptLahir ibu baru</th>
                                            <th>TglLahir ayah lama</th>
                                            <th>TglLahir ayah baru</th>
                                            <th>TglLahir ibu lama</th>
                                            <th>TglLahir ibu baru</th>
                                            <th>Pekerjaan ayah lama</th>
                                            <th>Pekerjaan ayah baru</th>
                                            <th>Pekerjaan ibu lama</th>
                                            <th>Pekerjaan ibu baru</th>
                                            <th>Nama wali lama</th>
                                            <th>Nama wali baru</th>
                                            <th>Pendidikan wali lama</th>
                                            <th>Pendidikan wali baru</th>
                                            <th>Hub thd siswa lama</th>
                                            <th>Hub thd siswa baru</th>
                                            <th>Pekerjaan wali lama</th>
                                            <th>Pekerjaan wali baru</th>
                                            <th>No hp lama</th>
                                            <th>No hp baru</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <td><?php echo $no++?></td>
                                                <td><?php echo $data['waktu']?></td>
                                                <td><?php echo $data['aksi']?></td>
                                                <td><?php echo $data['who']?></td>
                                                <td><?php echo $data['id_ortu']?></td>
                                                <td><?php echo $data['id_siswa']?></td>
                                                <td><?php echo $data['old_nama_ayah']?></td>
                                                <td><?php echo $data['new_nama_ayah']?></td>
                                                <td><?php echo $data['old_nama_ibu']?></td>
                                                <td><?php echo $data['new_nama_ibu']?></td>
                                                <td><?php echo $data['old_pendidikan_ayah']?></td>
                                                <td><?php echo $data['new_pendidikan_ayah']?></td>
                                                <td><?php echo $data['old_pendidikan_ibu']?></td>
                                                <td><?php echo $data['new_pendidikan_ibu']?></td>
                                                <td><?php echo $data['old_tempat_lahir_ayah']?></td>
                                                <td><?php echo $data['new_tempat_lahir_ayah']?></td>
                                                <td><?php echo $data['old_tempat_lahir_ibu']?></td>
                                                <td><?php echo $data['new_tempat_lahir_ibu']?></td>
                                                <td><?php echo $data['old_tgl_lahir_ayah']?></td>
                                                <td><?php echo $data['new_tgl_lahir_ayah']?></td>
                                                <td><?php echo $data['old_tgl_lahir_ibu']?></td>
                                                <td><?php echo $data['new_tgl_lahir_ibu']?></td>
                                                <td><?php echo $data['old_pekerjaan_ayah']?></td>
                                                <td><?php echo $data['new_pekerjaan_ayah']?></td>
                                                <td><?php echo $data['old_pekerjaan_ibu']?></td>
                                                <td><?php echo $data['new_pekerjaan_ibu']?></td>
                                                <td><?php echo $data['old_nama_wali']?></td>
                                                <td><?php echo $data['new_nama_wali']?></td>
                                                <td><?php echo $data['old_pendidikan_wali']?></td>
                                                <td><?php echo $data['new_pendidikan_wali']?></td>
                                                <td><?php echo $data['old_hub_thd_siswa']?></td>
                                                <td><?php echo $data['new_hub_thd_siswa']?></td>
                                                <td><?php echo $data['old_pekerjaan_wali']?></td>
                                                <td><?php echo $data['new_pekerjaan_wali']?></td>
                                                <td><?php echo $data['old_no_hp']?></td>
                                                <td><?php echo $data['new_no_hp']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script>
            // Initialize the Simple-DataTables library
            const table = new simpleDatatables.DataTable("#example");
        </script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
