<?php
     /* panggil koneksi database */
     require "koneksi.php"; 

/* jika tombol login diklik */
if(isset($_POST['admin'])){
    //deklarasi variabel
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //cek username terdaftar atau tidak di tabel akun admin
    $query = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE username = '$username'"); //variabel  menampung hasil pencarian di tabel
    $count = mysqli_num_rows($query);

    //uji jika username terdaftar
    if($count > 0){
    //jika terdaftar
    //data ditampung ke variabel uservalid jika username di variabel query ada di tabel
        while ($user_valid = mysqli_fetch_array($query)){
        //cek password sesuai atau tidak
            if($password == $user_valid['password']){
                session_start();
                $_SESSION['admin_id']      = $user_valid['admin_id'];
                $_SESSION['username']      = $user_valid['username'];
                $_SESSION['nama_lengkap']  = $user_valid['nama_lengkap'];
                $_SESSION['password']      = $user_valid['password'];
                header("location: admin/index.php");
            }
            else{
                echo "<script>alert('Maaf login gagal, password yang anda masukkan salah!');document.location='login.php'</script>";
            }
        }
    }
    else{
        echo "<script>alert('Maaf login gagal, username belum terdaftar!');
        document.location='login.php'</script>";
    }
}

else if(isset($_POST['guru'])){
    //deklarasi variabel
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    //cek username terdaftar atau tidak di tabel akun guru
    $queryg = mysqli_query($koneksi, "SELECT * FROM akun_guru WHERE username = '$username'"); //variabel  menampung hasil pencarian di tabel
    $countg = mysqli_num_rows($queryg);
    //uji jika username terdaftar
    if($countg > 0){
    //jika terdaftar
    //data ditampung ke variabel uservalid jika username di variabel query ada di tabel
        while ($user_validg = mysqli_fetch_array($queryg)){
        //cek password sesuai atau tidak
            if($password == $user_validg['password']){
                session_start();
                $_SESSION['id_guru']       = $user_validg['id_guru'];
                $_SESSION['username']      = $user_validg['username'];
                $_SESSION['password']      = $user_validg['password'];
                header("location: guru/index.php");
            }
            else{
                echo "<script>alert('Maaf login gagal, password yang anda masukkan salah!');document.location='login.php'</script>";
            }
        }
    }else{
        echo "<script>alert('Maaf login gagal, username belum terdaftar!');
        document.location='login.php'</script>";
    }
}
?>