<?php
    require 'config.php';
    //require 'header.php';
    session_start();
    //$item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $tgl=date('Y-m-d');
    $grand = $_GET['grand'];
    $add_to_cart_query="UPDATE detail_transaksi SET status = REPLACE(status, 'Added to cart', 'Pending') WHERE id_reseller = '$user_id';";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($koneksi));

    $add_to_trans ="insert into transaksi(tgl_transaksi,grand_total,id_reseller) values ('$tgl','$grand','$user_id')";
    $add_to_trans_result=mysqli_query($koneksi,$add_to_trans) or die(mysqli_error($koneksi));

    $insert_alamat ="insert into alamat_kirim(id_reseller,kd_kab,sys_code,kd_kel) values ('$user_id','$grand','$user_id')";
    $alamat_result=mysqli_query($koneksi,$insert_alamat) or die(mysqli_error($koneksi));
    header('location: checkout.php');
?>