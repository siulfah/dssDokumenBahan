<?php
	// session_start();
	$username = isset($_SESSION['username'])?$_SESSION['username']:"";

	include('app/config.php');
	$query = mysql_query("SELECT * FROM pengguna WHERE username='$username'");
	$cetak = mysql_fetch_array($query);

	if($cetak['level']=="Administrator"){
?>
	<div class="col-md-12 testimonials-grid">
		<h3 class="title" align="center" style="padding: 10px;">Selamat Datang di Halaman Admin</h3>
		<br>
		<span>
			Selamat datang di Halaman Admin Sistem Pendukung Keputusan (SPK) Penentu Dokumen Pendukung Bahan. Sistem ini digunakan untuk membantu pengguna menentukan dokumen pendukung bahan dari bahan-bahan yang digunakan selama proses produksi produknya. Hasil informasi dokumen pendukung bahan dari SPK ini dapat membantu pengguna dalam proses persiapan pengajuan sertifikasi halal. Data pada sistem ini telah terverifikasi oleh :
		</span><br>
		<div class="clearfix"> </div>
			<div class="container" style="padding: 10px;">
				<div class="additional-service-grid" style="padding: 10px;">
						<div class="col-md-6 additional-service-grd" align="center">
							<img src="images/ipb.jpg" alt=" " class="img-responsive" />
							<p>INSTITUT PERTANIAN BOGOR</p>
						</div>
						<div class="col-md-4 additional-service-grd" align="center">
							<img src="images/mui.png" alt=" " class="img-responsive" />
							<p>MAJELIS ULAMA INDONESIA</p>
						</div>
					</div>
			</div>
	</div>
	<div class="clearfix"> </div>

<!--Pengguna website-->
<?php }else{ ?>

	<div class="col-md-12 testimonials-grid">
		<h3 class="title" align="center" style="padding: 10px;">Disclaimer</h3>
		<br>
		<span>
			Selamat Datang di Sistem Pendukung Keputusan Penentu Dokumen Pendukung Bahan. Sistem ini hanya memberikan informasi mengenai bahan dan dokumen pendukung bahan yang dibutuhkan dalam pengajuan sertifikasi halal.</p>
	</span><br>
		<div class="clearfix"> </div>
			<div class="container" style="padding: 10px;">
				
			</div>
	</div>
	<div class="clearfix"> </div>

<?php } ?>