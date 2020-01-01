<?php
    require 'config.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $harga=$_GET['price'];
   
    $user_id=$_SESSION['id'];
    $add_to_cart_query="insert into detail_transaksi(kd_barang,id_reseller,subtotal,status) values ('$item_id','$user_id','$harga','Added to cart')";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($con));
    header('location: cart.php');
?>