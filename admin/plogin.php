<?php
require "config/config.php";
$user = $_GET["username"];
$pass = $_GET["password"];
$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE user ='$user'");
$count = mysqli_num_rows($query);
if($count==1){
    $data = mysqli_fetch_array($query);
    $kode = $data['kode'];
    $password = $data['password'];
    $grub = $data['grub'];
    if($password==$pass){
        session_start();
        $_SESSION ["kode"] = $kode;
        $_SESSION ["grub"] = $grub;
        header('location:index.php');

    }
    else{
        header('location:login.php');
    }
}
else{
    header('location:login.php');
}


?>