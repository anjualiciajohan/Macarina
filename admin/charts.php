<?php
define('BASEPATH', dirname(__FILE__));
//include_once('../config/head.php'); 
include_once "head.php";

$koneksi    = mysqli_connect("localhost", "root", "", "macarina");
$penjualan  = mysqli_query($koneksi, "SELECT stok FROM barang");
$merk       = mysqli_query($koneksi, "SELECT nama_barang FROM barang");
?>
<?php
include_once "topNavbar.php";

?>
  <!-- Page Wrapper -->
  <div id="wrapper">

 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Macarina</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="home.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
  Data
</div>


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
    <i class="fas fa-fw fa-cog"></i>
    <span>Table</span>
  </a>
  <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Data :</h6>
      <a class="collapse-item" href="admin/tAdmin.php">Admin</a>
      <a class="collapse-item" href="reseller/tReseller.php">Reseller</a>
      <a class="collapse-item" href="barang/tBarang.php">Barang</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Laporan</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Report:</h6>
      <a class="collapse-item" href="report/laporan_transaksi.php">Laporan Transaksi</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

<thead>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran Pie Chart</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 30%;
                margin: 15px auto;
            }
    </style>
  </thead>
  <tbody>

    <div class="container">
        <h2 align="center">GRAFIK BARANG</h2>
        <canvas id="piechart" width="50" height="50"></canvas>
    </div>

  </tbody>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($merk)) { echo '"' . $p['nama_barang'] . '",';}?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($penjualan)) { echo '"' . $p['stok'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193',
                '#ff0000',
                '#f2f542',
                '#51f542'
              ]
            }
            ]
            };

  var myPieChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: {
                    responsive: true
                }
              });

</script>
</div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

 <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>  
</body>

</html>
