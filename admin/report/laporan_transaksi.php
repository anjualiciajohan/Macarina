<?php
include "../config/config.php";
?>
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
   
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
           
              <h6 class="m-0 font-weight-bold text-primary">Cari berdasarkan tanggal transaksi : <input type="date" name="tanggal" data-date="" data-date-format="DD MMMM YYYY"></h6>
              
            </div>
            <div class="card-body">
            <?php 
            include "../config/config.php";
          ?>  
            <form method ="POST" action="FtamBarang.php" enctype="multipart/form-data">
                <table border="1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Kode Transaksi</td>
                            <td>Tanggal</td>
                            <td>Grand Total</td>
                            <td>Kode Admin</td>
                            <td>Status</td>
                        </tr>        
                    </thead>

                    <?php
                     
                     $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail_transaksi");
            
                    while ($data = mysqli_fetch_array($query)){

                  ?>

                    <tbody>
                        <tr>
                            <td><?php echo $data ['kd_transaksi']; ?></td>
                            <td><?php echo $data ['tgl_transaksi']; ?></td>
                            <td><?php echo $data ['grand_total']; ?></td>
                            <td><?php echo $data ['kd_admin']; ?></td>
                            <td><?php echo $data ['status']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                     }
                    ?>
                </table>
            </form>
            
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

  <script>
	$('.datepicker').datepicker({
		dateFormat: 'yyyy-mm-dd',
	})
	</script>
  

</body>

</html>