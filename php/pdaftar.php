<?php
   include "../config.php";
   if (isset($_POST['submit'])){
   $nama = $_POST['nama-lengkap'];
   $alamat = $_POST['alamat'];
   $no_tlp = $_POST['no-hp'];
   $fileName = $_FILES['scan_ktp']['name'];
   $fileName2 = $_FILES['foto']['name'];
   $no_ktp = $_POST['no-ktp'];
   $email = $_POST['email'];
   $pass = $_POST['psw'];
   $rptpass = $_POST['psw-repeat'];
   $status = 0;

   if($pass == $rptpass){

   mysqli_query($koneksi, "insert into reseller (nama_reseller, alamat, no_tlp, scan_ktp, no_ktp, email, password, status, pas_foto) VALUES ('$nama','$alamat ','$no_tlp','$fileName','$no_ktp ','$email  ','$pass  ','$status ','$fileName2')");
    move_uploaded_file($_FILES['scan_ktp']['tmp_name'], "../admin/img/reseller/".$_FILES['scan_ktp']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], "../admin/img/reseller/foto/".$_FILES['foto']['name']);
    header("location:../index.php");
    echo"<script>alert('Anda Sudah Tedaftar, Tunggu konfirmasi dari Admin !');</script>";
   } else {
      echo"<script>alert('Password yang andak masukkan tidak sama !'); window.history.go(-1);</script>";
   }
   }
?>