<?php
	include_once 'config_combo.php';
	$kabupatendrop = $_POST['kabupatendrop'];
 
	echo "<option value=''>Pilih Kecamatan</option>";
 
	$query = "SELECT * FROM kec WHERE kd_kab=? ORDER BY kecamatan ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $kabupatendrop);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['sys_code'] . "'>" . $row['kecamatan'] . "</option>";
	}
?>