<?php
include '../config/config.php';
// menyimpan data id kedalam variabel
$id   = $_GET['txt_idrsl'];
// query SQL untuk insert data
$query="DELETE from reseller where id_reseller='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman tAdmin.php
header("location:tReseller.php");
?>