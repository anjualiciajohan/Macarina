<?php
// include database connection 
include '../config/config.php';
session_start();
if (isset($_POST['aktifkan'])){
    $aktif="1";
    $id=$_POST ['txt_idtr'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE pembayaran SET status_pesan='$aktif' WHERE kd_transaksi=$id");
    header("location:transaksi.php");
    echo"<script>alert('Telah DiKonfirmasi !');</script>";
    
}
if (isset($_POST['nonaktif'])){
    $aktif="0";
    $id=$_POST ['txt_idtr'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE pembayaran SET status_pesan='$aktif' WHERE kd_transaksi=$id");
    header("location:transaksi.php");
    echo"<script>alert('Pesanan diBatalkan!');</script>";
    
}

?>
