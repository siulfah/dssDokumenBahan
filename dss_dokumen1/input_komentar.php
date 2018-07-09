<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['username'])){ header("location: index.php"); exit();}

$level = "";
if (isset($_SESSION['level'])) {
  $level = $_SESSION['level'];
}

if($level=='User') {
?>

<div class="panel panel-success" style="margin-top: -25px;">
	<div class="panel-heading">
		<h5 class="panel-title"> Komentar Pengunjung</h5>
	</div>
	<div class="panel-body">
		<?php
			$pesan_get = (isset($_GET['pesan']) ? $_GET['pesan'] : "");
		    if($pesan=$pesan_get){
		        echo "<span><center>$pesan</center></span><br>";
		    }else{
		    $query = mysql_query("SELECT id_pengguna,nama FROM pengguna WHERE username='$username'");
		    $cetak = mysql_fetch_array($query);
	    ?>
		<div class="bs-docs-example">
			<form method="post" action="proses.php?hal=input_komentar">
	        <div class="input-group" style="padding-left: 10px;">
	          <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
	          <input type="text" class="form-control" name="nama" id="nama" value="<?=$cetak['nama'];?>" readonly>
	        </div>

	        <div class="input-group" style="padding-left: 10px;">
	        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
        	<textarea class="form-control" rows="4" name="isi_komentar" placeholder="Komentar Anda" required="required"></textarea>
        	</div>

        	<div class="input-group">
        	<h4 style="padding-left: 10px;"><input class="btn btn-success" type="submit" value="Kirim"></h4>
        	</div>
           </form>
        </div>
     <?php } ?>    
	</div>
</div>

<?php }else{header("location: index.php");} ?>
<div class="clearfix"> </div>

<div class="panel panel-success" style="margin-top: 35px;">
	<div class="panel-heading">
		<h5 class="panel-title"> Daftar Kontak</h5>
	</div>
	<div class="panel-body">
		<?php include('data_pakar.php'); ?>
	</div>
</div>