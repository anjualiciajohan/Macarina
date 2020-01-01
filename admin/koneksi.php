<?php 
class database{

	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "macarina";
	var $koneksi = "";
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	function tampil()
	{
		$data = mysqli_query($this->koneksi,"select * from admin");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function tambah_data($nama)
	{
		mysqli_query($this->koneksi,"insert into admin values ('','$nama')");
	}

	function get_by_id($id)
	{
		$query = mysqli_query($this->koneksi,"select * from user where id='$id'");
		return $query->fetch_array();
	}

	function update_data($nama)
	{
		$query = mysqli_query($this->koneksi,"update user set nama='$nama' where id='$id'");
	}

	function delete_data($id)
	{
		$query = mysqli_query($this->koneksi,"delete from user where id='$id'");
	}
}
?>