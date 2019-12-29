<?php
    require 'config.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $add_to_cart_query="UPDATE detail_transaksi(kd_barang,id_reseller,status) VALUES ('$item_id','$user_id','Added to cart')";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($con));
    header('location: shop2.php');
?>