<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Daftar Admin</strong></p>
  </div>

  <div class="panel-body">
    <h4 style="padding: 10px;"><a href="index.php?page=input_admin"><p class="btn btn-warning">Tambah Pengguna Baru</p></a></h4>
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead >
            <tr>
              <th style="width: 15%;" align="center">Nama</th>
              <th style="width: 20%;" align="center">Username</th>
              <th style="width: 20%;" align="center">Password</th>
              <th style="width: 20%;" align="center">Kontak</th>
              <th style="width: 25%;" align="center">Proses</th>
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
          
              $query = mysql_query("SELECT * FROM pengguna ORDER BY id_pengguna DESC LIMIT $posisi,$batas");
              while($cetak = mysql_fetch_array($query)){
            ?>

            <tr>
              <td><?=$cetak['nama'];?></td>
              <td><?=$cetak['username'];?></td>
              <td><?=$cetak['password'];?></td>
              <td><?=$cetak['telepon'];?></td>
            <!--button proses-->
              <td class="center ">
                  <a class="btn btn-success" href='index.php?page=detail_admin&id_pengguna=<?=$cetak['id_pengguna'];?>' title='Klik untuk melihat secara detail'>
                  <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                      Lihat
                  </a>
                   <a class="btn btn-info" href='index.php?page=ubah_admin&hal=ubah_admin&id_pengguna=<?=$cetak['id_pengguna'];?>'>
                      <i class="glyphicon glyphicon-edit icon-white"></i>
                      Ubah
                  </a>
                  <a class="btn btn-danger" href='index.php?page=proses&hal=hapus_admin&id_pengguna=<?=$cetak['id_pengguna'];?>' onclick="return confirm('Apakah anda yakin ingin menghapus data ini...?')" title="Klik untuk menghapus data admin!">
                      <i class="glyphicon glyphicon-trash icon-white"></i>
                      Hapus
                  </a>
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
      $query_page = "SELECT COUNT(*) AS jumData FROM pengguna";
     
      $hasil = mysql_query($query_page);
      $data = mysql_fetch_array($hasil);
      $jumData = $data['jumData'];
      $jumPage = ceil($jumData/$batas);
      
      if ($noPage > 1) echo " <a href='".$_SERVER['PHP_SELF']."?page=admin&hlmn=".($noPage-1).$inputCariParam.$cariParam."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo " ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo " <a href='".$_SERVER['PHP_SELF']."?page=admin&hlmn=".$hlmn.$inputCariParam.$cariParam."'>".$hlmn."</a>";
                
            }
      }
      if ($noPage < $jumPage) echo " <a href='".$_SERVER['PHP_SELF']."?page=admin&hlmn=".($noPage+1).$inputCariParam.$cariParam."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>


      
    </div>
  
