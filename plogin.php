<?php
require "config.php";
session_start();
ob_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}
		$user_login = $_GET ['email'];
		$pass = $_GET ['password'];
		$result = mysqli_query($koneksi,"SELECT * FROM reseller WHERE email='$user_login' ");
		$num = mysqli_num_rows($result);
		if ($num==1) {
            $get_user_email = mysqli_fetch_array($result);
                $get_user_uname_db = $get_user_email['email'];
                $password = $get_user_email['password'];
                $user_login = $get_user_email ['email'];
			if ($password==$pass) {
                $_SESSION['user_login'] = $get_user_uname_db;
                $_SESSION ['email'] = $user_login;
                    header('location: index.php');
            }else {
                header("location:login.php?pesan=gagali");
                
            }
		}
		else {
            header("location:login.php?pesan=gagali");
			
		}
	



/*
$user = $_GET["email"];
$pass = $_GET["password"];
$query = mysqli_query($koneksi,"SELECT * FROM reseller WHERE email ='$user'");
//$query = mysqli_query($koneksi,"SELECT * FROM reseller WHERE user ='$email'");
$count = mysqli_num_rows($query);
if($count==1){
    $data = mysqli_fetch_array($query);
    $kode = $data['id_reseller'];
    $password = $data['password'];
    $user = $data['email'];
    if($password==$pass){
        $_SESSION ["id_reseller"] = $kode;
        $_SESSION ['email'] = $user;
        header('location:index.php');
    }
    else{
        header("location:login.php?pesan=gagal");
    }
}
else{
    header("location:login.php?pesan=gagal");
}*/
?>