<?php
require "config.php";
$email = $_GET["email"];
$pass = $_GET["password"];
$query = mysqli_query($koneksi,"SELECT * FROM reseller WHERE email ='$email'");
$count = mysqli_num_rows($query);
if($count==1){
    $data = mysqli_fetch_array($query);
    $kode = $data['kode'];
    $password = $data['password'];
    if($password==$pass){
        session_start();
        $_SESSION ["kode"] = $kode;
        header('location:index.php');
    }
    else{
        header("location:login.php?pesan=gagal");
    }
}
else{
    header("location:login.php?pesan=gagal");
}

/*if(isset($_POST['submit'])) {
    require "config.php";
    $email = $_GET["email"];
    $pass = mysqli_real_escape_string($con, $_GET["password"]);
  
    if ($email == null || $pass == null) {
  
       echo '<script type="text/javascript">alert("Username / Password tidak boleh kosong");</script>';
  
    } else {
  
     $log = $con->prepare("SELECT * FROM reseller WHERE email = ?") or die($con->error);
     $log->bind_param('s', $email);
     $log->execute();
     $log->store_result();
     $jml = $log->num_rows();
     $log->bind_result($id_reseller, $nama_reseller, $alamat, $no_tlp, $scan_ktp,$no_ktp,$email, $password);
     $log->fetch();
  
       if ($jml > 0) {
  
  
         if (password_verify($pass, $password)) {
  
           $_SESSION['id_reseller']   = $id;
           $_SESSION['nama_reseller']       = $fullname;
  
           header('location:./index.php');
  
        } else {
  
           echo '<script type="text/javascript">alert("Password Salah");</script>';
        }
  
  
       } else {
  
          echo '<script type="text/javascript">alert("Username/Password tidak dikenali");</script>';
  
       }
  
    }
  }*/
?>