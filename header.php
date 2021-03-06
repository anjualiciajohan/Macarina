
<?php 
require "config.php";
session_start();
ob_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$kd= $_SESSION['id'];
	$result = mysqli_query($koneksi,"SELECT * FROM reseller WHERE email ='$user' AND id_reseller = '$kd'");
		$get_user_email = mysqli_fetch_array($result);
			//$uname_db = $get_user_email['nama_reseller'];
			$cresult = mysqli_query($koneksi,"SELECT SUBSTRING(nama_reseller, 1, 6) AS ExtractString
		FROM reseller WHERE id_reseller= '$kd'");
		$row = mysqli_fetch_array($cresult);
		$uname_db = $row['ExtractString'];
			$count11 = mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE id_reseller='".$kd."' AND status = 'Added to cart'");
			$counting = mysqli_num_rows($count11);
		}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Macarina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
		
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">

  
 

		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+6285 736 576 168</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">macarina.id@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Official Website Macarina</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><img src="images/logo.png" style="float:left;" width="4%"/>Macarina</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
			  <li class="nav-item"><a href="shop2.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="profilperusahaan.php" class="nav-link">Tentang</a></li>
	          	
			<li class="nav-item"><a href="testi.php" class="nav-link">Testi</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Kontak</a></li>
			  
			  <?php
			  if ($user!="") {
				if ($get_user_email!="") {
					echo '<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>'.$counting.'</a></li>';
					echo '<li class="nav-item"><a href="checkout.php" class="nav-link">Checkout</a></li>';
				  } 
			}
			else {
				echo '<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>';
			}
              ?>

			  <li class="nav-item">
			  			<?php 
						if ($user!="") {
							echo '<a  href="profil.php?id_reseller='.$user.'" class="nav-link"> '.$uname_db.'</a>';
							echo '<br/>';
						}
						else {
							echo '<a href="login.php" class="nav-link">Masuk</a>';
						}
					 	?>
			  </li>
			  <li class="nav-item">
			  			<?php 
						if ($user!="") {
							echo '<a href="logout.php" class="nav-link">Keluar</a>';
							echo '<br/>';
						}
						else {
							echo '<a  href="daftar.php" class="nav-link">Daftar</a>';
						}
					 ?>
			  </li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	