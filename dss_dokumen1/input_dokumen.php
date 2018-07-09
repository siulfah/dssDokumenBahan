<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>  

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Input Data Dokumen</strong></p>
  </div>

  <div class="panel-body">
    <?php
      if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=lihat_list_dokumen'> Lihat Daftar Jenis Dokumen Pendukung Bahan</a></center></span><br>";}?>

      <form class="bs-docs-example form-horizontal" action="proses.php?hal=input_dokumen" method="post">
<!--judul info-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Dokumen</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="dokumen" placeholder="Nama bahan">
          </div>
        </div>

<!--isi info-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi </label>
          <div class="col-sm-9">
            <textarea class="form-control"  rows="5" cols="40" name="deskripsi" placeholder="Informasi seputar sertifikasi halal"></textarea>
          </div>
        </div>

<!--gambar-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Gambar </label>
          <div class="col-sm-9">
            <input name="gambar" type="file"> <span>(Format gambar: .jpg/.jpeg/.gif/.png)</span>
          </div>
        </div>

        <h2 align="right" >
          <input type="reset" class="btn btn-warning" value="Reset">
          <button type="submit" class="btn btn-warning" value="Simpan">Simpan</button>
          <a href='index.php?page=lihat_list_dokumen'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>

      </form>
  </div>

        
</div>