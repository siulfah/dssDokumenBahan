<!-- blog -->
<div class="container">
	<div class="col-md-7 blog-left">
	
		<div class="blog-left-grid">
		<?php
          include('app/config.php');
          $id_sertifikasi = $_GET['id_sertifikasi'];
          $query = mysql_query("SELECT * FROM sertifikasi_halal WHERE id_sertifikasi='$id_sertifikasi'");
          $cetak = mysql_fetch_array($query);
        ?>
			<h4><?=$cetak['judul_sertifikasi'];?></h4>
			<ul>
				<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?=$cetak['log'];?></li>
			</ul>                

			<p align="justify"><?=$cetak['info_sertifikasi'];?></p>

			<?php 
				if(empty($cetak['gambar'])){ echo "<img src='images/no-image2.gif'>"; }else{ ?>
            	<a href="images/<?=$cetak['gambar'];?>" target="_blank">
                <img src="images/<?=$cetak['gambar'];?>" title="Klik untuk melihat gambar dalam ukuran asli..."></a>
            <?php } ?>

		</div>
		
	</div>
	<div class="col-md-5 blog-right">
		<div class="blog-right1">
			<div class="categories">
				<h3><a href="index.php?page=lihat_sh">Informasi Sertifikasi Halal Terbaru</a></h3>
				<ul>
					<?php 
						$query=mysql_query("SELECT * FROM sertifikasi_halal ORDER BY id_sertifikasi DESC LIMIT 8");
						while($cetak=mysql_fetch_array($query)){
					?>
	                    <li><a href="index.php?page=detail_sh&id_sertifikasi=<?php echo $cetak['id_sertifikasi'];?>"><?php echo $cetak['judul_sertifikasi']; ?></a></li>
	                <?php } ?>
	         
				</ul>
			</div>
		</div>
	</div>
	<div class="clearfix"> </div>
	
</div>
<!-- //blog -->