<?php
// include database connection 
include '../config/config.php';

if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $id = $_POST['txt_idadm'];

    $user=$_POST['txt_user'];
    $pwd=$_POST['txt_pwd'];
    $almt=$_POST['txt_almt'];

    // update data 
  
    mysqli_query($koneksi, "UPDATE admin SET user='$user', password ='$pwd',alamat_admin='$almt',gambar='$fileName' WHERE kd_admin=$id");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    header("location:tAdmin.php");
}

?>
