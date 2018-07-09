<?php
// Variabel $_POST
// ===============

$admin = (isset($_POST['id_admin']) ? $_POST['id_admin'] : "");
$aw = (isset($_POST['aw']) ? $_POST['aw'] : "");
$captcha = (isset($_POST['captcha']) ? $_POST['captcha'] : "");
$deskripsi = (isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "");
$dokumen = (isset($_POST['dokumen']) ? $_POST['dokumen'] : "");
$email = (isset($_POST['email']) ? $_POST['email'] : "");
$gambar = (isset($_POST['gambar']) ? $_POST['gambar'] : "");
$harga = (isset($_POST['harga']) ? $_POST['harga'] : "");
$jarak = (isset($_POST['jarak']) ? $_POST['jarak'] : "");
$jenis_kemasan = (isset($_POST['jenis_kemasan']) ? $_POST['jenis_kemasan'] : "");
$kadaluarsa = (isset($_POST['kadaluarsa']) ? $_POST['kadaluarsa'] : "");
$kategori = (isset($_POST['kategori']) ? $_POST['kategori'] : "");
$kelamin = (isset($_POST['kelamin']) ? $_POST['kelamin'] : "");
$kode = (isset($_POST['kode']) ? $_POST['kode'] : "");
$isi_komentar = (isset($_POST['isi_komentar']) ? $_POST['isi_komentar'] : "");
$kontak = (isset($_POST['kontak']) ? $_POST['kontak'] : "");
$lapisan = (isset($_POST['lapisan']) ? $_POST['lapisan'] : "");
$level = (isset($_POST['level']) ? $_POST['level'] : "");
$merk = (isset($_POST['merk']) ? $_POST['merk'] : "");
$nama = (isset($_POST['nama']) ? $_POST['nama'] : "");
$nama_bahan = (isset($_POST['nama_bahan']) ? $_POST['nama_bahan'] : "");
$password = (isset($_POST['password']) ? $_POST['password'] : "");
$pengawet = (isset($_POST['pengawet']) ? $_POST['pengawet'] : "");
$proses = (isset($_POST['proses']) ? $_POST['proses'] : "");
$ph = (isset($_POST['ph']) ? $_POST['ph'] : "");
$produk = (isset($_POST['produk']) ? $_POST['produk'] : "");
$sbt = (isset($_POST['sbt']) ? $_POST['sbt'] : "");
$status = (isset($_POST['status']) ? $_POST['status'] : "");
$sumber_bahan = (isset($_POST['sumber_bahan']) ? $_POST['sumber_bahan'] : "");
$info_sertifikasi = (isset($_POST['info_sertifikasi']) ? $_POST['info_sertifikasi'] : "");
$judul_sertifikasi = (isset($_POST['judul_sertifikasi']) ? $_POST['judul_sertifikasi'] : "");
$teknik_kemasan = (isset($_POST['teknik_kemasan']) ? $_POST['teknik_kemasan'] : "");
$telepon = (isset($_POST['telepon']) ? $_POST['telepon'] : "");
$tgl_create = date('d-m-Y');
$titik_kritis = (isset($_POST['titik_kritis']) ? $_POST['titik_kritis'] : "");
$ukuran = (isset($_POST['ukuran']) ? $_POST['ukuran'] : "");
$username = (isset($_POST['username']) ? $_POST['username'] : "");

// Variabel $_GET
// ==============
$id_dokumen = (isset($_GET['id_dokumen']) ? $_GET['id_dokumen'] : "");
$angka = (isset($_GET['angka']) ? $_GET['angka'] : "");
$id_aw = (isset($_GET['id_aw']) ? $_GET['id_aw'] : "");
$id_jarak = (isset($_GET['id_jarak']) ? $_GET['id_jarak'] : "");
$id_kadaluarsa = (isset($_GET['id_kadaluarsa']) ? $_GET['id_kadaluarsa'] : "");
$id_komentar = (isset($_GET['id_komentar']) ? $_GET['id_komentar'] : "");
$id_parameter = (isset($_GET['id_parameter']) ? $_GET['id_parameter'] : "");
$id_parameter_user = (isset($_GET['id_parameter_user']) ? $_GET['id_parameter_user'] : "");
$id_pengawet = (isset($_GET['id_pengawet']) ? $_GET['id_pengawet'] : "");
$id_admin = (isset($_GET['id_admin']) ? $_GET['id_admin'] : "");
$id_pengguna = (isset($_GET['id_pengguna']) ? $_GET['id_pengguna'] : "");
$id_ph = (isset($_GET['id_ph']) ? $_GET['id_ph'] : "");
$id_bahan = (isset($_GET['id_bahan']) ? $_GET['id_bahan'] : "");
$id_rinci_kemasan = (isset($_GET['id_rinci_kemasan']) ? $_GET['id_rinci_kemasan'] : "");
$id_suhu = (isset($_GET['id_suhu']) ? $_GET['id_suhu'] : "");
$kondisi = (isset($_GET['kondisi']) ? $_GET['kondisi'] : "");
$id_riwayat = (isset($_GET['id_riwayat']) ? $_GET['id_riwayat'] : "");
$id_sertifikasi = (isset($_GET['id_sertifikasi']) ? $_GET['id_sertifikasi'] : "");
?>