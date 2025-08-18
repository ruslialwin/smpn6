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
    <link rel="stylesheet" href="assets/css/validasi.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!--Font Type : Inter-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    
    </head>
<body>
	
<div id="booking" class="section">
<div class="container-name"><a class="btn btn-dark btn-lg" href="../index.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a></div>
		<div class="section-center">
			<div class="container">				
                <div class="row align-items-center justify-content-md-center">
					
					<div class="col-md-auto">
						
						<div class="booking-form">
							
							<form method="POST" action="">
								<div class="form-group">
									<label class="form-label">NIS</label>
									<input name="nis" class="form-control" type="text" placeholder="Masukkan NIS">
								</div>
								<div class="form-group">
									<label class="form-label">Tanggal Lahir</label>
									<input name="tanggal" class="form-control" type="date" required>
								</div>
								<div class="form-group">
                                <label for="idtp" class="form-label">Tahun Pelajaran</label> 
                                <select name="idtp" class="form-control" required>
									<option value="">--Pilih--</option>
                                    <?php
                                    $tp = mysqli_query($koneksi, "SELECT id, tahun_pelajaran, semester FROM tahun_pelajaran");
                                    while($datatp = mysqli_fetch_array($tp)){
                                    ?>
                                    <option value="<?php echo $datatp['id']?>">
                                        <?php echo $datatp['tahun_pelajaran']?> - <?php echo $datatp['semester']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
								<div class="form-btn">
									<input type="submit" class="submit-btn" value="Cari" name="cari">
								</div>
							</form>
							<?php if (isset($_POST['cari'])) {
								$nis = $_POST['nis'];
								$tgl = $_POST['tanggal'];
								$idtp  = $_POST['idtp'];

								$query = mysqli_query($koneksi, "SELECT id FROM siswa WHERE nis = '$nis' AND tanggal_lahir = '$tgl'");
	                            if (mysqli_num_rows($query) > 0) {
		                            $qid = mysqli_fetch_array($query);
		                            $sid = $qid['id'];

		                            $check = mysqli_query($koneksi, "SELECT id_siswa, id_tahunajar FROM nilai_siswa WHERE id_siswa = $sid AND id_tahunajar = $idtp");

		                            if (mysqli_num_rows($check) > 0) {
			                            echo '<script>window.open("table.php?idsiswa='.$sid.'&idtp='.$idtp.'", "_blank")</script>';
		                            } else {
			                            echo '<script>alert("Tidak terdapat data nilaisiswa!")</script>';
			                            // echo '<script>window.location="index.php"</script>';
		                            }
	                            } else{
									echo '<script>alert("Tidak terdapat data nilaisiswa!")</script>';
			                    	// echo '<script>window.location="index.php"</script>';
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>