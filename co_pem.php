<?php
    require 'config.php';
    
    session_start();
    
    $user_id=$_SESSION['id'];
    date_default_timezone_set("Asia/Bangkok");
    $tgl=date('Y-m-d');
    $grand = $_GET['tot'];
    $bukti = $_FILES['buktiByr']['name'];
    $bank = $_GET['bank_tujuan'];
    $kdtr = $_GET['kdtr'];
    $namarekres = $_GET['namarekres']; 
    $norekres = $_GET['norekres'];
    $statuspes=0;
    $kdalll =$_GET['kdALL'];
    
    $add_to_cart_query="UPDATE detail_transaksi SET status = REPLACE(status, 'Pending', 'PendingB') WHERE id_reseller = '$user_id';";
    $add_to_cart_result=mysqli_query($koneksi,$add_to_cart_query) or die(mysqli_error($koneksi));

    $add_to_pem ="insert into pembayaran(id_bank,kd_transaksi,bukti_bayar,tgl_bayar,nama_rek_res,no_rek_res,status_pesan)
    values ('$bank','$kdtr','$bukti','$tgl','$namarekres','$norekres','$statuspes')";
    $add_to_pem_result=mysqli_query($koneksi,$add_to_pem) or die(mysqli_error($koneksi));
    move_uploaded_file($_FILES['buktiByr']['tmp_name'], "../admin/img/bukti/".$_FILES['buktiByr']['name']);
    

    header('location: pembayaran.php');
?>