<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db_smpn6';

    $koneksi = mysqli_connect($host, $username, $password, $database) or die ('Gagal Terhubung ke database! Terjadi Kesalahan');
?>