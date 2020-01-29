<?php
require "config/config.php";
session_start();
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query =
mysqli_query($koneksi,"SELECT * FROM admin WHERE user='$username' and password='$password'"); 
$cek = mysqli_num_rows($query);

if($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';

    header("location:home.php");
}

else if($username==null || $password==null){
    echo "<script>alert('username dan password tidak boleh kosong');window.history.back();</script>";
}

else{
    echo"<script>alert('username atau password anda salah');window.history.back();</script>";
} 
?>