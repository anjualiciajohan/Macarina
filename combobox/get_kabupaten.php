<?php
	include_once 'config_combo.php';
	$provinsi = $_POST['provinsi'];
 
	echo "<option value=''>Pilih Kabupaten</option>";
 
	$query = "SELECT * FROM kab WHERE provinsi=? ORDER BY kab_kota ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $provinsi);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['kd_kab'] . "'>" . $row['kab_kota'] . "</option>";
	}
?>