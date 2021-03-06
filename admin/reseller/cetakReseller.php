<?php
    include "../config/config.php";
    session_start();
    $Lapor = "SELECT id_reseller,nama_reseller,alamat,no_tlp,no_ktp,email,password,status FROM reseller ORDER by id_reseller asc";
    $Hasil = mysqli_query($koneksi,$Lapor);
    $Data = array();
    while($row = mysqli_fetch_assoc($Hasil)){
        array_push($Data, $row);
    }
    $Judul = "Data Reseller";
    $tgl= "Time : ".date("l, d F Y");
    $Header= array(
        array("label"=>"Kode Reseller", "length"=>35, "align"=>"L"),
        array("label"=>"Nama Reseller", "length"=>60, "align"=>"L"),
        array("label"=>"Alamat", "length"=>40, "align"=>"L"),
        array("label"=>"No Telepon", "length"=>33, "align"=>"L"),
        array("label"=>"No KTP", "length"=>33, "align"=>"L"),
        array("label"=>"Email", "length"=>33, "align"=>"L"),
        array("label"=>"Password", "length"=>33, "align"=>"L"),
        array("label"=>"Status", "length"=>33, "align"=>"L"),
    );
    require ("../fpdf16/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage('P','A4','C');
    $pdf->SetFont('arial','B','15');
    $pdf->Cell(0, 15, $Judul, '0', 1, 'C');
    $pdf->SetFont('arial','i','9');
    $pdf->Cell(0, 10, $tgl, '0', 1, 'P');
    $pdf->SetFont('arial','','12');
    $pdf->SetFillColor(255, 0, 0);
    $pdf->SetTextColor(255);
    $pdf->setDrawColor(128,0,0);
    foreach ($Header as $Kolom){
        $pdf->Cell($Kolom['length'], 8, $Kolom['label'], 1, '0', $Kolom['align'], true);
    }
    $pdf->Ln();
    $pdf->SetFillColor(244,235,255);
    $pdf->SettextColor(0);
    $pdf->SetFont('arial','','10');
    $fill =false;
    foreach ($Data as $Baris){
        $i= 0;
        foreach ($Baris as $Cell){
            $pdf->Cell ($Header[$i]['length'], 7, $Cell, 2, '0', $Kolom['align'], $fill);
            $i++;
        }
        $fill = !$fill;
        $pdf->Ln();
    }
    $pdf->Output();
?>