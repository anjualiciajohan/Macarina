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
                $status = $get_user_email ['status'];
                if(strcmp($status,"aktif")){
                    if (strcmp($password,$pass) or $password==$pass) {
                        $_SESSION['user_login'] = $get_user_uname_db;
                        $_SESSION ['email'] = $user_login;
                            header('location: index.php');
                    }
                    else {
                        header("location:login.php?pesan=gagal");
                        
                    }
                }
                else {
                    header("location:login.php?pesan=gagalstatus");
                }
         }
         else {
            header("location:login.php?pesan=gagal");
			
        }
?>