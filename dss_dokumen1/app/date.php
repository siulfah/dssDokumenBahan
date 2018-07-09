<?php
//       Penanggalan dan waktu
// ==================================
$hri = array("Monday" => "Senin", 
			 "Tuesday" => "Selasa", 
			 "Wednesday" => "Rabu", 
			 "Thursday" => "Kamis", 
			 "Friday" => "Jumat", 
			 "Saturday" => "Sabtu", 
			 "Sunday" => "Minggu");
$bln = array("January" => "Januari", 
			 "February" => "Februari", 
			 "March" => "Maret", 
			 "April" => "April", 
			 "May" => "Mei", 
			 "June" => "Juni", 
			 "July" => "Juli", 
			 "August" => "Agustus", 
			 "September" => "September", 
			 "October" => "Oktober", 
			 "November" => "November", 
			 "December" => "Desember");

$ambil_waktu = getdate();
$hari_f = $ambil_waktu['weekday'];
$hari = $hri[$hari_f];
$tanggal = $ambil_waktu['mday'];
$bulan_f = $ambil_waktu['month'];
$bulan = $bln[$bulan_f];
$tahun = $ambil_waktu['year'];
$jam = $ambil_waktu['hours'];
$menit = $ambil_waktu['minutes'];
$detik = $ambil_waktu['seconds'];
$penanggalan = "$hari, $tanggal $bulan $tahun";
$log = "$hari, $tanggal $bulan $tahun, $jam:$menit:$detik";

?>