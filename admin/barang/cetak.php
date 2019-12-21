<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA BARANG </title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		
	</center>
 
	<?php 
	include "../config/config.php";
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="2%">Kode Barang</th>
            <th>Nama</th>
            <th>Harga</th>
            <th width="2%">Stok</th>
            
		</tr>
		<?php 
		$sql = mysqli_query($koneksi,"SELECT * FROM barang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $data['kd_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['stok']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
    
	<script>
		window.print();
	</script>
 
</body>
</html>