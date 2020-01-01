<?php
// include database connection 
include '../config/config.php';

if (isset($_POST['btn_simpan'])){
    $fileName = $_FILES['gambar']['name'];
    $fileName2 = $_FILES['sc_ktp']['name'];
    $id = $_POST['txt_idrsl'];
    $noktp=$_POST['txt_no_ktp'];
    $nama=$_POST['txt_nama'];
    $almt=$_POST['txt_almt'];
    $notlp=$_POST['txt_no'];
    $email=$_POST['txt_email'];
    $pwd=$_POST['txt_pwd'];
    
    
        

    // update data 
  
    mysqli_query($koneksi, "UPDATE reseller SET nama_reseller='$nama', alamat='$almt',no_tlp='$notlp',scan_ktp='$fileName2',no_ktp='$noktp',email='$email',password ='$pwd',pas_foto='$fileName' WHERE id_reseller=$id");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/reseller/foto/".$_FILES['gambar']['name']);
    move_uploaded_file($_FILES['sc_ktp']['tmp_name'], "../img/reseller/".$_FILES['sc_ktp']['name']);
    echo"<script>alert('Gambar Berhasil diupload !');</script>";
    header("location:tReseller.php");
}

?>
