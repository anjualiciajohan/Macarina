<?php 
//session_start();
include_once "header.php";
include_once "config.php";

$user_id=$_SESSION['id'];

$trans = "SELECT * FROM transaksi where id_reseller = '$user_id'";
$Qtrans = mysqli_query($koneksi,$trans);

$user_products_query="select detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
barang.harga,barang.gambar_brg,detail_transaksi.qty_det from detail_transaksi inner join 
barang on barang.kd_barang=detail_transaksi.kd_barang where detail_transaksi.id_reseller='$user_id' 
and detail_transaksi.status='PendingB'";
$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
$no_of_user_products= mysqli_num_rows($user_products_result);
$sum=0;
if($no_of_user_products==0){}
	
?>
 <!DOCTYPE html>
<html>
<head>
	<title>PEMBAYARAN</title>
</head>
<body>

 
	<center>
		<h2>MACARINA</h2><br>
        <h3>Jl. Sriwijaya XX No.11 Karangrejo - Jember</h3>
        <h3>CV. MACARINDO BERKAH GROUP</h3>
        <h3>Telp. 081 217 757 777</h3>
        <h3>NPWP : 90.856.404.0-626.000</h3>
        <p>----------------------------------------------------------------------------------------------------</p>
        <?php
					while ($kdTR=mysqli_fetch_array($Qtrans)){
					$tr=$kdTR['kd_transaksi'];
					$pem =  "select pembayaran.id_pembayaran,pembayaran.id_bank,pembayaran.kd_transaksi,pembayaran.tgl_bayar,pembayaran.nama_rek_res,pembayaran.no_rek_res, transaksi.grand_total from pembayaran inner join 
					transaksi on transaksi.kd_transaksi=pembayaran.kd_transaksi where pembayaran.kd_transaksi= '$tr'";
					$Qpem = mysqli_query($koneksi,$pem);
					while ($yeah =mysqli_fetch_array($Qpem) ){
					echo '<span><h4 >Bukti Pembayaran</h4></span></br>';
					?>
                        <span><h4 >Nama Rekening Pengirim : <?php echo $yeah['nama_rek_res'];?>
						</h4></span></br>
						<span><h4 >No Rekening Pengirim : <?php echo $yeah['no_rek_res'];?></br>
						</h4></span></br>
						<span><h4 >Tanggal Kirim : <?php echo $yeah['tgl_bayar'];?></br>
						</h4></span></br>
						<span><h4 >Total : <?php echo $yeah['grand_total'];?></br>
						</h4></span>
      
      
                        <?php }}?>
        
    
    
    <p>----------------------------------------------------------------------------------------------------</p>
    
    
 <h4> Barang yang sudah dibeli tidak bisa ditukar/dikembalikan</h4>
 <h4> Komplin dan keluhan pelanggan harap hubungi nomer yang tersedia</h4>
 </center>
 <script>
		window.print();
	</script>
</body>
</html>