<?php
	include_once 'config_combo.php';

	echo "<option value=''>Pilih Provinsi</option>";

	$query = "SELECT DISTINCT provinsi FROM kab ORDER BY provinsi ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['provinsi'] . "'>" . $row['provinsi'] . "</option>";
	}
?>