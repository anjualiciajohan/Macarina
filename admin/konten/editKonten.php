<?php
// include database connection 
include '../config/config.php';
session_start();
if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $desc=$_POST['txt_desc'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE konten SET gambar='$fileName',keterangan='$desc' WHERE id_konten=$id");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/konten/".$_FILES['gambar']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    header("location:tKonten.php");
}

?>
