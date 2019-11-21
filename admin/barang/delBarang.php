<?php
include '../config/config.php';
// menyimpan data id kedalam variabel
$id   = $_GET['txt_idbrg'];
// query SQL untuk insert data
$query="DELETE from barang where kd_barang='$id'";
mysqli_query($koneksi, $query);

header("location:tBarang.php");
?>