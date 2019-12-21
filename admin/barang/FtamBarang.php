<?php
// include database connection 
include '../config/config.php';

if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $id = $_POST['txt_idbrg'];

    $nama_brg=$_POST['txt_nama_brg'];
    $harga=$_POST['txt_harga'];
    $stok=$_POST['txt_stok'];

    // update data 
  
    mysqli_query($koneksi, "insert into barang (kd_barang, nama_barang, harga, stok, gambar_brg) VALUES ('$id','$nama_brg','$harga','$stok','$fileName')");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/barang/".$_FILES['gambar']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    header("location:tBarang.php");
}

?>


