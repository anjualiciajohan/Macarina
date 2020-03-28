<?php
	include_once 'config_combo.php';
	$biayakirim = $_POST['biayakirim'];
	$biayakirim = 0;
	$kelurahandrop = $_POST['kelurahandrop'];
	
	
	$query = "SELECT * FROM kel WHERE kd_kel=? ORDER BY kelurahan ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $kelurahandrop);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<label value='" . $biayakirim. "'></label>";
		echo "<label value='" . $row['kd_kel'] . "'>Rp. " . $row['price'] . "</label>";
		
	}
?>