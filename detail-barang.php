<?php
require "config.php";
$id = $_GET['Id'];
$query = mysqli_query($koneksi,"SELECT * FROM barang WHERE kd_barang='$id'");
$data = mysqli_fetch_array($query);

?>
<link rel="stylesheet" href="css/style.css">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $data['nama_barang']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $data['deskripsi'] ?></p>
      </div>
      <div class="modal-footer">
        <a href="shop2.php" type="button" class="btn btn-secondary" id="close">Close</a>
        </div>
    </div>

<script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#detail").modal("show");

    });


    </script>