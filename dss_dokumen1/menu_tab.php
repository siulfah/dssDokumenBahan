<?php
session_start();
$username = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

include('app/config.php');
$query = mysql_query("SELECT * FROM pengguna WHERE username='$username'");
$cetak = mysql_fetch_array($query);

$level = "";
if (isset($cetak['level'])) {
    $level = $cetak['level'];
}

if($level=="Administrator"){
?>
    <?php
        $page = "home";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
    ?>
    <ul class="nav navbar-nav cl-effect-14">
    
        <li <?php if($page=="home"){echo "class=active";}?>>
        <a href="index.php?page=home">Home</a></li>
        
        <li <?php if($_GET['page']=="admin" 
            || $_GET['page']=="input_admin" 
            || $_GET['page']=="ubah_admin" 
            || $_GET['page']=="detail_pengguna_admin"){echo "class=active";}?>>
        <a href="index.php?page=admin">Admin</a></li>

        <li <?php if($_GET['page']=="lihat_bahan" 
            || $_GET['page']=="input_bahan" 
            || $_GET['page']=="ubah_bahan" 
            || $_GET['page']=="detail_bahan"){echo "class=active";}?>>
        <a href="index.php?page=lihat_bahan">Bahan</a></li>
      
       <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parameter <span class="caret"></span></a>
          <ul class="dropdown-menu navbar-nav cl-effect-14" aria-labelledby="dropdownMenu1">
            <li <?php //if($_GET['page']=="lihat_sbb" 
            //|| $_GET['page']=="input_sbb" 
            //|| $_GET['page']=="ubah_sbb" 
            //|| $_GET['page']=="detail_sbb"){echo "class=active";}?>>
                //<a href="index.php?page=lihat_sbb">Sumber Bahan Baku</a>
            //</li>
            <li <?php //if($_GET['page']=="lihat_sbt" 
            //|| $_GET['page']=="input_sbt" 
            //|| $_GET['page']=="ubah_sbt" 
            //|| $_GET['page']=="detail_sbt"){echo "class=active";}?>>
                <a href="index.php?page=lihat_sbt">Sumber Bahan Tambahan</a>
            </li>
            <li <?php //if($_GET['page']=="lihat_tk" 
            //|| $_GET['page']=="input_tk" 
            //|| $_GET['page']=="ubah_tk" 
            //|| $_GET['page']=="detail_tk"){echo "class=active";}?>>
                <a href="index.php?page=lihat_tk">Titik Kritis Bahan</a>
            </li>
          </ul>
        </li>
            
        <script>
            $('.dropdown-toggle').dropdown()
        </script>
        -->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi <span class="caret"></span></a>
          <ul class="dropdown-menu navbar-nav cl-effect-14" aria-labelledby="dropdownMenu1">
            <li <?php if($_GET['page']=="lihat_info_sh" 
            || $_GET['page']=="input_sh" 
            || $_GET['page']=="ubah_sh" 
            || $_GET['page']=="detail_info_sh"){echo "class=active";}?>>
            <a href="index.php?page=lihat_info_sh">Sertifikasi Halal</a>
            </li>
            <li <?php if($_GET['page']=="lihat_list_dokumen"
            || $_GET['page']=="input_dokumen" 
            || $_GET['page']=="ubah_dokumen" 
            || $_GET['page']=="detail_list_dokumen"){echo "class=active";}?>>
            <a href="index.php?page=lihat_list_dokumen">Dokumen Pendukung</a>
            </li>
          </ul>
        </li>
            
        <script>
            $('.dropdown-toggle').dropdown()
        </script>
       
        <!--PARAMETER BAHAN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi <span class="caret"></span></a>
          <ul class="dropdown-menu navbar-nav cl-effect-14" aria-labelledby="dropdownMenu1">
            <li <?php if($_GET['page']=="lihat_info_sh" 
            || $_GET['page']=="input_sh" 
            || $_GET['page']=="ubah_sh" 
            || $_GET['page']=="detail_info_sh"){echo "class=active";}?>>
            <a href="index.php?page=lihat_info_sh">Sertifikasi Halal</a>
            </li>
            <li <?php if($_GET['page']=="lihat_list_dokumen"
            || $_GET['page']=="input_dokumen" 
            || $_GET['page']=="ubah_dokumen" 
            || $_GET['page']=="detail_list_dokumen"){echo "class=active";}?>>
            <a href="index.php?page=lihat_list_dokumen">Dokumen Pendukung</a>
            </li>
          </ul>
        </li>
            
        <script>
            $('.dropdown-toggle').dropdown()
        </script>

        


        <li <?php if($_GET['page']=="riwayat" 
            || $_GET['page']=="detail_riwayat"){echo "class=active";}?>>
        <a href="index.php?page=riwayat">Riwayat Pemilihan Dokumen</a></li>

        <li <?php if($page=="suara_pengguna"){echo "class=active";}?>>
        <a href="index.php?page=komentar_pengguna">Komentar Pengguna</a></li>

        <li <?php if($page=="logout"){echo "class=active";}?>>
        <a href="index.php?page=logout">Logout</a></li>
    </ul>

<?php }elseif($cetak['level']=="User"){ ?>
<?php
        $page = "home";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
    ?>
    
    <ul class="nav navbar-nav cl-effect-14">
      
            <li <?php if($page=="home"){echo "class=active";}?>>
            <a href="index.php?page=home">Home</a></li>
            <li <?php if($page=="detail_pengguna_user"){echo "class=active";}?>>
            <a href="index.php?page=detail_pengguna_user">Profil</a></li>
            <li <?php if($page=="bahan"){echo "class=active";}?>>
            <a href="index.php?page=bahan">Bahan</a></li>
            <li <?php //if($page=="input_parameter_user" 
                 //|| $page=="input_parameter_user1"
                 //|| $page=="input_parameter_produk" 
                 //|| $page=="input_parameter_ph" 
                 //|| $page=="input_parameter_aw" 
                 //|| $page=="input_parameter_suhu" 
                 //|| $page=="input_parameter_pengawet" 
                 //|| $page=="input_parameter_kadaluarsa" 
                 //|| $page=="input_parameter_jarak" 
                 //|| $page=="input_parameter_teknik" 
                 //|| $page=="konfirmasi" 
                 //|| $page=="hasil"){echo "class=active";}
                if($page=="tentukan_bahan"){echo "class=active";}?>>
            <a href="index.php?page=tentukan_bahan">Tentukan Dokumen</a></li>
            <li <?php if($page=="riwayatPD"){echo "class=active";}?>>
            <a href="index.php?page=riwayatPD">Riwayat</a></li>
            <li <?php if($page=="lihat_dokumen"){echo "class=active";}?>>
            <a href="index.php?page=lihat_dokumen">Dokumen Pendukung</a></li>
            <li <?php if($page=="lihat_sh"){echo "class=active";}?>>
            <a href="index.php?page=lihat_sh">Sertifikasi Halal</a></li>
            <li <?php if($page=="input_komentar"){echo "class=active";}?>>
            <a href="index.php?page=input_komentar">Komentar</a></li>
            <li <?php if($page=="logout"){echo "class=active";}?>>
            <a href="index.php?page=logout">Logout</a></li>
    </ul>

<?php }else{ ?>
    <?php
        $page = "home";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
    ?>
    
    <ul class="nav navbar-nav cl-effect-14">
      
            <li <?php if($page=="home"){echo "class=active";}?>>
            <a href="index.php?page=home">Home</a></li>
            <li <?php if($page=="bahan"){echo "class=active";}?>>
            <a href="index.php?page=bahan">Bahan</a></li>
            <li <?php if($page=="lihat_dokumen"){echo "class=active";}?>>
            <a href="index.php?page=lihat_dokumen">Dokumen Pendukung</a></li>
            <li <?php if($page=="lihat_sh"){echo "class=active";}?>>
            <a href="index.php?page=lihat_sh">Sertifikasi Halal</a></li>
            <li <?php if($page=="login"){echo "class=active";}?>>
            <a href="index.php?page=login">Login</a></li>
    </ul>
<?php } ?>


