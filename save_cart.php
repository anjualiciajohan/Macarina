<?php
session_start();
	include 'config.php';
	$idcart = $_POST['iddet'];
	$jumlahcart = $_POST['quantity'];
	$harga = $_POST['harga_'];
	$subtotals = $harga * $jumlahcart;
	
	$update = mysqli_query($koneksi,"UPDATE detail_transaksi SET qty_det='$jumlahcart',subtotal='$subtotals' WHERE id_detail='$idcart'") or die(mysqli_error($koneksi));
	
	header("location:cart.php");
?>