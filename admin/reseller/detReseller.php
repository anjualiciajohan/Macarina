
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Macarina</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<?php
include_once "../topNavbar.php";
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

<?php 
include_once "../config/side.php";
?>
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Data Admin</h1>
          <p class="mb-4">Info akun Admin</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
            </div>
            <div class="card-body">
            <?php 
            include "../config/config.php";
            $id = $_GET['txt_idadm'];
            $query_mysql = mysqli_query($koneksi,"SELECT admin.* , admin.kd_admin 
            FROM admin 
              WHERE admin.kd_admin = $id");
            //$data = mysqli_fetch_array($query_mysql);
            while($data = mysqli_fetch_array($query_mysql)){
              
          ?>  
            <form method ="POST" action="editAdmin.php" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <td>Kode Admin</td>
                        <td>:</td>
                        <td><input type="hidden" name="txt_idadm" value="<?php echo $data['kd_admin'] ?>"></td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>:</td>
                        <td><input type="text" name="txt_user" value="<?php echo $data['user'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="text" name="txt_pwd" value="<?php echo $data['password'] ?>" ></td>
                    </tr>
                    <tr>
                        <td>Alamat </td>
                        <td>:</td>
                        <td><input type="text" name="txt_almt" value="<?php echo $data['alamat_admin'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Photo </td>
                        <td>:</td>
                        <td><?php echo "<img src='../img/".$data['gambar']."' width='100px' height='100px'/>" ?>
                        <input type="file" name="gambar" required />
                       </td>
                    </tr>
                    <tr>
                                              
                        <td colspan="3">Jangan lupa di simpan <input type="submit" name="btn_simpan" value="Simpan"></td>
                        
                    </tr>                   
                
                </table>
            </form>
            <?php } ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php 
      include_once "../footer.php";
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>