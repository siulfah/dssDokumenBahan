<?php
session_start();

include('app/config.php');
include('app/variable.php');
include('app/date.php');

// ============ //
// Proses Login //
// ============ //
$hal = "";
if (isset($_GET['hal'])) {
	$hal = $_GET['hal'];
}

if($hal == "login")
{
	//session_register("reg_username");
	//session_register("reg_password");
	
	if(!($link=mysql_pconnect($host,$user,$pass)))
	{
		printf("%s\n",mysql_error());
		exit();
	}
	
	if(!($r=mysql_db_query("$dbas","SELECT * FROM pengguna WHERE username='$username'")))
	{
		printf("Error %d:%s\n",mysql_errno(),mysql_error());
		exit();
	}
	
	if(($row=mysql_fetch_array($r)) && ($password==$row['password']))
	{
		if(!empty($username) && !empty($password))
		{
			$reg_username=$row['username'];
			$reg_password=$row['password'];
			$_SESSION['username']=$row['username'];
			if($row['level']=="Administrator"){
				$_SESSION['level']=$row['level'];
				header("location: index.php?page=detail_pengguna_admin");
			}elseif($row['level']=="User"){
				$_SESSION['level']=$row['level'];
				header("location: index.php?page=detail_pengguna_user");
			}else{
				header("location: index.php");
			}
		}
		else
		{
			header("location: index.php");
		}
	} 
	
	else
	{
		session_unset();
		session_destroy();
		header("location: index.php");
		exit();
	}
}
// ============ End Login ============ //

// ==================== //
// PROSES ADMINISTRATOR //
// ==================== //

// Input Registrasi
// ----------------

if($_GET['hal']=="registrasi"){
	if($captcha==$HTTP_SESSION_VARS["angka"]){
		$cek_username=mysql_num_rows(mysql_query("SELECT username FROM pengguna WHERE username='$username'"));
		if($cek_username > 0){
			header("location:index.php?page=login&pesan=<font color=red>Maaf...!!! Username yang anda masukkan telah pernah digunakan, silahkan ganti dengan Username yang berbeda..!");
		}else{
			$query = mysql_query("INSERT INTO pengguna (id_pengguna, nama, alamat, username, password, email, telepon, level, log) VALUES('$id_pengguna','$nama', '$alamat', '$username', '$password', '$email', '$telepon', 'User', '$log')");
			if($query){
				header("location:index.php?page=login&pesan=<b>Registrasi berhasil...!!!</b><br><br>Selamat Anda telah terdaftar sebagai pengguna pada sistem ini. <br>Untuk membantu anda dalam menentukan kemasan produk daging, silahkan login terlebih dahulu sesuai dengan <i>username</i> dan <i>password</i> yang telah anda daftarkan tadi...!");
			}else{
				header("location:index.php?page=login&pesan=<font color=red>Maaf, Data anda tidak dapat diproses, silahkan coba lagi untuk beberapa saat..!</font>");
			}
		}
	}else{header("location:index.php?page=login&pesan=<font color=red>Maaf...!!! tidak dapat diproses, security number yang anda masukkan salah...!");}
}
//==========End Register=============//
// ---------- Input komentar--------------//
if($_GET['hal']=="input_komentar"){
$query = mysql_query("INSERT INTO komentar (id_pengguna, nama, isi_komentar, log) VALUES('$id_pengguna', '$nama', '$isi_komentar', '$log')");
	if($query){
		header("location:index.php?page=input_komentar&pesan=Terimakasih atas komentar yang anda berikan..!");
	}else{
		header("location:index.php?page=input_komentar&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

//--------------- Hapus komentar--------------//

if($_GET['hal']=="hapus_komentar"){
$query = mysql_query("DELETE FROM komentar WHERE id_komentar='$id_komentar'");
header("location:index.php?page=komentar_pengguna");
}

// ============ End komentar ============ //

// =========== Input data admin ============ //

if($_GET['hal']=="input_admin"){
$query = mysql_query("INSERT INTO pengguna (nama, username, password, email, telepon, level, log) VALUES('$nama', '$username', '$password', '$email', '$telepon', '$level', '$log')");

	if($query){
		header("location:index.php?page=input_admin&pesan=Sukses...!!! data berhasil diproses!");
	}else{
		header("location:index.php?page=input_admin&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

//--------------- Hapus data admin--------------//

if($_GET['hal']=="hapus_admin"){
$query = mysql_query("DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'");
header("location:index.php?page=admin");
}

//------------- Ubah data pengguna admin-----------//
if($_GET['hal']=="ubah_data_admin"){
$query = mysql_query("UPDATE pengguna SET  nama='$nama', username='$username', password='$password', email='$email', telepon='$telepon', level='$level', log='$log' WHERE id_pengguna='$id_pengguna'");
if($query){
	header("location:index.php?page=ubah_admin&id_pengguna=$id_pengguna&pesan=Sukses...!!! data berhasil diproses!");
}else{
	header("location:index.php?page=ubah_admin&id_pengguna=$id_pengguna&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

//------------- Ubah data pengguna -----------//
if($_GET['hal']=="ubah_pengguna"){
$query = mysql_query("UPDATE pengguna SET  nama='$nama', username='$username', password='$password', email='$email', telepon='$telepon', level='$level', log='$log' WHERE id_pengguna='$id_pengguna'");
if($query){
	header("location:index.php?page=ubah_pengguna&id_pengguna=$id_pengguna&pesan=Sukses...!!! data berhasil diproses!");
}else{
	header("location:index.php?page=ubah_pengguna&id_pengguna=$id_pengguna&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}


// =========== Input data bahan ============ //

if($_GET['hal']=="input_bahan"){
$cek_nama_bahan=mysql_num_rows(mysql_query("SELECT nama_bahan FROM bahan WHERE nama_bahan='$nama_bahan'"));
	// Kalau username sudah ada yang pakai
    if ($cek_nama_bahan > 0){
		header("location:index.php?page=input_bahan&pesan=Nama bahan sudah diinput. Silahkan coba lagi");

	}else{
		mysql_query("INSERT INTO bahan (nama_bahan, kategori, sumber_bahan, status, proses, sbt, titik_kritis, dokumen, deskripsi, gambar) VALUES('$nama_bahan', '$kategori', '$sumber_bahan', '$status', '$proses', '$sbt', '$titik_kritis','$dokumen', '$deskripsi', '$gambar')");
		header("location:index.php?page=input_bahan&pesan=Sukses...!!! data berhasil diproses!");
	}
}
//--------------- Hapus data bahan--------------//

if($_GET['hal']=="hapus_bahan"){
$query = mysql_query("DELETE FROM bahan WHERE id_bahan='$id_bahan'");
header("location:index.php?page=lihat_bahan");
}

//------------- Ubah data bahan -----------// 

if($_GET['hal']=="ubah_bahan"){
$query = mysql_query("UPDATE bahan SET nama_bahan='$nama_bahan', kategori='$kategori', sumber_bahan='$sumber_bahan', status='$status', proses='$proses', sbt='$sbt', titik_kritis='$titik_kritis', dokumen='$dokumen', deskripsi='$deskripsi', gambar='$gambar' WHERE id_bahan='$id_bahan'"); 
if($query){
	header("location:index.php?page=ubah_bahan&id_bahan=$id_bahan&pesan=Sukses...!!! data berhasil diproses!");
}else{
	header("location:index.php?page=ubah_bahan&id_bahan=$id_bahan&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

//--------------- Hapus riwayat pemilihan bahan--------------//

if($_GET['hal']=="hapus_riwayat"){
$query = mysql_query("DELETE FROM riwayat_pemilihan_dokumen WHERE id_riwayat='$id_riwayat'");
header("location:index.php?page=riwayat");
}

// =========== Input info sh ============ //

if($_GET['hal']=="input_sh"){
$query = mysql_query("INSERT INTO sertifikasi_halal (judul_sertifikasi, info_sertifikasi, gambar, log) VALUES('$judul_sertifikasi', '$info_sertifikasi', '$gambar', '$log')");

	if($query){
		header("location:index.php?page=input_sh&pesan=Sukses...!!! info berhasil diproses!");
	}else{
		header("location:index.php?page=input_sh&pesan=<font color=red>Maaf...!!! info tidak dapat diproses!</font>");
	}
}

//--------------- Hapus info sh--------------//

if($_GET['hal']=="hapus_sh"){
$query = mysql_query("DELETE FROM sertifikasi_halal WHERE id_sertifikasi='$id_sertifikasi'");
header("location:index.php?page=lihat_info_sh");
}

//------------- Ubah info sh -----------// 

if($_GET['hal']=="ubah_sh"){
$query = mysql_query("UPDATE sertifikasi_halal SET  judul_sertifikasi='$judul_sertifikasi', info_sertifikasi='$info_sertifikasi', gambar='$gambar', log='$log' WHERE id_sertifikasi='$id_sertifikasi'");
if($query){
	header("location:index.php?page=ubah_sh&id_sertifikasi=$id_sertifikasi&pesan=Sukses...!!! data berhasil diproses!");
}else{
	header("location:index.php?page=ubah_sh&id_sertifikasi=$id_sertifikasi&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

// =========== Input dokumen ============ //

if($_GET['hal']=="input_dokumen"){
$query = mysql_query("INSERT INTO dokumen_pendukung (dokumen,deskripsi, gambar) VALUES('$dokumen', '$deskripsi', '$gambar')");

	if($query){
		header("location:index.php?page=input_dokumen&pesan=Sukses...!!! data berhasil diproses!");
	}else{
		header("location:index.php?page=input_dokumen&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

//--------------- Hapus dokumen--------------//

if($_GET['hal']=="hapus_dokumen"){
$query = mysql_query("DELETE FROM dokumen_pendukung WHERE id_dokumen='$id_dokumen'");
header("location:index.php?page=lihat_list_dokumen");
}

//------------- Ubah dokumen -----------// 

if($_GET['hal']=="ubah_dokumen"){
$query = mysql_query("UPDATE dokumen_pendukung SET  dokumen='$dokumen', deskripsi='$deskripsi', gambar='$gambar'WHERE id_dokumen='$id_dokumen'");
if($query){
	header("location:index.php?page=ubah_dokumen&id_dokumen=$id_dokumen&pesan=Sukses...!!! data berhasil diproses!");
}else{
	header("location:index.php?page=ubah_dokumen&id_dokumen=$id_dokumen&pesan=<font color=red>Maaf...!!! data tidak dapat diproses!</font>");
	}
}

?>