<?php
// include database connection 
include '../config/config.php';

if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $id = $_POST['txt_idbrg'];

    $nama_brg=$_POST['txt_nama_brg'];
    $harga=$_POST['txt_harga'];
    $stok=$_POST['txt_stok'];
    $desc=$_POST['txt_desc'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_brg', harga ='$harga',stok='$stok',gambar_brg='$fileName',deskripsi='$desc' WHERE kd_barang=$id");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/barang/".$_FILES['gambar']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    header("location:tBarang.php");
}

?>
