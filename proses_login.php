<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['email'];
   $pass = $_POST['password'];   
   $sql = "SELECT * FROM daftar_reseller WHERE email = '$email'";
   $query = $db->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Email Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($pass <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['email'] = $hasil['email'];
       header('location:index.php');
     }
   }
?>