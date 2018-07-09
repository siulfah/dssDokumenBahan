<?php
include_once "../app/config.php";

$user = strtoupper($_POST['username']);
$pass = strtoupper($_POST['password']);

$cek = mysql_query("SELECT nama, email FROM pengguna WHERE  username = '$user' AND password = '$pass'") or die(mysql_error());

$row = mysql_num_rows($cek);
if($row == 0 ){
	header("location:../login.php?stat=0");
}else{
	session_start();
	$data = mysql_fetch_row($cek);

	$_SESSION['spkuser'] = $data[0];
	$_SESSION['spkuseremail'] = $data[1];

	header("location:../index.php");
}

?>