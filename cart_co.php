<?php
    require 'config.php';
    
    session_start();
    
    $user_id=$_SESSION['id'];
    date_default_timezone_set("Asia/Bangkok");
    $tgl=date('Y-m-d');
    $grand = $_GET['tot'];
    $kab =$_GET['kabupaten'];
    $kec =$_GET['kecamatan'];
    $kel =$_GET['kelurahan'];
    $al = $_GET['alamatlengkap'];
    $kabdrop =$_GET['kabupatendrop'];
    $kecdrop =$_GET['kecamatandrop'];
    $keldrop =$_GET['kelurahandrop'];
    $aldrop = $_GET['alamatlengkapdrop'];
    $add_to_cart_query="UPDATE detail_transaksi SET status = REPLACE(status, 'Added to cart', 'Pending') WHERE id_reseller = '$user_id';";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($koneksi));

    $add_to_trans ="insert into transaksi(tgl_transaksi,grand_total,id_reseller) values 
    ('$tgl','$grand','$user_id')";
    $add_to_trans_result=mysqli_query($koneksi,$add_to_trans) or die(mysqli_error($koneksi));

    $insert_alamat ="insert into alamat_kirim(id_reseller,kd_kab,sys_code,kd_kel,alamat_lengkap,
    kd_kab_drop,sys_code_drop,kd_kel_drop,alamat_lengkap_drop) values 
    ('$user_id','$kab','$kec','$kel','$al','$kabdrop','$kecdrop','$keldrop','$aldrop')";
    $alamat_result=mysqli_query($koneksi,$insert_alamat) or die(mysqli_error($koneksi));
    header('location: checkout.php');
?>