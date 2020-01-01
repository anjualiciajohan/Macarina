<?php 
//session_start();
include_once "header.php";

if(!isset($_SESSION['user_login'])){
	header('location: login.php');
}
$user_id=$_SESSION['id'];
$user_products_query="select detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
barang.harga,barang.gambar_brg,detail_transaksi.qty_det from detail_transaksi inner join 
barang on barang.kd_barang=detail_transaksi.kd_barang where detail_transaksi.id_reseller='$user_id' 
and detail_transaksi.status='Added to cart'";
$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
$no_of_user_products= mysqli_num_rows($user_products_result);
$sum=0;
if($no_of_user_products==0){
	
?>
	<script>
	header('location: shop2.php');
	window.alert("No items in the cart!!");
	
	</script>
<?php
}else{
	while($row=mysqli_fetch_array($user_products_result)){
		
   }
}
$grand = 0; 
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
							<form method="post" action="save_cart.php">
						      <tr class="text-center">
						        <td class="product-remove"><a href="cart_remove.php?id=<?php echo $row['kd_barang']?>" onclick="return confirm('Are you sure?')"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" <?php echo "style='background-image:url(admin/img/barang/".$row['gambar_brg'].")'" ;?>></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['nama_barang']?></h3>
						        	<p><?php echo $row['deskripsi']?></p>
						        </td>
						        
						        <td class="price">Rp.<?php echo $row['harga']?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									<input type="hidden" name="iddet" value="<?php echo $row['id_detail']; ?>">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $row['qty_det']?>" onchange="mySubmit(this.form)">
								</div>
								
					          </td>
							  <?php $h = $row['harga'];
							  		$q = $row['qty_det'];
									$totals = $h * $q;
									$grand += $totals;
							 ?>
								<input type="hidden" name="harga_" value="<?php echo $h; ?>">
								<td class="total">Rp. <?php echo $totals;?></td>
						      </tr><!-- END TR-->
							  </form>
							  <?php $counter=$counter+1;}?>
							
						    </tbody>
						  </table>
						  
						
					  </div>
    			</div>
    		</div>
    		<div class="row">
				
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<h4>Estimasi Biaya Kirim</h4>
					<p>Masukkan alamat anda</p>
				<div class="form-group">
					<label>Provinsi</label>
					<select class="form-control" name="provinsi" id="provinsi">
						<option value=""> Pilih Provinsi</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Kabupaten</label>
					<select class="form-control" name="kabupaten" id="kabupaten">
						<option value=""></option>
					</select>
				</div>	
				<div class="form-group">
					<label>Kecamatan</label>
					<select class="form-control" name="kecamatan" id="kecamatan">
						<option value=""></option>
					</select>
				</div>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="form-group">
					<label>Kelurahan</label>
					<select class="form-control" name="kelurahan" id="kelurahan">
						<option value=""></option>
					</select>
				</div>
	  			  <div class="form-group">
	              	<label for="country">Kode Pos</label><br/>
	                <input type="text" class="form-control text-left px-4">
	              </div>
				  <div class="form-group">
	              	<label for="country">Alamat Lengkap</label><br/>
	                <input type="text" class="form-control text-left px-6">
	              </div>
				  									
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total Keranjang</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
							<span><label >Rp. <?php echo $grand;?></label>
						 <input type ="hidden" name="subtotal" id="subtotal" value="<?php echo $grand;?>">
						</span>
    					</p>
    					<p class="d-flex">
    						<span>Biaya Kirim</span>
    						<span><label name="biayakirim" id="biayakirim"></label></span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
							<span><label name="totalall"  id="totalall"></label>
							<select hidden name="tot" id="tot">
							<option value=""></option>
					</select>
						</span>
    					</p>
					</div>
					
					<p><a href="cart_co.php?id=<?php echo $user_id?>&grand=?tot" class="btn btn-primary py-3 px-4">Checkout Sekarang</a></p>
					
					<p><a href="shop2.php" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
    			</div>
			</div>
			
			</div>
		</section>
		

		<script type="text/javascript">
	function mySubmit(theForm) {
    $.ajax({ // create an AJAX call...
        data: $(theForm).serialize(), // get the form data
        type: $(theForm).attr('method'), // GET or POST
        url: $(theForm).attr('action'), // the file to call
        success: function (response) { // on success..
            $('#here').html(response); // update the DIV
        }
    });
}
	</script>
  
  
  

  <script src="js/jquery-3.3.1.min.js"></script>
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
  <script type="text/javascript">
					$(document).ready(function(){
						$.ajax({
							type: 'POST',
							url: "combobox/get_provinsi.php",
							cache: false, 
							success: function(msg){
							$("#provinsi").html(msg);
							}
						});
						$("#provinsi").change(function(){
          	var provinsi = $("#provinsi").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_kabupaten.php",
	              	data: {provinsi: provinsi},
	              	cache: false,
	              	success: function(msg){
	                  $("#kabupaten").html(msg);
	                }
	            });
            });

            $("#kabupaten").change(function(){
          	var kabupaten = $("#kabupaten").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_kecamatan.php",
	              	data: {kabupaten: kabupaten},
	              	cache: false,
	              	success: function(msg){
	                  $("#kecamatan").html(msg);
	                }
	            });
            });

            $("#kecamatan").change(function(){
          	var kecamatan = $("#kecamatan").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_kelurahan.php",
	              	data: {kecamatan: kecamatan},
	              	cache: false,
	              	success: function(msg){
					  $("#kelurahan").html(msg);
	                }
				});
			});
			$("#kelurahan").change(function(){
			  var kelurahan = $("#kelurahan").val();
			  
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_biaya.php",
	              	data: {kelurahan: kelurahan},
	              	cache: false,
	              	success: function(msg){
					  $("#biayakirim").html(msg);
					  
	                }
	            });
            });
			$("#kelurahan").change(function(){
				var kelurahan = $("#kelurahan").val();
			  	var subtotal = $("#subtotal").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_total.php",
	              	data: {kelurahan:kelurahan,subtotal:subtotal},
	              	cache: false,
	              	success: function(msg){
					  $("#totalall").html(msg);
	                }
	            });
			});
			$("#kelurahan").change(function(){
				var kelurahan = $("#kelurahan").val();
			  	var subtotal = $("#subtotal").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "combobox/get_total2.php",
	              	data: {kelurahan:kelurahan,subtotal:subtotal},
	              	cache: false,
	              	success: function(msg){
					  $("#tot").html(msg);
	                }
	            });
            });	
					});
					</script>
  
  
    
  </body>
</html>