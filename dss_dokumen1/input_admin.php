<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
  
<div class="panel panel-warning">
  <div class="panel-heading">
    <p class="panel-title"><strong>Tambah Pengguna Baru</strong></p>
  </div>

  <div class="panel-body">
    <?php
      if($pesan=(isset($_GET['pesan'])?$_GET['pesan']:"")){
        echo "<span><center><b>$pesan </b><a href='index.php?page=admin'> Lihat daftar Admin</a></center></span><br>";
      }
    ?>
      <form class="bs-docs-example form-horizontal" action="proses.php?hal=input_admin" method="post">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" title="Masukkan Nama Anda"><i class="glyphicon glyphicon-pencil"></i></span>
          <input type="text" class="form-control" name="nama" placeholder="Nama" aria-describedby="basic-addon1" required="required">
        </div>

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" title="Masukkan Username Anda"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" required="required">
        </div>

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" title="Masukkan Password"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" name="password" pattern=".{6,}" maxlength="10" placeholder="Password maksimal 6 karakter" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1" title="Masukkan E-mail"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email (email@email.com)" required="required" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
          <input name="telepon" type="number" class="form-control" maxlength="12" placeholder="Telepon" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-briefcase"></i></span>
          <input type="text" readonly class="form-control" name="level" placeholder="Administrator" value="Administrator" aria-describedby="basic-addon1">
        </div>
        <h2 align="right" >
          <button type="reset" class="btn btn-warning" value="Reset">Reset</button>
          <button type="submit" class="btn btn-warning" value="Simpan">Simpan</button>
          <a href='index.php?page=admin'><input type="button" class="btn btn-warning" value="Batal"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>
      </form>
  </div>

        
</div>