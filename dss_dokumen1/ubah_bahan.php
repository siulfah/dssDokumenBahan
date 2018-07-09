<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
  

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Ubah Data Bahan</strong></p>
  </div>

  <div class="panel-body">
    <?php
      if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=lihat_bahan'> Lihat Daftar Bahan</a></center></span><br>";
      }
      include('app/config.php');
      $id_bahan = $_GET['id_bahan'];
      $query = mysql_query("SELECT * FROM bahan WHERE id_bahan='$id_bahan'");
      $cetak = mysql_fetch_array($query);
    ?>

      <form class="bs-docs-example form-horizontal" method="post" action="proses.php?hal=ubah_bahan&id_bahan=<?=$cetak['id_bahan'];?>">

<!--nama bahan-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama bahan</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['nama_bahan'];?>" class="form-control" name="nama_bahan" placeholder="Nama bahan">
          </div>
        </div>

<!--kategori
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['kategori'];?>" class="form-control" name="kategori" placeholder="Kategori bahan">
          </div>
        </div>
-->
<!--sumber bahan baku-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Sumber bahan</label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['sumber_bahan'];?>" class="form-control" name="sumber_bahan" placeholder="Sumber bahan baku">
          </div>
        </div>

<!--status
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Status halal </label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['status'];?>" class="form-control" name="status" placeholder="Status kehalalan bahan yang digunakan">
          </div>
        </div>
-->
<!--proses-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Proses </label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['proses'];?>" class="form-control" name="proses" placeholder="Jenis proses pada bahan yang digunakan">
          </div>
        </div>

<!--sbt-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Bahan tambahan </label>
          <div class="col-sm-9">
            <input type="text" value="<?=$cetak['sbt'];?>" class="form-control" name="sbt" placeholder="Asal sumber bahan tambahan yang digunakan">
          </div>
        </div>

<!--titik_kritis-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Titik kritis bahan</label>
          <div class="col-sm-9">
            <textarea type="text" cols="70" rows="3" class="form-control" name="titik_kritis" placeholder="Titik kritis bahan"><?=$cetak['titik_kritis'];?></textarea> 
          </div>
        </div>

<!--dokumen-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Jenis Dokumen</label>
          <div class="col-sm-9">
            <textarea type="text" cols="70" rows="3" class="form-control" name="dokumen" placeholder="Jenis dokumen yang diperlukan"><?=$cetak['dokumen'];?></textarea> 
          </div>
        </div>
<!--diskripsi-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea type="text" cols="70" rows="5" class="form-control" name="deskripsi" placeholder="Deskripsi bahan yang digunakan"><?=$cetak['deskripsi'];?></textarea> 
          </div>
        </div>

<!--gambar-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Gambar </label>
          <div class="col-sm-9">
            <input name="gambar" type="file" value="<?=$cetak['gambar'];?>"> <span>(Format gambar: .jpg/.jpeg/.gif/.png)</span>
          </div>
        </div>

        <h2 align="right" >
          <input type="reset" class="btn btn-warning" value="Reset"></button>
          <input type="submit" class="btn btn-warning" value="Simpan"></button>
          <a href='index.php?page=lihat_bahan'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>

      </form>
  </div>

        
</div>