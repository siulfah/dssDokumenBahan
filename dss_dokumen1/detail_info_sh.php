<!--<?php 
//session_start();
//header("location: index.php");
?>-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title" ><strong>Informasi</strong></p>
  </div>

  <div class="panel-body">

    <?php
          include('app/config.php');
          $id_sertifikasi = $_GET['id_sertifikasi'];
          $query = mysql_query("SELECT * FROM sertifikasi_halal WHERE id_sertifikasi='$id_sertifikasi'");
          $cetak = mysql_fetch_array($query);
        ?>
        <table class="table" border="0">
            <tr>
              <td align="right" width="40%">Judul</td>
              <td width="1%">:</td>
              <td align="left" width="50%"><?=$cetak['judul_sertifikasi'];?></td>
            </tr>
            <tr>
              <td align="right">Informasi</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['info_sertifikasi'];?></td>
            </tr>
            <tr>
              <td align="right">Gambar</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['gambar'];?></td>
            </tr>
            <tr>
              <td align="right">Tanggal</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['log'];?></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td width="1%"></td>
              <td align="left"><a href="index.php?page=lihat_info_sh"><button type="reset" class="btn btn-warning" value="Kembali">Kembali</button>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

</div>