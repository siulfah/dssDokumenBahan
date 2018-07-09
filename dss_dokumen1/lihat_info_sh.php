<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Daftar Informasi Sertifikasi Halal </strong></p>
  </div>

  <div class="panel-body">
    <h4 style="padding: 10px;"><a href="index.php?page=input_sh"><p class="btn btn-warning">Tambah Info Baru</p></a></h4>
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th align="center" >Judul Info</th>
              <th align="center" width="25%">Informasi sertifikasi halal</th>
              <th align="center">Gambar</th>
              <th align="center">Tanggal</th>
              <th align="center">Proses</th>
            </tr>
          </thead>
          <tbody>

            <?php
              include('app/config.php');
              $batas=20; 
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

            <tr>
              <td>
                <a href='index.php?page=detail_info_sh&id_sertifikasi=<?=$cetak['id_sertifikasi'];?>' title='Klik untuk melihat secara detail'><?=$cetak['judul_sertifikasi'];?></a></td>
              <td><?php
                  $kalimat = $cetak['info_sertifikasi'];
                  $sub_kalimat = substr($kalimat,0,50);
                  echo $sub_kalimat;
                  // ajar PHP di Duniailkom
                ?></td>
              <td><?=$cetak['gambar'];?></td>
              <td><?=$cetak['log'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a href='index.php?page=ubah_sh&id_sertifikasi=<?=$cetak['id_sertifikasi'];?>'>
                  <img src="images/ubah2.jpg" width="15" height="15" alt="Ubah" title="Klik untuk mengubah info...!" /></a> | 
                  <a href='index.php?page=proses&hal=hapus_sh&id_sertifikasi=<?=$cetak['id_sertifikasi'];?>' 
                  onclick="return confirm('Apakah anda yakin ingin menghapus info ini...?')">
                  <img src="images/hapus1.jpg" width="15" height="15" alt="Hapus" title="Klik untuk menghapus info...!" /></a>
              </td>
              <?php
                }
              ?>    

            </tr>
            
          </tbody>
        </table>
      </div>
  </div>
  
</div>


  <div class="pagination col-md-12" align="center" >
      <?php
      // Nomor halaman
      $query_page = "SELECT COUNT(*) AS jumData FROM sertifikasi_halal";
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=lihat_info_sh&hlmn=".($noPage-1)."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo " ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_info_sh&hlmn=".$hlmn."'>".$hlmn."</a>";
            }
      }
      if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_info_sh&hlmn=".($noPage+1)."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>
