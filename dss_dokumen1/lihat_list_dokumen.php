
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Daftar Jenis Dokumen Pendukung Bahan </strong></p>
  </div>

  <div class="panel-body">
    <h4 style="padding: 10px;"><a href="index.php?page=input_dokumen"><p class="btn btn-warning">Tambah Dokumen Baru</p></a></h4>
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th align="center" >Jenis Dokumen</th>
              <th align="center" width="25%">Deskripsi</th>
              <th align="center">Gambar</th>
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
          
              $query = mysql_query("SELECT * FROM dokumen_pendukung ORDER BY id_dokumen DESC LIMIT $posisi,$batas");
              while($cetak = mysql_fetch_array($query)){
            ?>

            <tr>
              <td>
                <a href='index.php?page=detail_list_dokumen&id_dokumen=<?=$cetak['id_dokumen'];?>' title='Klik untuk melihat secara detail'><?=$cetak['dokumen'];?></a></td>
              <td><?php
                  $kalimat = $cetak['deskripsi'];
                  $sub_kalimat = substr($kalimat,0,50);
                  echo $sub_kalimat;
                ?></td>
              <td><?=$cetak['gambar'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a href='index.php?page=ubah_dokumen&id_dokumen=<?=$cetak['id_dokumen'];?>'>
                  <img src="images/ubah2.jpg" width="15" height="15" alt="Ubah" title="Klik untuk mengubah data...!" /></a> | 
                  <a href='index.php?page=proses&hal=hapus_dokumen&id_dokumen=<?=$cetak['id_dokumen'];?>' 
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
      $query_page = "SELECT COUNT(*) AS jumData FROM dokumen_pendukung";
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=lihat_list_dokumen&hlmn=".($noPage-1)."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo " ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_list_dokumen&hlmn=".$hlmn."'>".$hlmn."</a>";
            }
      }
      if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=lihat_list_dokumen&hlmn=".($noPage+1)."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>
