<?php
include '../config/config.php';
session_start();
// menyimpan data id kedalam variabel
$id   = $_GET['txt_idktn'];
// query SQL untuk insert data
$query="DELETE from konten where id_konten='$id'";
mysqli_query($koneksi, $query);

header("location:tKonten.php");
?>