<?php
   require_once("koneksi.php");
   $username = $_POST['email'];
   $pass = $_POST['password'];
   $sql = "SELECT * FROM daftar_reseller WHERE email = '$email'";
   $query = $db->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'>Sudah Terdaftar!Silahkan tunggu Konfirmasi dari email Anda! <a href='daftar.php'>Back</a></div>";
   } else {
     if(!$username || !$pass) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {
       $data = "INSERT INTO daftar_reseller VALUES (NULL, '$email', '$password')";
       $simpan = $db->query($data);
       if($simpan) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   }
?>