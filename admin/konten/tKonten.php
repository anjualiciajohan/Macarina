<?php
include "../config/config.php";
session_start();
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
          <h1 class="h3 mb-2 text-gray-800">Konten</h1>
          <p class="mb-4">Info Konten</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Konten</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <a href="tamKonten.php">
              <input class="btn btn-danger mt-2"  type="submit" value="Tambah Barang"/>
              </a>

              <form method ="POST" action="detKonten.php" >
             
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Konten</th>
                      <th>Keterangan</th>
                      <th>Gambar</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID Konten</th>
                      <th>Keterangan</th>
                      <th>Gambar</th>
                      <th></th>
                    </tr>
                  </tfoot>

                  <!-- FUngsi PHP  -->
                  <?php
                    
                    $query = mysqli_query($koneksi,"SELECT * FROM konten");
            
                    while ($data = mysqli_fetch_array($query)){
            
                ?>
                <tbody>
                    <tr>
                      <td><?php echo $data ['id_konten'] ?></td>
                      <td><?php echo $data ['keterangan']; ?></td>
                      <td><?php echo "<img src='../img/konten/".$data['gambar']."' width='100px' height='100px'/>" ?></td>
                      <td><a class="edit" href="detKonten.php?txt_idktn=<?php echo $data['id_konten']; ?>">Edit</a>
                      <a class="edit" href="delKonten.php?txt_idktn=<?php echo $data['id_konten']; ?>">Hapus</a>
                      
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
