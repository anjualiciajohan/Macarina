<?php
   include "../config.php";
   if (isset($_POST['submit'])){
   $nama = $_POST['nama-lengkap'];
   $alamat = $_POST['alamat'];
   $no_tlp = $_POST['no-hp'];
   $fileName = $_FILES['scan_ktp']['name'];
   $no_ktp = $_POST['no-ktp'];
   $email = $_POST['email'];
   $pass = $_POST['psw'];
   $status = "nonaktif";

   mysqli_query($koneksi, "insert into reseller (id_reseller, nama_reseller, alamat, no_tlp, scan_ktp, no_ktp, email, password, status) VALUES ('','$nama','$alamat ','$no_tlp','$fileName','$no_ktp ','$email  ','$pass  ','$status ')");
    move_uploaded_file($_FILES['scan_ktp']['tmp_name'], "../admin/img/reseller/".$_FILES['scan_ktp']['name']);
    header("location:../index.php");
    echo"<script>alert('Anda Sudah Tedaftar, Tunggu konfirmasi dari Admin !');</script>";
    
   }
?>