<?php 
//session_start();
include_once "header.php";
include_once "combo_kelurahan.php";
if(!isset($_SESSION['user_login'])){
	header('location: login.php');
}
$user_id=$_SESSION['id'];
$user_products_query="select barang.kd_barang,barang.nama_barang,barang.harga,barang.gambar_brg,detail_transaksi.qty_det from detail_transaksi inner join barang on barang.kd_barang=detail_transaksi.kd_barang where detail_transaksi.id_reseller='$user_id'";
$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
$no_of_user_products= mysqli_num_rows($user_products_result);
$sum=0;
if($no_of_user_products==0){
	//echo "Add items to cart first.";
?>
	<script>
	window.alert("No items in the cart!!");
	</script>
<?php
}else{
	while($row=mysqli_fetch_array($user_products_result)){
		$sum=$sum+$row['harga']; 
   }
}

?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bdeal.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
			<form method="POST">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
						
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
							</thead>
							
						    <tbody>
							<?php 
								$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
								$no_of_user_products= mysqli_num_rows($user_products_result);
								$counter=1;
							while($row=mysqli_fetch_array($user_products_result)){
								
							?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="cart_remove.php?id=<?php echo $row['kd_barang']?>" onclick="return confirm('Are you sure?')"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="<?php echo "background-image:url(admin/img/barang/".$row['gambar_brg'].")" ?>;"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['nama_barang']?></h3>
						        	<p>Desc</p>
						        </td>
						        
						        <td class="price">Rp.<?php echo $row['harga']?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="number" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
								</div>
					          </td>
								
						        <td class="total">Rp. <?php //echo $sum?></td>
						      </tr><!-- END TR-->
							  <?php $counter=$counter+1;}?>
						    </tbody>
						  </table>
						  
						
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Kode Kupon</h3>
    					<p>Masukkan kode kupon jika ada</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Kode Kupon</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="cekTracking.php" class="btn btn-primary py-3 px-4">Cek</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimasi Biaya Kirim</h3>
    					<p>Masukkan alamat anda</p>
  						<form action="#" class="info">
							  <form name="form1" method ="post" id="form_combo">
	              <div class="form-group">
	              	<label for="country">Provinsi</label>
	                <input type="text" class="form-control text-left px-4">
				  </div>
				
	              <div class="form-group">
	              	<label for="country">Kota/Kabupaten</label>
	                <input type="text" class="form-control text-left px-4">
	              </div>
	              <div class="form-group">
					  <label for="country">Kecamatan</label>
					  <select name ="kecamatan" onchange='showKel()'>
					  <option value="">pilih Kecamatan</option>
					  <?php 
						$track="SELECT DISTINCT kecamatan FROM tracking ";
						$abc = mysqli_query($koneksi,$track);
						while ($prov = mysqli_fetch_array($abc)){
						?>
						<option nama="kelurahan" value="<?php echo $prov ['kecamatan'];?>"><?php echo $prov ['kecamatan'];?></option>
						<?php } ?>
						</select>
				  </div>
				  <div class="form-group">
	              	<label for="country">Kelurahan</label>
					  <select name="kelurahan" id="kel">
						<option value="">Pilih Kelurahan</option>
						
					</select>
				  </div>
							  </form>
				  <div class="form-group">
	              	<label for="country">Kode Pos</label>
	                <input type="text" class="form-control text-left px-4">
	              </div>
				  <div class="form-group">
	              	<label for="country">Alamat Lengkap</label>
	                <input type="text" class="form-control text-left px-4">
	              </div>
	            </form>
    				</div>
					<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Cek</a></p>
					
					<input type="hidden" name="update">
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Keranjang</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rp. <?php echo $sum;?></span>
    					</p>
    					<p class="d-flex">
    						<span>Biaya Kirim</span>
    						<span>$0.00</span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp. </span>
    					</p>
    				</div>
					<p><a href="success.php?id=<?php echo $user_id?>" class="btn btn-primary py-3 px-4">Checkout Sekarang</a></p>
					<p><a href="index.php" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
    			</div>
			</div>
			</form>
			</div>
		</section>
		
    
  

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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>