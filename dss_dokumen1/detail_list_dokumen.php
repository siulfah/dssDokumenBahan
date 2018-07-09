<!--<?php 
//session_start();
//header("location: index.php");
?>-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title" ><strong>Jenis Dokumen</strong></p>
  </div>

  <div class="panel-body">

    <?php
          include('app/config.php');
          $id_dokumen = $_GET['id_dokumen'];
          $query = mysql_query("SELECT * FROM dokumen_pendukung WHERE id_dokumen='$id_dokumen'");
          $cetak = mysql_fetch_array($query);
        ?>
        <table class="table" border="0">
            <tr>
              <td align="right" width="40%">Nama Dokumen</td>
              <td width="1%">:</td>
              <td align="left" width="50%"><?=$cetak['dokumen'];?></td>
            </tr>
            <tr>
              <td align="right">Deskripsi Dokumen</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['deskripsi'];?></td>
            </tr>
            <tr>
              <td align="right">Gambar</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['gambar'];?></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td width="1%"></td>
              <td align="left"><a href="index.php?page=lihat_info_sh"><button type="reset" class="btn btn-warning" value="Kembali">Kembali</button>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

</div>