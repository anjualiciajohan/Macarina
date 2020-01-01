<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA RESELLER </title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN RESELLER</h2>
		
	</center>
 
	<?php 
	include "../config/config.php";
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="2%">Kode Reseller</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th width="2%">No Telepon</th>
			<th>No KTP</th>
			<th>Email</th>
			<th>Password</th>
			<th>Status</th>
		</tr>
		<?php 
		$sql = mysqli_query($koneksi,"SELECT * FROM reseller");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $data['id_reseller']; ?></td>
			<td><?php echo $data['nama_reseller']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['no_tlp']; ?></td>
			<td><?php echo $data['no_ktp']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><?php echo $data['status']; ?></td>
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