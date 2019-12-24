<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA ADMIN </title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN ADMIN</h2>
		
	</center>
 
	<?php 
	include "../config/config.php";
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="2%">Kode Admin</th>
            <th>User</th>
            <th width="2%">Password</th>
            <th >Alamat</th>
            
		</tr>
		<?php 
		$sql = mysqli_query($koneksi,"SELECT * FROM admin");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $data['kd_admin']; ?></td>
			<td><?php echo $data['user']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><?php echo $data['alamat_admin']; ?></td>
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