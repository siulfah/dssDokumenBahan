<div class="col-md-12 ">

	<?php 
		include_once "app/config.php";

		$data = mysql_query("	SELECT * FROM dokumen_pendukung ORDER BY dokumen ASC;") or die ("query error");

		$dok = array();
		while($hasil = mysql_fetch_assoc($data)){
			$dok[] = $hasil;
		}

	?>
	<?php foreach ($dok as $key => $value):?>
	<div class="col-md-7 blog-left">
		<div class="blog-left-grid">
			<h4><?php echo $value['dokumen'];?></h4>
			<!-- <ul>
				<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"><?php echo $value['log']?></span></li>
			</ul> -->
			<a href="single.php"><img src="<?php echo $value['gambar']?>" alt=" " class="img-responsive" /></a>
			<p align="justify"><?php echo $sekilasinfo = $value['deskripsi'];?></p>
		</div>
		<div class=clearfix></div>
		<!--<div class="blog-left-grid">
			<h4><?php/* echo $hasil['judul_sh'];*/?></h4>
			 <span>Diposting pada tanggal <?php /*echo $tanggal." ".$bulan." ".$tahun; */?> oleh Admin</span>
			 <br>
		</div>-->

	</div>
	<?php endforeach;?>

	<div class="col-md-2 blog-left">
	</div>

	<div class="col-md-3 blog-right">
		<div class="blog-right1">
			<div class="categories">
				<h3>Informasi Terbaru</h3>
				<ul>
					<li><a href="#">Aliquam dapibus tincidunt</a></li>
					<li><a href="#">Donec sollicitudin molestie</a></li>
					<li><a href="#">Fusce feugiat malesuada odio</a></li>
					<li><a href="#">Cum sociis natoque penatibus</a></li>
					<li><a href="#">Magnis dis parturient montes</a></li>
					<li><a href="#">Donec sollicitudin molestie</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php
   include('app/config.php');
   $id_dokumen=$_GET['id'];
   $query=mysql_query("SELECT * FROM dokumen_pendukung WHERE id_dokumen='$id_dokumen' ORDER BY id_dokumen DESC");
   $hasil=mysql_fetch_array($query);
?>
<div class="container">
	<h3 align="Center">Jenis Dokumen Pendukung Bahan</h3>
	
		<div class="col-md-12 blog-left">
				<div class="blog-grid">
				 
					<ul align="center">
						<li><?=$cetak_jenis['dokumen'];?></li>
					</ul>

					<a href="index.php?page=lihat_dokumen">
					<?php 
						if(empty($cetak_jenis['gambar'])){ echo "<img src='images/no-image2.gif'>"; }
						else{ ?>
	                	<img src="images/<?=$cetak_jenis['gambar'];?>" alt="<?=$cetak_jenis['dokumen'];?>" width="400" height="255">
	                <?php } ?>
	                </a>
					<p><?=$cetak_jenis['deskripsi'];?></p>
				</div>
			</div>
			<div class="clearfix"> </div>
	
			</div>
	</div>		
			
