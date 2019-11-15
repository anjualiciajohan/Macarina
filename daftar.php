<?php 
include_once "header.php";
?>
    <form action="action_page.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="nama-lengkap"><b>Nama Lengkap</b></label></br>
    <input type="text" placeholder="Enter Nama Lengkap" name="nama-lengkap" required>
    </br>
    <label for="alamat"><b>Alamat</b></label></br>
    <input type="text" placeholder="Enter Alamat" name="alamat" required>
    </br>
    <label for="email"><b>Email</b></label></br>
    <input type="text" placeholder="Enter Email" name="email" required>
    </br>
    <label for="psw"><b>Password</b></label></br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    </br>
    <label for="psw-repeat"><b>Repeat Password</b></label></br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    </br>
    <label for="no-ktp"><b>No KTP</b></label></br>
    <input type="text" placeholder="Enter No KTP" name="no-ktp" required>
    </br>
    <label for="no-hp"><b>Nomor HP</b></label></br>
    <input type="text" placeholder="Enter Nomor HP" name="no-hp" required>
    </br>
    <label for="kecamatan"><b>Pilih Kecamatan</b></label></br>
    <select type="text" placeholder="Pilih Kecamatan" name="kecamatan" required>
    <option value="none"> - </option>
    <option value="Patrang">Patrang</option>
    <option value="Jember">Jember</option>
    <option value="Bangsal Sari">Bangsal Sari</option>
    <option value="Ambulu">Ambulu</option>
    <option value="Lainnya">Lainnya</option>
</select>

    </br>
    <label for="kd-reff"><b>Kode Reff(Opsional)</b></label></br>
    <input type="text" placeholder="Enter Kode Reff" name="kd-reff" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? </br><a href="login.php" class="nav-link">Sign In</a></p>
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