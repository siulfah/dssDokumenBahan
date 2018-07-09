<!--<?php 
//session_start();
//header("location: index.php");
?>-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title" ><strong>Profil Pengguna</strong></p>
  </div>

  <div class="panel-body">

    <?php
          include('app/config.php');
          $id_pengguna = $_GET['id_pengguna'];
          $query = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
          $cetak = mysql_fetch_array($query);
        ?>
        <table class="table" border="0">
            <tr>
              <td align="right" width="40%">Nama Lengkap </td>
              <td width="1%">:</td>
              <td align="left" width="50%"><?=$cetak['nama'];?></td>
            </tr>
            <tr>
              <td align="right">Username</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['username'];?></td>
            </tr>
            <tr>
              <td align="right">Password</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['password'];?></td>
            </tr>
            <tr>
              <td align="right">Email</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['email'];?></td>
            </tr>
            <tr>
              <td align="right">Telepon</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['telepon'];?></td>
            </tr>
            <tr>
              <td align="right">Level</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['level'];?></td>
            </tr>
            <tr>
              <td align="right">Waktu Daftar</td>
              <td width="1%">:</td>
              <td align="left"><?=$cetak['log'];?></td>
            </tr>
            <tr>
              <td align="right"></td>
              <td width="1%"></td>
              <td align="left"><a href="index.php?page=admin"><button type="reset" class="btn btn-warning" value="Kembali">Kembali</button>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

</div>