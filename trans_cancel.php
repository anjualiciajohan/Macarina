<?php
    require 'config.php';
    
    session_start();
    //$item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $kd_trans = $_GET['id'];
    $add_to_cart_query="UPDATE detail_transaksi SET status = REPLACE(status, 'Pending', 'Added to cart') WHERE id_reseller = '$user_id';";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($koneksi));

    $add_to_trans ="DELETE FROM transaksi WHERE kd_transaksi = '$kd_trans'";
    $add_to_trans_result=mysqli_query($koneksi,$add_to_trans) or die(mysqli_error($koneksi));
    header('location: cart.php');
?>