<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?> 

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Ubah Informasi Sertifikasi Halal</strong></p>
  </div>

   <div class="panel-body">
    <?php
       if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=lihat_info_sh'> Lihat Daftar Informasi Sertifikasi Halal</a></center></span><br>";
      }
      include('app/config.php');
      $id_sertifikasi = $_GET['id_sertifikasi'];
      $query = mysql_query("SELECT * FROM sertifikasi_halal WHERE id_sertifikasi='$id_sertifikasi'");
      $cetak = mysql_fetch_array($query);
    ?>

      <form class="bs-docs-example form-horizontal" method="post" action="proses.php?hal=ubah_sh&id_sertifikasi=<?=$cetak['id_sertifikasi'];?>">

<!--judul_sertifikasi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['judul_sertifikasi'];?>" class="form-control" name="judul_sertifikasi">
          </div>
        </div>

<!--info_sertifikasi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Informasi</label>
          <div class="col-sm-9">
            <textarea name="info_sertifikasi" class="form-control" rows="6" required="required"><?=$cetak['info_sertifikasi'];?></textarea>
        </div>

        <div class="clearfix" style="margin: 10pt;"></div>
<!--gambar-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Gambar </label>
          <div class="col-sm-9">
            <input name="gambar" type="file" value=""><span>(Format gambar: .jpg/.jpeg/.gif/.png)</span>
          </div>
        </div>

<!--Tanggal-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['log'];?>" readonly class="form-control" name="log" placeholder="Tanggal">
          </div>
        </div>

        <h2 align="right" >
          <input type="reset" class="btn btn-warning" value="Reset"></button>
          <input type="submit" class="btn btn-warning" value="Simpan"></button>
          <a href='index.php?page=lihat_info_sh'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>

      </form>
  </div>

        
</div>