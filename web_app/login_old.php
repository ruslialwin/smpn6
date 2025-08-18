<?php
     /* panggil koneksi database */
     require "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Sign-in</title>
    <style type="text/css">
        body {
            background-image: url("image/login.jpg");
        }
        .button {
        background-color: white;
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        border: 2px solid chocolate;
        display: inline-block;
        font-size: 16px;
        }
        .button:hover{
            background-color: #FFFDD0;
            color: chocolate;
            font-weight: bold;
        }
        input[type=text]:focus, input[type=password]:focus{
            border: 3px solid chocolate;
            background-color: #FFFDD0;
            color: chocolate;
            font-weight: bold;
        }
    </style>
</head>
<body>  
<div class="container" style="margin-top:3.25%">
    <div class="card" style="width: 33.5%; height: 75%; margin : 0 auto;">
        <div class="card-body">
            <center><img src="image/logosekolah.png" alt="Logo" width="65 px"></center>
            <h5 class="card-title py-3 text-center">Login<br>
            </h5>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Input username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input password" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-block button" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

    /* jika tombol login diklik */
    if(isset($_POST['login'])){
        //deklarasi variabel
        $username = $_POST['username'];
        $password = $_POST['password'];

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
        else if($count == 0){
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
            }
        }
        else{
            echo "<script>alert('Maaf login gagal, username belum terdaftar!');
            document.location='login.php'</script>";
        }
    }
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>