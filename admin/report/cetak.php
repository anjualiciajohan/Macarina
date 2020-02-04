<?php 
    require  "../config/config.php";
    
    if (isset($_POST['cetakBulan'])) {
    $tahun  = $_POST['tahun'];
    $bulan  = $_POST['bulan'];
    $namaBulan = $bulan;
    $namaBulan = date('F', mktime(0, 0, 0, $namaBulan, 10));
    
    $query = mysqli_query($koneksi, "SELECT DISTINCT transaksi.kd_transaksi, reseller.nama_reseller, transaksi.grand_total, transaksi.tgl_transaksi
                FROM reseller, transaksi
                WHERE transaksi.id_reseller = reseller.id_reseller
                AND YEAR(transaksi.tgl_transaksi) = '$tahun'
                AND MONTH(transaksi.tgl_transaksi) = '$bulan'");
    
?>  
<html>
    <head>
        <title>TRANSAKSI</title>
    </head>
        <body>
            <div align="center">
                <h1>MACARINA</h1><br>
                <div style="margin-top: -40px;">
                    <p>Jl. Sriwijaya XX No.11 Karangrejo - Jember</p>
                    <p>CV. MACARINDO BERKAH GROUP</p>
                    <p>Telp. 081 217 757 777</p>
                    <px>NPWP : 90.856.404.0-626.000</p>
                    <p>----------------------------------------------------------------------------------------------------</p>
                </div>
                <h3>LAPORAN TRANSAKSI</h3>
                <h3>PERIODE <?php echo $namaBulan.' '.$tahun; ?></h3>
            </div>

            <table border="1" align="center">
                    <thead>
                        <tr>
                        <th width=100px height=50px>KODE TRANSAKSI</th>
                        <th width=200px>TANGGAL TRANSAKSI</th>
                        <th width=200px>NAMA RESELLER</th>
                        <th width=100px>TOTAL</th>
                        </tr>
                    </thead>
                    <?php while ($data2 = mysqli_fetch_array($query)) { ?>
                    <tbody>
                        <tr>
                        <td align="center"><?php echo $data2['kd_transaksi']; ?></td>
                        <td><?php echo $data2['tgl_transaksi']; ?></td>
                        <td><?php echo $data2['nama_reseller']; ?></td>
                        <td align="right"><?php echo $data2['grand_total']; ?></td>
                        </tr>
                        <?php } 
                        $a = mysqli_query($koneksi, "SELECT SUM(transaksi.grand_total) AS TOTAL 
                        FROM transaksi
                        WHERE 
                         YEAR(transaksi.tgl_transaksi) = '$tahun'
                        AND MONTH(transaksi.tgl_transaksi) = '$bulan'");
                        $b = mysqli_fetch_array($a);
                        ?>
                        <tr>
                        <td colspan="3"><b>GRAND TOTAL</b></td>
                        <td align="right"><?php echo $b['TOTAL']; ?></td>
                        </tr>
                    </tbody>
                   
            </table>
        </body>
    </head>
</html>
<?php } ?>

<?php 
    if (isset($_POST['cetakTahun'])) {
    $tahun  = $_POST['tahun'];
    
    $query = mysqli_query($koneksi, "SELECT DISTINCT transaksi.kd_transaksi, reseller.nama_reseller, transaksi.grand_total, transaksi.tgl_transaksi
                FROM reseller, transaksi
                WHERE transaksi.id_reseller = reseller.id_reseller
                AND YEAR(transaksi.tgl_transaksi) = '$tahun'");
    
?>  
<html>
    <head>
        <title>TRANSAKSI</title>
    </head>
        <body>
            <div align="center">
                <h1>MACARINA</h1><br>
                <div style="margin-top: -40px;">
                    <p>Jl. Sriwijaya XX No.11 Karangrejo - Jember</p>
                    <p>CV. MACARINDO BERKAH GROUP</p>
                    <p>Telp. 081 217 757 777</p>
                    <px>NPWP : 90.856.404.0-626.000</p>
                    <p>----------------------------------------------------------------------------------------------------</p>
                </div>
                <h3>LAPORAN TRANSAKSI</h3>
                <h3>PERIODE <?php echo $tahun; ?></h3>
            </div>

            <table border="1" align="center">
                    <thead>
                        <tr>
                        <th width=100px height=50px>KODE TRANSAKSI</th>
                        <th width=200px>TANGGAL TRANSAKSI</th>
                        <th width=200px>NAMA RESELLER</th>
                        <th width=100px>TOTAL</th>
                        </tr>
                    </thead>
                    <?php while ($data2 = mysqli_fetch_array($query)) { ?>
                    <tbody>
                        <tr>
                        <td align="center"><?php echo $data2['kd_transaksi']; ?></td>
                        <td><?php echo $data2['tgl_transaksi']; ?></td>
                        <td><?php echo $data2['nama_reseller']; ?></td>
                        <td align="right"><?php echo $data2['grand_total']; ?></td>
                        </tr>
                        <?php } 
                        $a = mysqli_query($koneksi, "SELECT SUM(transaksi.grand_total) AS TOTAL 
                        FROM transaksi
                        WHERE 
                         YEAR(transaksi.tgl_transaksi) = '$tahun'");
                        $b = mysqli_fetch_array($a);
                        ?>
                        <tr>
                        <td colspan="3"><b>GRAND TOTAL</b></td>
                        <td align="right"><?php echo $b['TOTAL']; ?></td>
                        </tr>
                    </tbody>
                   
            </table>
        </body>
    </head>
</html>
<?php } ?>