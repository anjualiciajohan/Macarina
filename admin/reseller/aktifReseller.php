<?php
// include database connection 
include '../config/config.php';

if (isset($_POST['aktifkan'])){
    $aktif="1";
    $id=$_POST ['txt_idrsl'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE reseller SET status='$aktif' WHERE id_reseller=$id");
    header("location:tReseller.php");
    echo"<script>alert('Akun Telah diAktifkan !');</script>";
    
}
if (isset($_POST['nonaktif'])){
    $aktif="0";
    $id=$_POST ['txt_idrsl'];
    // update data 
  
    mysqli_query($koneksi, "UPDATE reseller SET status='$aktif' WHERE id_reseller=$id");
    header("location:tReseller.php");
    echo"<script>alert('Akun Telah diNonAktifkan !');</script>";
    
}

?>
