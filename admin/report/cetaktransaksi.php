<?php 
            include "../config/config.php";
            $id = $_GET['txt_ctkidtr'];
            $grandtotal = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_reseller='$id'");
            $query_mysql1 = mysqli_query($koneksi,"SELECT  detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
            barang.harga,barang.stok,barang.gambar_brg,detail_transaksi.qty_det,detail_transaksi.subtotal,reseller.nama_reseller from detail_transaksi inner join barang JOIN reseller on barang.kd_barang=detail_transaksi.kd_barang AND detail_transaksi.id_reseller=reseller.id_reseller where detail_transaksi.id_reseller='$id'");

            $query_mysql2 = mysqli_query($koneksi,"SELECT  detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
            barang.harga,barang.stok,barang.gambar_brg,detail_transaksi.qty_det,detail_transaksi.subtotal,reseller.nama_reseller from detail_transaksi inner join barang JOIN reseller on barang.kd_barang=detail_transaksi.kd_barang AND detail_transaksi.id_reseller=reseller.id_reseller where detail_transaksi.id_reseller='$id'");
            //while($data = mysqli_fetch_array($query_mysql2)){ 
?>  

<!DOCTYPE html>
<html>
<head>
	<title>TRANSAKSI</title>
</head>
<body>

 
	<center>
		<h2>MACARINA</h2><br>
        <h3>Jl. Sriwijaya XX No.11 Karangrejo - Jember</h3>
        <h3>CV. MACARINDO BERKAH GROUP</h3>
        <h3>Telp. 081 217 757 777</h3>
        <h3>NPWP : 90.856.404.0-626.000</h3>
        <p>----------------------------------------------------------------------------------------------------</p>
    
        <?php $data=mysqli_fetch_assoc($query_mysql2); ?>
        <p><b>NAMA RESELLER : </b></p>
		<td><label><?php echo $data['nama_reseller'] ?><input type="hidden" name="txt_idtr" value="<?php echo $data['nama_reseller'] ?>"></td>
    </center>
    <p align="center">----------------------------------------------------------------------------------------------------</p>
  <div>
  <div>
	<table align="center">
		<tr>
            <th>Nama</th>
            <th width="100px">Harga</th>
            <th>Qty</th>
            <th width="100px">Subtotal</th>
		</tr>
        <?php while($data1 = mysqli_fetch_array($query_mysql1)){  ?>
		<tr>
        <td style="text-align:center"><?php echo $data1['nama_barang'] ?></td>
        <td style="text-align:center"><?php echo $data1['harga']?></td>
        <td style="text-align:center"><?php echo $data1['qty_det']?></td>
        <td style="text-align:center"><?php echo $data1['subtotal']?></td>
        </tr>
        <?php } ?>
        </div>
        </div>
	</table>
    <center>
    
    <p>----------------------------------------------------------------------------------------------------</p>
    <?php $data2=mysqli_fetch_assoc($grandtotal); ?>
    <p style="margin-left:200px"><strong>Grand Total</strong> :&nbsp;<?php echo $data2['grand_total'] ?> </p>
  <!--<p style="margin-left:200px"><strong>Grand Total</strong> :&nbsp;<?php //echo $data2['grand_total'] ?> </p>-->
 <h4> Barang yang sudah dibeli tidak bisa ditukar/dikembalikan</h4>
 <h4> Komplin dan keluhan pelanggan harap hubungi nomer yang tersedia</h4>
 </center>
 <script>
		window.print();
	</script>
</body>
</html>