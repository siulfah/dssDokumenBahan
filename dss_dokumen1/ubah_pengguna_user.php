<?php
session_start();
if(!session_is_registered('reg_username')){ header("location: index.php"); exit();}
elseif($_SESSION['level']=='User'){
?>
	<center><h3 style="margin-top: -25px; margin-bottom: 20px;">Ubah Data Pengguna</h3></center>
	<div class="home_body_kemasan">
    <div>
    <?php
	if($pesan=$_GET['pesan']){
		echo "<span><center><b>$pesan </b></center></span><hr>";
	}
	include('app/config.php');
	$query = mysql_query("SELECT * FROM pengguna WHERE username='$username' AND level='User'");
	$cetak = mysql_fetch_array($query);
	?>
    	<form method="post" action="proses.php?hal=ubah_pengguna_user&id_pengguna=<?=$cetak['id_pengguna'];?>">
            <table border="0" width="100%">
        	<tr>
            	<td align="right" width="40%"><span>Nama </span></td>
                <td>&nbsp;:&nbsp;</td><td valign="top"><b><span><?=$cetak['nama'];?></span></b></td>
            </tr>
            <br>
            <tr>
            	<td align="right" width="40%"><span>Alamat </span></td>
                <td>&nbsp;:&nbsp; </td><td valign="top"><textarea name="alamat_rumah" cols="32" rows="4" required="required"><?=$cetak['alamat_rumah'];?></textarea><font color="red"><b> *</b></td>
            </tr>
            <br>
            <tr>
            	<td align="right"><span>No. Telp/HP</span></td>
                <td>:</td><td valign="top"><input value="<?=$cetak['telepon'];?>" name="telepon" type="number" placeholder="0812xxxxxx" class="textbox" required="required"><font color="red"><b> *</b></td>
            </tr>   
            <br>
            <tr>
            	<td align="right"><span>E-mail</span></td>
                <td>:</td><td valign="top"><input value="<?=$cetak['email'];?>" name="email" type="email" placeholder="email@email.com" class="textbox" required="required"><font color="red"><b> *</b></td>
            </tr>
            <br>
            <tr>
            	<th align="right"><span>Username</span></th>
                <td align="left">:</td><td valign="top"><span><?=$cetak['username'];?></span></th>
            </tr>
            <br>
            <tr>
            	<th align="right"><span>Password</span></th>
                <td>:</td><td valign="top"><input value="" name="password" type="password" pattern=".{6,}" placeholder="minimal 6 karakter" class="textbox" required="required"><font color="red"><b> *</b></td>
            </tr>
            <tr>
            	<td></td></td><td>
                <td>
                <input type="submit" value="Ubah Data">
                </td>
            </tr>
            </table>
		</form>
       </div>
	</div>
<?php }else{header("location: index.php");} ?>