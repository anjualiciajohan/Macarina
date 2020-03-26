<?php 
//session_start();
include_once "header.php";

if(!isset($_SESSION['user_login'])){
	header('location: login.php');
}
$user_id=$_SESSION['id'];
$trans = "SELECT * FROM transaksi where id_reseller = '$user_id' ORDER BY kd_transaksi DESC LIMIT 1";
$Qtrans = mysqli_query($koneksi,$trans);
$bank = "SELECT * FROM bank ";
$Qbank = mysqli_query($koneksi,$bank);
$al = "SELECT * FROM alamat_kirim INNER JOIN kab JOIN kec JOIN kel ON alamat_kirim.kd_kab=kab.kd_kab 
AND alamat_kirim.sys_code=kec.sys_code AND alamat_kirim.kd_kel=kel.kd_kel WHERE id_reseller = '$user_id'ORDER BY kd_al_kirim DESC LIMIT 1";
$Qal = mysqli_query($koneksi,$al);
$user_products_query="select detail_transaksi.id_detail,barang.kd_barang,barang.nama_barang,barang.deskripsi,
barang.harga,barang.gambar_brg,detail_transaksi.qty_det from detail_transaksi inner join 
barang on barang.kd_barang=detail_transaksi.kd_barang where detail_transaksi.id_reseller='$user_id' 
and detail_transaksi.status='Pending'";
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
            <h1 class="mb-0 bread">CHECKOUT</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
			<form method="GET" action="co_pem.php">
			
			<div class="row">
				<div class="col-md-12 ftco-animate">
				<?php 
					
					while ($codeAl = mysqli_fetch_array($Qal)){
						$kdall =$codeAl['kd_al_kirim'];
						$prov = $codeAl['provinsi'];
						$kab = $codeAl['kab_kota'];
						$kec = $codeAl['kecamatan'];
						$kel = $codeAl['kelurahan'];
						$kdpos = $codeAl['kode_pos'];
						$cepat = $codeAl['cepat'];
						$lama = $codeAl['lama'];
						$alLengkap =$codeAl['alamat_lengkap'];
/*
						$provdrop = $codeAl['provinsi'];
						$kabdrop = $codeAl['kab_kota'];
						$kecdrop = $codeAl['kecamatan'];
						$keldrop = $codeAl['kelurahan'];
						$kdposdrop = $codeAl['kode_pos'];
						$cepatdrop = $codeAl['cepat'];
						$lamadrop = $codeAl['lama'];
						$alLengkapdrop =$codeAl['alamat_lengkap_drop'];
**/
						?>
						<input type ="text" name ="kdALL" id ="kdALL" value="<?php echo $kdall;?>" hidden>
						<span><label >Alamat Saya :</label></span></br>
						<span><label ><?php echo $alLengkap .', '.$prov .', '. $kab .', '.$kec.', '.$kel.', '.$kdpos;?></label></span></br>
						<span><label >Lama Kirim : <?php echo $cepat;?> - <?php echo $lama;?> hari</br>
						</label></span>
						<!-- drop 
						<span><label >Alamat Dropshipper :</label></span></br>
						<span><label ><?php //echo $alLengkapdrop .', '.$provdrop .', '. $kabdrop .', '.$kecdrop.', '.$keldrop.', '.$kdposdrop;?></label></span></br>
						<span><label >Lama Kirim : <?php //echo $cepatdrop;?> - <?php //echo $lamadrop;?> hari</br>
						</label></span> -->
					<?php }?>
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
    					<h3>Total Keranjang</h3>
    					<p class="d-flex">
							<span>Total</span>
							<?php 
					
					while ($code = mysqli_fetch_assoc($Qtrans)){
						//$code21 = mysqli_fetch_assoc($Qal);
						$kodeT=$code['kd_transaksi'];
						$grandtotal = $code['grand_total'];
						//$idAll =$code21['kd_al_kirim'];
						?>
							<span><label >Rp. <?php echo $grandtotal;?></label>
						 <input type ="hidden" name="grandtotal" id="grandtotal" value="<?php echo $grandtotal;?>">
						 <input type ="hidden" name="kdtr" id="kdtr" value="<?php echo $kodeT;?>">
						</span>
    					</p></br>
    					
					</div>
					<?php
						echo '<p><a href="trans_cancel.php?id='.$kodeT.'" class="btn btn-primary py-3 px-5">Batal</a>';
					}
					?>
					<input type="submit" name ="subPem" id ="subPem" value="Lanjut"class="btn btn-primary py-3 px-5">
					
				</div>
				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<h4>Checkout Pembayaran</h4>
					<p>Masukkan Bukti Transfer Berikut</p>
				<div class="form-group">
					<label>Bank Tujuan</label>
					<select class="form-control" name="bank_tujuan" id="bank_tujuan">
					<option value=""> Pilih Bank</option>
						<?php while ($bbank = mysqli_fetch_assoc($Qbank)){
							$idb= $bbank['id_bank'];
							$nmbank = $bbank['nama_bank'];
							$nmrek = $bbank['nama_rek'];
							$norekbank = $bbank['no_rek'];
								?><option value="<?php echo $idb;?>"><?php echo $nmbank.'-'.$nmrek.'-'. $norekbank;?></option>	

						<?php }?>
						
					</select>
				</div>
				
				<div class="form-group">
					<label>Bukti Bayar</label>
					<input type="file" required name="buktiByr" id="buktiByr" >
				</div>	
				</div>
				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="form-group">
					<label>Nama Rekening Pengirim</label>
					<input required class="form-control text-left px-12" type="text" id="namarekres" name="namarekres">
				</div>
				<div class="form-group">
					<label>No Rekening Pengirim</label>
					<input required class="form-control text-left px-12" type="text" id="norekres" name="norekres">
				</div>
    			</div>
			</div>
			</form>
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