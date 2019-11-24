<?php 
include_once "header.php";

?>

    
  <div class="container">
    <h1>REGISTER</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
      <form method ="POST" action="php/pdaftar.php" enctype="multipart/form-data">
    <label for="no-ktp"><b>No KTP</b></label></br>
    <input type="text" placeholder="Enter No KTP" name="no-ktp" required>
    </br>
    <label for="nama-lengkap"><b>Nama Lengkap</b></label></br>
    <input type="text" placeholder="Enter Nama (sesuai KTP)"  name="nama-lengkap" required>
    </br>
    <label for="email"><b>Email</b></label></br>
    <input type="text" placeholder="Enter Email" name="email" required>
    </br>
    <label for="no-hp"><b>Nomor HP</b></label></br>
    <input type="text" placeholder="Enter Nomor HP" name="no-hp" required>
    </br>
    <label for="psw"><b>Password</b></label></br>
    <input type="password" placeholder="Enter Password"  name="psw" required>
    </br>
    <label for="psw-repeat"><b>Repeat Password</b></label></br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    </br>
    <label for="alamat"><b>Alamat</b></label></br>
    <input type="text" placeholder="Enter Alamat" name="alamat" required>
    </br>
    <label for="kecamatan"><b>Pilih Kecamatan</b></label></br>
    <select>
      <option value>-</option>
      <option value>Ambulu</option>
      <option value>Dukumencek</option>
      <option value>Gebang</option>
      <option value>Kalisat</option>
      <option value>Kebon Agung</option>
      <option value>Patrang</option>
      <option value>Rambipuji</option>
      <option value>Sukorejo</option>
    </select>
    </br>
    <label for="scan_ktp"><b>Scan KTP</b></label></br>
    <input type="file" name="scan_ktp" required />
    <br>
    <label for="foto"><b>Pas Foto</b></label></br>
    <input type="file" name="foto" required />
    <br>
    <label for="kd-reff"><b>Kode Reff (Opsional)</b></label></br>
    <input type="text" placeholder="Enter Kode Reff" name="kd-reff">
    </br>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <input type="submit" name ="submit" class="registerbtn" value="Register"></input>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign In</a>.</p>
  </div>
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