<?php
$sid = "";
if (isset($_GET["sid"])) {
    $sid=trim($_GET["sid"]);
}

session_id($sid);
session_start();

$angka = "";
if (isset( $_SESSION["angka"]))
    $angka = $_SESSION["angka"];

mt_srand((double)microtime()*1000000);
$jarak1 = mt_rand(0,10);
$jarak2 = mt_rand(0,10);
$jarak3 = mt_rand(0,10);
$jarak4 = mt_rand(0,10);
$ujung1 = mt_rand(0,60);
$ujung2 = mt_rand(0,60);
$ujung3 = mt_rand(0,60);
$ujung4 = mt_rand(0,60);
$ujung5 = mt_rand(0,60);
$ujung6 = mt_rand(0,60);
$ujung7 = mt_rand(0,60);
$ujung8 = mt_rand(0,60);
$warna1 = mt_rand(0,150);
$warna2 = mt_rand(0,150);
$warna3 = mt_rand(0,150);
$warna4 = mt_rand(0,150);
$warna5 = mt_rand(0,150);
$warna6 = mt_rand(0,150);
$height = 13; 
$width = 62; 
$im = imagecreate($width, $height); 
$background = imagecolorallocate($im, 255,255,255); 
$warnagaris = imagecolorallocate($im, $warna1, $warna2, $warna3); 
$warnaangka = imagecolorallocate($im, $warna4, $warna5, $warna6); 
imagefill($im, 0, 0, $background); 
imageline($im, 0, $jarak1, $ujung1, $ujung2, $warnagaris); 
imageline($im, 0, $jarak2, $ujung3, $ujung4, $warnagaris); 
imageline($im, 60, $jarak3, $ujung5, $ujung6, $warnagaris); 
imageline($im, 60, $jarak4, $ujung7, $ujung8, $warnagaris); 
imagestring ($im, 6, 10, 0,  $angka, $warnaangka);
imagejpeg($im); 
?>