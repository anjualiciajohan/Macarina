<?php
    
    function check_if_added_to_cart($item_id){
        //session_start();    
        require 'config.php';
        $user_id=$_SESSION['id'];
        $product_check_query="select * from detail_transaksi where kd_barang='$item_id' and id_reseller='$user_id' and status='Added to cart'";
        $product_check_result=mysqli_query($koneksi,$product_check_query) or die(mysqli_error($koneksi));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>