<?php 
include_once "header.php";
//if(isset($_SESSION['email'])) {
//header('location:index.php'); }
require_once("koneksi.php");
?>
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5" >
          <p>Anda belum punya akun ? Yuk Join!<p>
					<p>Dengan bergabung sebagai reseller, Anda akan lebih mudah untuk mengorganisir stok ketersediaan dan masih banyak promo untuk Reseller</p>
          <a href="daftar.php" class="btn btn-primary">Daftar Sekarang</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Welcome to Macarina e-Commerce Website</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
           
            <form class="user" method="GET" action="plogin.php">
                    <div class="form-group">
                      <input type="email" name ="email"  class="form-control form-control-user" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" name ="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <label>
                        <input type="checkbox"  name="login"> Remember me</label>
                              <a href="login.php">Forgot password?</a>
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
    
                <?php 
	                  if(isset($_GET['pesan'])){
		                  if($_GET['pesan'] == "gagal"){
		          	        echo "Login gagal! email dan password salah!";
		                  }else if($_GET['pesan'] == "gagalstatus"){
                        echo "Akun anda belum diaktifkan oleh Admin";
                      }
		               }
	                ?>
            </form>
            </div>
            
					</div>
				</div>
			</div>
		</section>

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