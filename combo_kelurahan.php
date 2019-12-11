<script language='javascript'>

function showKel()

{

<?php

include_once "config.php";
$query = "SELECT DISTINCT kecamatan FROM tracking ";

$hasil = mysqli_query($koneksi,$query);

while ($data = mysqli_fetch_array($hasil))

{

$kec = $data['kecamatan'];


echo "if (document.form1.provinsi.value == \"".$kec."\")";

echo "{";

$query2 = "SELECT kelurahan FROM tracking ";

$hasil2 = mysqli_query($koneksi,$query2);

$content = "document.getElementById('kel').innerHTML = \"";

while ($data2 = mysqli_fetch_array($hasil2))

{

$content .= "<option value='".$data2['kelurahan']."'>".$data2['kelurahan']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>