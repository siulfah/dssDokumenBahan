<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Ubah Data Pengguna</strong></p>
  </div>

  <div class="panel-body">
    <?php
       if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
     echo "<span><center><b>$pesan </b> <a href='index.php?page=admin'> Kembali</a></center></span><br>";
      }
      include('app/config.php');
      $id_pengguna = $_GET['id_pengguna'];
      $query = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
      $cetak = mysql_fetch_array($query);
    ?>
      <form method="post" action="proses.php?hal=ubah_data_admin&id_pengguna=<?=$cetak['id_pengguna'];?>">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
          <input type="text" value="<?=$cetak['nama'];?>" class="form-control" name="nama" aria-describedby="basic-addon1" required="required">
        </div>

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" value="<?=$cetak['username'];?>" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" required="required">
        </div>

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
          <input value="<?=$cetak['password'];?>" type="text" class="form-control" name="password" pattern=".{6,}" placeholder="Password minimal 6 karakter" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email" value="<?=$cetak['email'];?>" class="form-control" name="email" placeholder="Email (seseorang@email.com)" required="required" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
          <input name="telepon" type="number" value="<?=$cetak['telepon'];?>" class="form-control" placeholder="Telepon" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-briefcase"></i></span>
          <input name="level" type="text" class="form-control" value="<?=$cetak['level'];?>" aria-describedby="basic-addon1">
        </div>
        <h2 align="right" >

          <a href='index.php?page=admin'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;
          
          <button type="submit" class="btn btn-warning" value="Simpan">Ubah Data</button>
        </h2>
      </form>
  </div>

        
</div>