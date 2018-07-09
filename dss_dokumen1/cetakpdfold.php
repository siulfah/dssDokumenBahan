<?php
include('app/config.php');
require('fpdf/fpdf.php');
/**
 Judul  : Laporan PDF (portait):
 Level  : Menengah
 Author : Hakko Bio Richard
 Blog   : www.hakkoblogs.com
 Web    : www.niqoweb.com
 Email  : hakkobiorichard@ygmail.com
 
 Untuk tutorial yang lainnya silahkan berkunjung ke www.hakkoblogs.com
 
 Butuh jasa pembuatan website, aplikasi, pembuatan program TA dan Skripsi.? Hubungi NiqoWeb ==>> 085694984803
 
 **/
//Menampilkan data dari tabel di database

$result=mysql_query("SELECT id_riwayat,nama,email,bahan, dokumen, log FROM riwayat_pemilihan_dokumen ORDER BY nama ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_idriwayat = "";
$column_nama = "";
$column_email = "";
$column_bahan = "";
$column_sbb = "";
$column_sbt = "";
$column_tk = "";
$column_dokumen = "";
$column_log = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $id_riwayat = $row["id_riwayat"];
    $nama = $row["nama"];
    $email = $row["email"];
    $bahan = $row["bahan"];
    $dokumen = $row["dokumen"];
    $log = $row["log"];
    
	$column_idriwayat = $column_idriwayat.$id_riwayat."\n";
	$column_nama = $column_nama.$nama."\n";
	$column_email = $column_email.$email."\n";
	$column_bahan = $column_bahan.$bahan."\n";
	$column_dokumen = $column_dokumen.$dokumen."\n";
	$column_log = $column_log.$log."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Dokumen Pendukung Bahan',0,0,'C');
$pdf->Ln();


}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(15,8,'No.',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(25,8,'E-mail',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(25,8,'Bahan',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(50,8,'Dokumen',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(35,8,'Waktu Pemilihan',1,0,'C',1);
$pdf->Ln();


//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(15,6,$column_idriwayat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(25,6,$column_email,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(25,6,$column_bahan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(50,6,$column_dokumen,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(35,6,$column_log,1,'C');

$pdf->Output();
?>