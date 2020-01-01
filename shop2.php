<?php 
include_once "header.php";
require "check_if_added.php";
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/Salinan macarina-8.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="shop2.php" class="active">Pack</a></li>
    					<li><a href="shop.php" class="">Box</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
			<?php
				include_once "config.php";
				$query = mysqli_query($koneksi,"SELECT * FROM barang");
				while ($data = mysqli_fetch_array($query)){
					$id = $data ['kd_barang'];
					$price = $data ['harga'];
				?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" <?php echo "src='admin/img/barang/".$data['gambar_brg']."'" ?> alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $data['nama_barang']?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
								
		    						<p class="price"><span class="price-sale">Rp <?php echo $price?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<?php if(!isset($_SESSION['user_login'])){  ?>
	    							<a href="shop2.php" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>	
									</a>
									<a href="shop2.php" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-menu"></i></span>	
									</a>
									<?php
											}
				w								if(check_if_added_to_cart($data['kd_barang'])){
													echo '<a href="shop2.php"  class="buy-now d-flex justify-content-center align-items-center mx-1" disabled>
													<span><i class="ion-ios-cart"></i></span>
												</a>';
												}else{
													?>
													<a href="cart_add.php?id=<?php echo $data['kd_barang'];?>&price=<?php echo $data['harga'];?>" name="add" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    											<span><i class="ion-ios-cart"></i></span>
													</a>
													<?php
													}
												}
												?>
	    							
    							</div>
    						</div>
    					</div>
    				</div>
				</div>
				<?php } ?>
    			
    		</div>
    		
    	
   

<?php 
include_once "footer.php";
?>

  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>