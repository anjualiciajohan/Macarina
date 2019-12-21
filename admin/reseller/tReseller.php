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
include "../config/side.php";
?>
   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Reseller</h1>
          <p class="mb-4">Info akun Reseller</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Reseller</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
             
              <form method ="POST" action="detReseller.php" >
             
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Reseller</th>
                      <th>Foto</th>
                      <th>No KTP</th>
                      <th>Nama Reseller</th>
                      <th>No Telepon</th>
                      <th>Scan KTP</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Kode Reseller</th>
                      <th>Foto</th>
                      <th>No KTP</th>
                      <th>Nama Reseller</th>
                      <th>No Telepon</th>
                      <th>Scan KTP</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </tfoot>

                  <!-- FUngsi PHP  -->
                  <?php
                    
                    $query = mysqli_query($koneksi,"SELECT * FROM reseller");
            
                    while ($data = mysqli_fetch_array($query)){
            
                ?>
                <tbody>
                    <tr>
                      <td><?php echo $data ['id_reseller'] ?></td>
                      <td><?php echo "<img src='../img/reseller/foto/".$data['pas_foto']."' width='100px' height='100px'/>"?></td>
                      <td><?php echo $data ['no_ktp']; ?></td>
                      <td><?php echo $data ['nama_reseller']; ?></td>
                      <td><?php echo $data ['no_tlp']; ?></td>
                      <td><?php echo "<img src='../img/reseller/".$data['scan_ktp']."' width='100px' height='100px'/>"?></td>
                      <td><?php
                          $status = $data['status'];
                          
                         if ($status == "0"){
                          ?>NonAktif
                         
                        <?php   }
                        else if ($status == "1") {
                           ?>Aktif
                        <?php  }
                        ?>
                          
                    </td>
                      
                      
                      <td><a class="detail" href="detailReseller.php?txt_idrsl=<?php echo $data['id_reseller']; ?>">Detail</a>
                      <a class="ubah" href="detReseller.php?txt_idrsl=<?php echo $data['id_reseller']; ?>">Edit</a>
                      <a class="hapus" href="delReseller.php?txt_idrsl=<?php echo $data['id_reseller']; ?>">Hapus</a>
                    </td>
                      
                    </tr>
                   
                  </tbody>
                
            <?php } ?>
                  
                </table>
                
              </form>
              </div>
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
          <a class="btn btn-primary" href="../login.php">Logout</a>
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
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
