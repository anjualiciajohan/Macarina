<?php 
//session_start();
include_once "header.php";

if(!isset($_SESSION['user_login'])){
	header('location: login.php');
}
$user_id=$_SESSION['id'];

$trans = "SELECT * FROM transaksi where id_reseller = '$user_id'";
$Qtrans = mysqli_query($koneksi,$trans);

$user_products_query="select detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
barang.harga,barang.gambar_brg,detail_transaksi.qty_det from detail_transaksi inner join 
barang on barang.kd_barang=detail_transaksi.kd_barang where detail_transaksi.id_reseller='$user_id' 
and detail_transaksi.status='PendingB'";
$user_products_result=mysqli_query($koneksi,$user_products_query) or die(mysqli_error($koneksi));
$no_of_user_products= mysqli_num_rows($user_products_result);
$sum=0;
if($no_of_user_products==0){
	
?>
	<script>
	header('location: shop2.php');
	window.alert("No items in the Chekcout!!");
	
	</script>
<?php
}else{
	
}
$grand = 0; 
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bdeal.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span></span></p>
            <h1 class="mb-0 bread">PEMBAYARAN</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<?php
					while ($kdTR=mysqli_fetch_array($Qtrans)){
					$tr=$kdTR['kd_transaksi'];
					$pem =  "select pembayaran.id_pembayaran,pembayaran.id_bank,pembayaran.kd_transaksi,pembayaran.tgl_bayar,pembayaran.nama_rek_res,pembayaran.no_rek_res, transaksi.grand_total from pembayaran inner join 
					transaksi on transaksi.kd_transaksi=pembayaran.kd_transaksi where pembayaran.kd_transaksi= '$tr'";
					$Qpem = mysqli_query($koneksi,$pem);
					while ($yeah =mysqli_fetch_array($Qpem) ){
					echo '<span><label >Bukti Pembayaran</label></span></br>';
					?>
					<span><label >Nama Rekening Pengirim : <?php echo $yeah['nama_rek_res'];?>
						</label></span></br>
						<span><label >No Rekening Pengirim : <?php echo $yeah['no_rek_res'];?></br>
						</label></span></br>
						<span><label >Tanggal Kirim : <?php echo $yeah['tgl_bayar'];?></br>
						</label></span></br>
						<span><label >Total : <?php echo $yeah['grand_total'];?></br>
						</label></span>
						
				<?php }}
				?>				
				</div>
			</div>
			<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
						
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        
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
						        
						        <td class="image-prod"><div class="img" <?php echo "style='background-image:url(admin/img/barang/".$row['gambar_brg'].")'" ;?>></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['nama_barang']?></h3>
						        	<p><?php echo $row['deskripsi']?></p>
						        </td>
						        
						        <td class="price">Rp.<?php echo $row['harga']?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									<input type="hidden" name="iddet" value="<?php echo $row['id_detail']; ?>">
					             	<input disabled name="quantity" class="quantity form-control input-number" value="<?php echo $row['qty_det']?>"></input>
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
							 
							  <?php $counter=$counter+1;}?>
							
						    </tbody>
						  </table>
						  
						
					  </div>
    			</div>
    		</div>
    		<div class="row">
				
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					
							
					
					</br>
					<a href="co_pemCetak.php" class="btn btn-primary py-3 px-5">Print</a></p>
					
    			</div>
			</div>
			
			</div>
		</section>

		<?php
			include_once "footer.php";
		?>
		

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
  
  </body>
</html>