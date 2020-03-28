<?php
	include_once 'config_combo.php';
	$kecamatandrop = $_POST['kecamatandrop'];
 
	echo "<option value=''>Pilih Kelurahan</option>";
 
	$query = "SELECT * FROM kel WHERE sys_code=? ORDER BY kelurahan ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $kecamatandrop);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['kd_kel'] . "'>" . $row['kelurahan'] . "</option>";
		
	}
?>