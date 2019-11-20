<?php
require "config.php";
$user = $_GET["email"];
$pass = $_GET["password"];
$query = mysqli_query($koneksi,"SELECT * FROM reseller WHERE email ='$user'");
//$query = mysqli_query($koneksi,"SELECT * FROM reseller WHERE user ='$email'");
$count = mysqli_num_rows($query);
if($count==1){
    $data = mysqli_fetch_array($query);
    $kode = $data['id_reseller'];
    $password = $data['password'];
    if($password==$pass){
        session_start();
        $_SESSION ["id_reseller"] = $kode;
        header('location:index.php');
    }
    else{
        header("location:login.php?pesan=gagal");
    }
}
else{
    header("location:login.php?pesan=gagal");
}



?>