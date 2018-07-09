<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Riwayat Pemilihan Dokumen</strong></p>
  </div>

  <div class="panel-body">
    <!--<h4 style="padding: 10px;"><a href="index.php?page=input_bahan"><p class="btn btn-warning">Riwayat Pemilihan Dokumen</p></a></h4>-->
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th align="center">Nama</th>
              <th align="center">Email</th>
              <th align="center">Nama Bahan</th>
              <th align="center">Dokumen Pendukung Bahan</th>
              <th align="center">Tanggal</th>
              <th align="center">Proses</th>
            </tr>
          </thead>
          <tbody>

            <?php
              include('app/config.php');

              $batas=10; //satu halaman menampilkan 10 baris
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
              $offset = ($noPage - 1) * $batas;
          
              $query = mysql_query("SELECT * FROM riwayat_pemilihan_dokumen ORDER BY id_riwayat DESC LIMIT $posisi,$batas");
              while($cetak = mysql_fetch_array($query)){
            ?>

            <tr>
              <td>
                <?=$cetak['nama'];?></a></td>
              <td><?=$cetak['email'];?></td>
              <td><a href='index.php?page=detail_riwayat&id_riwayat=<?=$cetak['id_riwayat'];?>' title='Klik untuk melihat secara detail'>
                <?php
                  $kalimat = $cetak['bahan'];
                  $sub_kalimat = substr($kalimat,0,20);
                  echo $sub_kalimat;
                ?>
              </a></td>
              <td>
                <?php
                  $kalimat = $cetak['dokumen'];
                  $sub_kalimat = substr($kalimat,0,30);
                  echo $sub_kalimat;
                ?>
              </td>
              <td><?=$cetak['log'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a href='index.php?page=proses&hal=hapus_riwayat&id_riwayat=<?=$cetak['id_riwayat'];?>' 
                  onclick="return confirm('Apakah anda yakin ingin menghapus data ini...?')">
                  <img src="images/hapus1.jpg" width="15" height="15" alt="Hapus" title="Klik untuk menghapus data...!" /></a>
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
      $query_page = "SELECT COUNT(*) AS jumData FROM riwayat_pemilihan_dokumen";
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=riwayat&hlmn=".($noPage-1)."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo "...";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo "...";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo "<a href='".$_SERVER['PHP_SELF']."?page=riwayat&hlmn=".$hlmn."'>".$hlmn."</a>";
            }
      }
      if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=riwayat&hlmn=".($noPage+1)."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>