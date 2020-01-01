<?php
    require 'config.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $delete_query="delete from detail_transaksi where id_reseller='$user_id' and kd_barang='$item_id'";
    $delete_query_result=mysqli_query($koneksi,$delete_query) or die(mysqli_error($koneksi));
    header('location: cart.php');
?>