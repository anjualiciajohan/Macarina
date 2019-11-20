<?php
include '../config/config.php';
// menyimpan data id kedalam variabel
$id   = $_GET['txt_idadm'];
// query SQL untuk insert data
$query="DELETE from admin where kd_admin='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman tAdmin.php
header("location:tAdmin.php");
?>