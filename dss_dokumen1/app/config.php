<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbas = "dokumenbahan";

$koneksi = mysql_connect($host,$user,$pass) or die("Koneksi kedatabase gagal...!".mysql_error()); 
$pilihdb = mysql_select_db($dbas) or die("Tidak dapat memilih database...!".mysql_error());

?>