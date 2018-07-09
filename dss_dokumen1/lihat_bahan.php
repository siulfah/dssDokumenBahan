<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Daftar Bahan</strong></p>
  </div>

    <div class="panel-body">
      
      <div style="margin-bottom:15px;" align="right">
        <div class="col-lg-9">
        
        </div>
        <div class="col-lg-4-right">
          <form action="index.php?page=lihat_bahan" method="post">
          <table>
          <td>
            <?php 
              $input_cari = @$_POST['input_cari']; 
              if($input_cari == "") {
                  $input_cari = @$_GET['input_cari']; 
              }
            ?>
           <input type="text" name="input_cari" placeholder="Cari Berdasar Nama Bahan" class="form-control" style="width:250px; margin-right: 5px;" value="<?php echo $input_cari; ?>" />
          </td>
          <td>
           <input type="submit" name="cari" value="Cari" class="btn btn-warning"   />
          </td>
          </table>
          </form>
        </div>
      </div>

    <h4 style="padding: 10px;"><a href="index.php?page=input_bahan"><p class="btn btn-warning">Tambah Bahan Baru</p></a></h4>

      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th align="center">Nama Bahan</th>
              <th align="center">Sumber Bahan</th>
              <th align="center">Titik Kritis Bahan</th>
              <th align="center">Dokumen Pendukung Bahan</th>
              <th align="center">Proses</th>
            </tr>
          </thead>
          <tbody>

            <?php
              include('app/config.php');
              
              $cari = @$_POST['cari'];
              if ($cari == "") {
                  $cari = @$_GET['cari'];
              }

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
              // jika tombol cari di klik
              if($cari) {

                // jika kotak pencarian tidak sama dengan kosong
                if($input_cari != "") {
                    // query mysql untuk mencari berdasarkan nama negara. .
                    $query = mysql_query("select * from bahan where nama_bahan like '%$input_cari%' limit $batas offset $offset") or die (mysql_error()); 
                } else {
                    $query = mysql_query("select * from bahan limit $batas offset $offset") or die (mysql_error());
                }
              } else {
                  $query = mysql_query("select * from bahan limit $batas offset $offset") or die (mysql_error());
              }
              
               // mengecek data
               $cek = mysql_num_rows($query);
               // jika data kurang dari 1
               if($cek < 1) {
                ?>
                 <tr> <!--muncul peringata bahwa data tidak di temukan-->
                  <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
                 </tr>
                <?php
               } else {
                 // mengulangi data agar tidak hanya 1 yang tampil
                 while($cetak = mysql_fetch_array($query)) {
               ?>

            <tr>
              <td>
                <a href='index.php?page=detail_bahan&id_bahan=<?=$cetak['id_bahan'];?>' title='Klik untuk melihat secara detail'><?=$cetak['nama_bahan'];?></a></td>
              <td><?=$cetak['sumber_bahan'];?></td>
              <td><?=$cetak['titik_kritis'];?></td>
              <td align="justify"><?=$cetak['dokumen'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a href='index.php?page=ubah_bahan&hal=ubah_bahan&id_bahan=<?=$cetak['id_bahan'];?>'>
                  <img src="images/ubah2.jpg" width="15" height="15" alt="Ubah" title="Klik untuk mengubah data...!" /></a> | 
                  <a href='index.php?page=proses&hal=hapus_bahan&id_bahan=<?=$cetak['id_bahan'];?>' 
                  onclick="return confirm('Apakah anda yakin ingin menghapus data ini...?')">
                  <img src="images/hapus1.jpg" width="15" height="15" alt="Hapus" title="Klik untuk menghapus data...!" /></a>
              </td>
              <?php
                }  
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
      $query_page = "SELECT COUNT(*) AS jumData FROM bahan";
      if($input_cari != "") {
        $query_page = "SELECT COUNT(*) AS jumData FROM bahan where nama_bahan like '%$input_cari%'";
      }
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      $inputCariParam = ($input_cari != "" ? "&input_cari=" . $input_cari : "");
      $cariParam = ($cari != "" ? "&cari=" . $cari : "");
      if ($noPage > 1) echo " <a href='".$_SERVER['PHP_SELF']."?page=lihat_bahan&hlmn=".($noPage-1).$inputCariParam.$cariParam."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo " ... ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo " <a href='".$_SERVER['PHP_SELF']."?page=lihat_bahan&hlmn=".$hlmn.$inputCariParam.$cariParam."'>".$hlmn."</a>";
                
            }
      }
      if ($noPage < $jumPage) echo " <a href='".$_SERVER['PHP_SELF']."?page=lihat_bahan&hlmn=".($noPage+1).$inputCariParam.$cariParam."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>