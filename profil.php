<?php 
require "config.php";
include_once "header.php";
?>

  <div class="container">
    <h1>PROFIL</h1>
    <hr>
    <form method ="POST" action="php/pdaftar.php" enctype="multipart/form-data">
          <!--<a href="#" class="img-prod"><img class="img-fluid" <?php echo "src='admin/img/reseller/foto/".$data['pas_foto']."'" ?> alt="Colorlib Template">
    			<div class="overlay"></div>
    			</a>-->
          
          <h1>FOTO</h1>

          <label for="no-ktp"><b>No KTP</b></label></br>
          <input type="text" name="nama" disabled></br>

          <label for="nama-lengkap"><b>Nama</b></label></br>
          <input type="text" name="nama" disabled></br>

          <label for="email"><b>Email</b></label></br>
          <input type="text" name="nama" disabled></br>

          <label for="email"><b>Alamat</b></label></br>
          <input type="text" name="alamat" disabled></br>
          
          <label for="no-hp"><b>Nomor HP</b></label></br>
          <input type="text" name="no-hp" disabled></br>

          <label for="kbupaten-kota"><b>Kabupaten/Kota</b></label></br>
          <input type="text" name="no-hp" disabled></br>
          
          <label for="kecamatan"><b>Kecamatan</b></label></br>
          <input type="text" name="no-hp" disabled></br>
          

          <input type="submit" name ="submit" class="registerbtn" value="Kembali ke Beranda" href="index.php"></input>

          <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          </div>
    </form>

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