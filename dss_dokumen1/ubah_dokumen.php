<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Ubah Data Jenis Dokumen Pendukung Bahan</strong></p>
  </div>

   <div class="panel-body">
    <?php
      if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=lihat_list_dokumen'> Lihat Daftar Dokumen Pendukung Bahan</a></center></span><br>";
      }
      include('app/config.php');
      $id_dokumen = $_GET['id_dokumen'];
      $query = mysql_query("SELECT * FROM dokumen_pendukung WHERE id_dokumen='$id_dokumen'");
      $cetak = mysql_fetch_array($query);
    ?>

      <form class="bs-docs-example form-horizontal" method="post" action="proses.php?hal=ubah_dokumen&id_dokumen=<?=$cetak['id_dokumen'];?>">

<!--judul_sertifikasi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Dokumen</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['dokumen'];?>" class="form-control" name="dokumen" placeholder="Judul">
          </div>
        </div>

<!--info_sertifikasi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" placeholder="informasi" cols="40" rows="5"><?=$cetak['deskripsi'];?></textarea>
          </div>
        </div>

<!--gambar-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Gambar </label>
          <div class="col-sm-9">
            <input name="gambar" type="file"> <span>(File: <?=$cetak['gambar'];?>)</span>
          </div>
        </div>


        <h2 align="right" >
          <input type="reset" class="btn btn-warning" value="Reset"></button>
          <input type="submit" class="btn btn-warning" value="Simpan"></button>
          <a href='index.php?page=lihat_list_dokumen'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>

      </form>
  </div>

        
</div>