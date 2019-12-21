<script language='javascript'>

function showKel()

{

<?php
include_once "config.php";
// membaca semua propinsi

$query = "SELECT * FROM tracking";

$hasil = mysqli_query($koneksi,$query);

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysqli_fetch_array($hasil))

{

$prov = $data['sys_code'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form11.kecamatan.value == \"".$prov."\")";

echo "{";
    
// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * FROM tracking WHERE sys_code = '$prov'";

$hasil2 = mysqli_query($koneksi,$query2);

$content = "document.getElementById('kel').innerHTML = \"";

while ($data2 = mysqli_fetch_array($hasil2))

{

$content .= "<option value='".$data2['id_kelurahan']."'>".$data2['kelurahan']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>