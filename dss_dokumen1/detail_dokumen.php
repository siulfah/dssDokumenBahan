<!-- blog -->
	
		<div class="col-md-12 blog-left">
		<?php
          include('app/config.php');
          $id_dokumen = $_GET['id_dokumen'];
          $query = mysql_query("SELECT * FROM dokumen_pendukung WHERE id_dokumen='$id_dokumen'");
          $cetak = mysql_fetch_array($query);
        ?>
				<ul align="center">
					<li><h4 align="center"><?=$cetak['dokumen'];?></h4></li>
				</ul>
			<p align="justify" style="margin-top: 20px;"><?=$cetak['deskripsi'];?></p/>
			<div class="col-md-12" align="center">
				<?php 
					if(empty($cetak['gambar'])){ echo "<img src='images/no-image2.gif'>"; }else{ ?>
                	<a href="images/<?=$cetak['gambar'];?>" target="_blank">
                    <img src="images/<?=$cetak['gambar'];?>" title="Klik untuk melihat gambar dalam ukuran asli..."></a>
                <?php } ?>
			</div>
				
		</div>
	
<!-- //blog -->