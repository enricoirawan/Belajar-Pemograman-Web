<?php
//memulai sesi
session_start();

//menghubungkan data dengan koneksi
include 'conn.php';

//menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user where username='$username' and password='$password'";

$user = mysqli_query($host, $query);
var_dump($user);

$cek = mysqli_num_rows($user);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:sekolah/index.php");
} else {
    header("location:index.php?pesan=gagal");
}
