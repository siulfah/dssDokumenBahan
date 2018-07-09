<!-- blog -->
<div class="blog" style="margin-top:-100px;">
	<div class="container">
		<div class="col-md-7 blog-left">
			<?php
	          include('app/config.php');
	          $batas=3; 
	          $noPage=(isset($_GET['hlmn']) ? $_GET['hlmn'] : "");
	          $posisi= null;
	          if(empty($noPage)){
	            $posisi=0;
	              $noPage=1;
	          }else{
	              $posisi=($noPage-1) * $batas;
	          }
	          
	          // Nomor urut
	          $no = $noPage + ($noPage - 1) * ($batas - 1);
	          
	          $query = mysql_query("SELECT * FROM sertifikasi_halal ORDER BY id_sertifikasi DESC LIMIT $posisi,$batas");
	          while($cetak = mysql_fetch_array($query)){
	        ?>

			<div class="blog-left-grid">
				<h4><?=$cetak['judul_sertifikasi'];?></h4>
				<ul style="margin-top: 5px;">
					<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?=$cetak['log'];?>
					</li>
				</ul> 
				<?php 
					if(empty($cetak['gambar'])){ echo "<img src='images/no-image2.gif'>"; }else{ ?>
                	<a href="images/<?=$cetak['gambar'];?>" target="_blank">
                    <img src="images/<?=$cetak['gambar'];?>"  title="Klik untuk melihat gambar dalam ukuran asli..." alt=" " class="img-responsive" ></a>
                <?php } ?>
				
				<p align="justify">
					<?php
	                  $kalimat = $cetak['info_sertifikasi'];
	                  $sub_kalimat = substr($kalimat,0,200);
	                  echo $sub_kalimat;
	                ?>	
				</p>
		
				<div class="more">
				<a class="hvr-curl-bottom-right" href= "index.php?page=detail_sh&id_sertifikasi=<?=$cetak['id_sertifikasi'];?>" target="_blank">Baca Selanjutnya</a>

				</div>
				<br>

				<div class="clearfix"> </div>
			</div>
		<?php
					}
				?>
		</div>
		<div class="col-md-5 blog-right">
		<div class="blog-right1">
			<div class="categories">
				<h3><a href="http://www.halalmui.org/mui14/index.php/main/go_to_section/8/37/article/1" target="_blank" >Informasi Sertifikasi Halal Terbaru</a></h3>
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
</div>
		
<!-- //blog -->