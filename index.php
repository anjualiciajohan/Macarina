<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['email'])){
    header ("location:login.php");
}
else { 
    $username = $_SESSION['email']; 
}
?>
 <title>Halaman Sukses Login</title>
 <div align='center'>
    Selamat Datang, <b><?php echo $email;?></b> <a href="logout.php"><b>Logout</b></a>
 </div>
}