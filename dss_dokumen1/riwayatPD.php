<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['username'])){ header("location: index.php"); exit();}

$username = "";
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
}

?>

<div class="panel panel-warning">
  <div class="panel-heading">
  <form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label" style="margin-left: -120px;">Nama</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?=$cetak['nama'];?></p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" style="margin-left: -120px; margin-top: -10px;">Email</label>
    <div class="col-sm-10" style="margin-top: -10px;">
      <p class="form-control-static"><?=$cetak['email'];?></p>
    </div>
  </div>
  </form>
</div>

  <div class="panel-body">
    <!--<h4 style="padding: 10px;"><a href="index.php?page=input_bahan"><p class="btn btn-warning">Riwayat Pemilihan Dokumen</p></a></h4>-->
    <h4 style="padding: 10px;" align="right"><!--a href="index.php?page=riwayatPD"--><a target="_blank" href="cetakpdf.php"><p class="btn btn-danger" ">Print</p></a></h4>
      <div class="bs-docs-example">
        <table class="table table-hover" >
          <thead style="margin-top: -20px;">
            <tr>
              <th align="left">Nama Bahan</th>
              <th align="center">Dokumen Pendukung Bahan</th>
              <th align="right">Tanggal</th>
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
          
              $query = mysql_query("SELECT bahan, dokumen, log FROM riwayat_pemilihan_dokumen ORDER BY id_riwayat DESC LIMIT $posisi,$batas");
              while($cetak = mysql_fetch_array($query)){
            ?>

            <tr>
              <td><?=$cetak['bahan'];?></td>
              <td align="justify" width="60%"><?=$cetak['dokumen'];?></td>
              <td><?=$cetak['log'];?></td>
  
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
      
      if ($noPage > 1) echo " <a href='".$_SERVER['PHP_SELF']."?page=riwayatPD&hlmn=".($noPage-1)."'>&lt;&lt; Sebelumnya &nbsp;</a>";
      for($hlmn = 1; $hlmn <= $jumPage; $hlmn++)
      {
            if ((($hlmn >= $noPage - 3) && ($hlmn <= $noPage + 3)) || ($hlmn == 1) || ($hlmn == $jumPage))
            {
                $showPage = $hlmn;
                if (($showPage == 1) && ($hlmn != 2))  echo " ";
                if (($showPage != ($jumPage - 1)) && ($hlmn == $jumPage))  echo " ... ";
                if ($hlmn == $noPage) echo "<span class=pagecurrent> ".$hlmn." </span>";
                else echo " <a href='".$_SERVER['PHP_SELF']."?page=riwayatPD&hlmn=".$hlmn."'>".$hlmn."</a>";
                
            }
      }
      if ($noPage < $jumPage) echo " <a href='".$_SERVER['PHP_SELF']."?page=riwayatPD&hlmn=".($noPage+1)."'>&nbsp; Berikutnya &gt;&gt;</a>";
      ?>
    </div>
          
  </div>
