<?php
    require 'config.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $harga=$_GET['price'];
    $qty=1;
    $user_id=$_SESSION['id'];
    $add_to_cart_query="insert into detail_transaksi(kd_barang,id_reseller,qty_det,subtotal,status) values ('$item_id','$user_id','$qty','$harga','Added to cart')";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($koneksi));
    header('location: cart.php');
?>