<?php
require "config/config.php";
session_start();
ob_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: home.php");
}
$user_login = $_GET ['username'];
		$pass = $_GET ['password'];
		$result = mysqli_query($koneksi,"SELECT * FROM admin WHERE user='$user_login' ");
		$num = mysqli_num_rows($result);
		if ($num==1) {
                $get_user_email = mysqli_fetch_array($result);
                $id=$get_user_email['id_admin'];
                $get_user_uname_db = $get_user_email['user'];
                $password = $get_user_email['password'];
                $user_login = $get_user_email ['user'];
                $kode = $data['kode'];
                $grub = $data['grub'];
                    if (strcmp($password,$pass) or $password==$pass) {
                        session_start();
                        $_SESSION['user_login'] = $get_user_uname_db;
                        $_SESSION ['user'] = $user_login;
                        $_SESSION['id'] = $id;
                        $_SESSION ["kode"] = $kode;
                        $_SESSION ["grub"] = $grub;
                            header('location: home.php');
                    }
                    else {
                        header("location:index.php?pesan=gagal");
                        
                    }
         }
         else {
            header("location:index.php?pesan=gagal");
        }
        
/* require "config/config.php";
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
        header('location:home.php');

    }
    else{
        header('location:index.php');
    }
}
else{
    header('location:index.php');
} */


?>