<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['username'])){ header("location: index.php"); exit();}

$level = "";
if (isset($_SESSION['level'])) {
  $level = $_SESSION['level'];
}

if($level=='Administrator'){
?>
        <center><h3>Profil Admin</h3></center>
    
    <div class="container">
            <div class="testimonials-grids">
                <div class="col-md-4 testimonials-grid">
                    <div class="col-xs-4 testimonials-grid-left">
                    </div>
                    <div class="col-xs-8 testimonials-grid-right">
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 testimonials-grid">
                    <div class="col-xs-12 testimonials-grid-left">
                       
                        <?php
                            include('app/config.php');
                            $query = mysql_query("SELECT * FROM pengguna WHERE username='$username' AND level='Administrator'");
                            $cetak = mysql_fetch_array($query);
                        ?>
            <table border="0" width="100%">
            <tr>
                <th align="right" width="50%"><span>Nama Lengkap </span></th>
                <th align="left"><span><?=$cetak['nama'];?></span></th>
            </tr>
            <tr>
                <th align="right" width="50%"><span>Alamat Perusahaan </span></td>
                <td valign="top"><span><?=$cetak['alamat'];?></span></td>
            </tr>
            <tr>
                <th align="right" width="50%"><span>Username </span></th>
                <th align="left"><span><?=$cetak['username'];?></span></th>
            </tr>
            <tr>
                <th align="right" width="50%"><span>No. Telp/HP </span></td>
                <td><span><?=$cetak['telepon'];?></span></td>
            </tr>            
            <tr>
                <th align="right" width="50%"><span>E-mail </span></td>
                <td><span><a href="mailto:<?=$cetak['email'];?>"><?=$cetak['email'];?></a></span></td>
            </tr>
            <tr>
                <th align="right" width="50%"><span>Waktu Mendaftar </span></td>
                <td><span><?=$cetak['log'];?></span></td>
            </tr>
            </table>
       
<?php }else{header("location: index.php");} ?>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 testimonials-grid">
                    <div class="col-xs-4 testimonials-grid-left">
                    </div>
                    <div class="col-xs-8 testimonials-grid-right">
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>