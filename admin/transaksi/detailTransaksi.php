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

session_start();
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
          <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
            <?php 
            include "../config/config.php";
            $id = $_GET['txt_idtr'];
            
            $query_mysql = mysqli_query($koneksi,"SELECT pembayaran.*,transaksi.kd_transaksi,transaksi.tgl_transaksi,transaksi.grand_total,reseller.nama_reseller
            from pembayaran inner join transaksi join reseller on pembayaran.kd_transaksi=transaksi.kd_transaksi and transaksi.id_reseller=reseller.id_reseller
            where transaksi.kd_transaksi= $id");
            //$data = mysqli_fetch_array($query_mysql);
            while($data = mysqli_fetch_array($query_mysql)){
              
          ?>  
            <form method ="POST" action="aktifReseller.php">
              <table>
                <tr>
                <td>
                <table border="0" class="table table-striped table-bordered table-hover">
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>:</td>
                        <td><label><?php echo $data['kd_transaksi'] ?><input type="hidden" name="txt_idtr" value="<?php echo $data['kd_transaksi'] ?>"></td>
                    </tr>
                    <tr>
                        <td>ID Pembayaran</td>
                        <td>:</td>
                        <td><input disabled type="text" name="txt_id_pembayaran" value="<?php echo $data['id_pembayaran'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Reseller</td>
                        <td>:</td>
                        <td><input disabled type="text" name="txt_nama" value="<?php echo $data['nama_reseller'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pesan</td>
                        <td>:</td>
                        <td><input disabled type="textarea" name="txt_tgl_transaksi" value="<?php echo $data['tgl_transaksi'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Tanggal Bayar</td>
                        <td>:</td>
                        <td><input disabled type="textarea" name="txt_tgl_bayar" value="<?php echo $data['tgl_bayar'] ?>"> </td>
                    </tr>
                    <!--<tr>
                        <td>Bukti Bayar</td>
                        <td>:</td>
                        <td><?php //echo "<img src='#".$data['scan_ktp']."' width='200px' height='100px'/>" ?></td>
                    </tr>-->
                    <tr>
                        <td>Nama Rekening</td>
                        <td>:</td>
                        <td><input disabled type="text" name="txt_email" value="<?php echo $data['nama_rek_res'] ?>" ></td>
                    </tr>
                    <tr>
                        <td>No Rekening</td>
                        <td>:</td>
                        <td><input disabled type="text" name="txt_pwd" value="<?php echo $data['no_rek_res'] ?>" ></td>
                    </tr>
                    <?php
                    $status = $data['status_pesan'];
                    ?>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><label><?php 
                         if ($status == 0){
                          ?>Pending
                         
                        <?php   }
                        else if ($status == 1) {
                           ?>Selesai
                        <?php  }
                        ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                        <td> <?php 
                         if ($status == 0){
                          ?><input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit" name="aktifkan" value="Selesai"/>
                         
                        <?php   }
                        else if ($status == 1) {
                           ?> <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit" name="nonaktif" value="Pending"/>
                        <?php  }
                        ?>
                        
                        
                    </tr>
                </table>

                </td>
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
