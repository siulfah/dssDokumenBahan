
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Komentar Pengguna</strong></p>
  </div>

  <div class="panel-body">
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th align="center">Nama Pengguna</th>
              <th align="center">Komentar</th>
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
          
              $query = mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT $posisi,$batas");
              while($cetak = mysql_fetch_array($query)){
            ?>

            <tr>
              <td><?=$cetak['nama'];?></td>
              <td><?=$cetak['isi_komentar'];?></td>
              <td><?=$cetak['log'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a href='index.php?page=proses&hal=hapus_komentar&id_komentar=<?=$cetak['id_komentar'];?>' 
                  onclick="return confirm('Apakah anda yakin ingin menghapus komentar ini...?')">
                  <img src="images/hapus1.jpg" width="15" height="15" alt="Hapus" title="Klik untuk menghapus komentar...!" /></a>
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
      $query_page = "SELECT COUNT(*) AS jumData FROM komentar";
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=lihat_komentar&hlmn=".($noPage-1)."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo "   ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_komentar&hlmn=".$hlmn."'>".$hlmn."</a>";
            }
      }
      if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_komentar&hlmn=".($noPage+1)."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>
