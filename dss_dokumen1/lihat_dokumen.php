<div class="container">
	<h3 align="Center">Jenis Dokumen Pendukung Bahan</h3>
	<div class="featured-services-grids">
		<?php
          include('app/config.php');
          $batas=30; 
		  
		  $noPage="";
		  if (isset($_GET['hlmn'])) {
				$noPage=$_GET['hlmn'];
		  }
          
          $posisi= null;
          if(empty($noPage)){
			$posisi=0;
        	$noPage=1;
          }else{
              $posisi=($noPage-1) * $batas;
          }
          
          // Nomor urut
          $no = $noPage + ($noPage - 1) * ($batas - 1);
          
          $query = mysql_query("SELECT * FROM dokumen_pendukung ORDER BY id_dokumen DESC LIMIT $posisi,$batas");
          while($cetak = mysql_fetch_array($query)){
        ?>
		<div class="col-md-4 featured-services-grid">
			<div class="featured-services-grd">
				<!--<span class="glyphicon glyphicon-file" aria-hidden="true"></span>-->
				
				<h4><?=$cetak['dokumen'];?></h4>
				<p><?php
                  $kalimat = $cetak['deskripsi'];
                  $sub_kalimat = substr($kalimat,0,100);
                  echo $sub_kalimat;
                ?></p>
				<div class="more">
				<a class="hvr-curl-bottom-right" href="index.php?page=detail_dokumen&id_dokumen=<?=$cetak['id_dokumen'];?>"target="_blank">Baca Selanjutnya</a>
			</div>


			</div>
			<div class="clearfix"> </div>
		</div>
		<?php
			}
		?>				
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>