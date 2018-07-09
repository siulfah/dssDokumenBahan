<!--<?php 
//session_start();
//header("location: index.php");
?>-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title" ><strong>Detail Riwayat</strong></p>
  </div>

  <div class="panel-body">

    <?php
          include('app/config.php');
          $id_riwayat = $_GET['id_riwayat'];
          $query = mysql_query("SELECT * FROM riwayat_pemilihan_dokumen WHERE id_riwayat='$id_riwayat'");
          $cetak = mysql_fetch_array($query);
        ?>
        <table class="table" border="0">
            <tr>
              <td align="right" width="40%">Nama Pengguna</td>
              <td width="1%">:</td>
              <td align="left" width="50%"><?=$cetak['nama'];?></td>
            </tr>
            <tr>
              <td align="right">Email</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['email'];?></td>
            </tr>
            <tr>
              <td align="right">Nama Bahan</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['bahan'];?></td>
            </tr>
            <tr>
              <td align="right">Sumber Bahan Baku</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['sumber_bahan'];?></td>
            </tr>
            <tr>
              <td align="right">Sumber Bahan Tambahan</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['bahan_tambahan'];?></td>
            </tr>
            <tr>
              <td align="right">Titik Kritis Bahan</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['titik_kritis'];?></td>
            </tr>
            <tr>
              <td align="right">Dokumen Pendukung Bahan</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['dokumen'];?></td>
            </tr>
            <tr>
              <td align="right">Tanggal</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['log'];?></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td width="1%"></td>
              <td align="left"><a href="index.php?page=riwayat"><button type="reset" class="btn btn-warning" value="Kembali">Kembali</button>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

</div>