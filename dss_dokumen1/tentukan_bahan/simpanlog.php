<?php
include_once "../app/config.php";

$nama = ($_POST['nama']);
$email = ($_POST['email']);
$bahan = ($_POST['bahan']);
$sbb = ($_POST['sbb']);
$tambahan = ($_POST['tambahan']);
$dok = ($_POST['dok']);

$tk = "";
switch ($sbb) {
	case "NABATI" : $tk = "BAHAN PENGEKSTRAK, BAHAN ADITIF, BAHAN PENOLONG DAN BAHAN PENYALUT"; break;
	case "HEWANI" : $tk = "BAHAN PENOLONG"; break;
	case "SINTETIK KIMIA" : $tk = "BAHAN PENOLONG, BAHAN PENYALUT DAN BAHAN ADITIF"; break;
	case "PROSES MIKROBIAL" : $tk = "MEDIA FERMENTASI DAN BAHAN PENOLONG"; break;
	case "BAHAN TAMBANG" : $tk = "BAHAN PENOLONG"; break;
}


$tambahan = $tambahan=="TIDAK"?"TIDAK ADA":$tambahan;

$query = "INSERT INTO riwayat_pemilihan_dokumen (nama,email,bahan,kategori,sumber_bahan,
											bahan_tambahan,titik_kritis,dokumen,log)
					VALUES ('$nama', '$email', '$bahan', '', '$sbb', '$tambahan', '$tk', '$dok', '".date('d-m-Y H:i:s')."')";

$data = mysql_query($query) or die(mysql_error());

echo json_encode("done");

?>