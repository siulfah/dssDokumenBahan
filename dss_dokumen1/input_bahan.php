<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
  

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Input Data Bahan</strong></p>
  </div>

  <div class="panel-body">
    <?php
      if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=lihat_bahan'> Lihat Daftar Bahan</a></center></span><br>";}?>

      <form class="bs-docs-example form-horizontal" action="proses.php?hal=input_bahan" method="post">

<!--nama bahan-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama bahan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_bahan" placeholder="Nama bahan">
          </div>
        </div>

<!--kategori
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="kategori" placeholder="Kategori bahan">
          </div>
        </div>
-->
<!--sumber bahan baku-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Sumber bahan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="sumber_bahan" placeholder="Sumber bahan baku">
          </div>
        </div>

<!--status
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Status halal </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="status" placeholder="Status kehalalan bahan yang digunakan">
          </div>
        </div>
-->
<!--proses-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Proses </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="proses" placeholder="Jenis proses pada bahan yang digunakan">
          </div>
        </div>

<!--sbt-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Bahan tambahan </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="sbt" placeholder="Asal sumber bahan tambahan yang digunakan">
          </div>
        </div>

<!--titik_kritis-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Titik kritis bahan </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="titik_kritis" placeholder="Titik kritis bahan yang digunakan">
          </div>
        </div>

<!--dokumen-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Dokumen pendukung bahan</label>
          <div class="col-sm-9">
            <textarea type="text" cols="70" rows="3" class="form-control" name="dokumen" placeholder="Dokumen pendukung yang diperlukan"></textarea> 
          </div>
        </div>

<!--diskripsi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea type="text" cols="70" rows="5" class="form-control" name="deskripsi" placeholder="Deskripsi bahan yang digunakan"></textarea> 
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
          <a href='index.php?page=lihat_bahan'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>

      </form>
  </div>

        
</div>