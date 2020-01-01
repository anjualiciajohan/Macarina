<?php
	include_once 'config_combo.php';
	$kelurahan = $_POST['kelurahan'];
	$subtotal = $_POST['subtotal'];
	
	$query = "SELECT * FROM kel WHERE kd_kel=? ORDER BY kelurahan ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $kelurahan);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		$price = $row['price'];
		$tot = intval($price) + intval($subtotal);
		echo "<label value='" . $tot . "'>Rp. " . $tot . "</label>";
		
	}
?>