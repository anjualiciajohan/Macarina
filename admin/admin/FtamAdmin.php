<?php
// include database connection 
include '../config/config.php';
session_start();
if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $id = $_POST['txt_idadm'];

    $user=$_POST['txt_user'];
    $pwd=$_POST['txt_pwd'];
    $almt=$_POST['txt_almt'];

    // update data 
  
    mysqli_query($koneksi, "insert into admin (kd_admin, user, password, alamat_admin, gambar) VALUES ('$id','$user','$pwd','$almt','$fileName')");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$_FILES['gambar']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    header("location:tAdmin.php");
}

?>


