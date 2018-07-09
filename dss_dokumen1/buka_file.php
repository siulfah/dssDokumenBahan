<?php
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
switch ($page){

// ==================
// Menu Sebelum Login
// ==================
	case 'home' :if(!file_exists ("beranda.php")) die (header("location:index.php")); 
							include "beranda.php"; 
							break;
	case 'login' :if(!file_exists ("login.php")) die (header("location:index.php")); 
							include "login.php"; 
							break;
	case 'registrasi' :if(!file_exists ("registrasi.php")) die (header("location:index.php")); 
							include "registrasi.php"; 
							break;
	case 'logout' :if(!file_exists ("logout.php")) die (header("location:index.php")); 
							include "logout.php"; 
							break;

// ==================
// Menu User
// ==================
	case 'detail_pengguna_user' :if(!file_exists ("detail_pengguna_user.php")) die (header("location:index.php")); 
							include "detail_pengguna_user.php";
							break;
	case 'ubah_pengguna' :if(!file_exists ("ubah_pengguna.php")) die (header("location:index.php")); 
							include "ubah_pengguna.php";
							break;


// ==================
// Menu Administrator
// ==================
	case '' :if(!file_exists ("index.php")) die (header("location:index.php")); 
							include "beranda.php"; 
							break;

	//case 'registrasi' :if(!file_exists ("registrasi.php")) die (header("location:index.php")); 
	//						include "registrasi.php"; 
	//						break;

	case 'admin' :if(!file_exists ("admin.php")) die (header("location:index.php")); 
							include "admin.php"; 
							break;

	case 'input_admin' :if(!file_exists ("input_admin.php")) die (header("location:index.php")); 
							include "input_admin.php"; 
							break;
	
	case 'ubah_admin' :if(!file_exists ("ubah_admin.php")) die (header("location:index.php")); 
							include "ubah_admin.php"; 
							break;
							
	case 'detail_pengguna_admin' :if(!file_exists ("detail_pengguna_admin.php")) die (header("location:index.php")); 
							include "detail_pengguna_admin.php"; 
							break;

	case 'detail_admin' :if(!file_exists ("detail_admin.php")) die (header("location:index.php")); 
							include "detail_admin.php"; 
							break;

	case 'lihat_bahan' :if(!file_exists ("lihat_bahan.php")) die (header("location:index.php")); 
							include "lihat_bahan.php"; 
							break;	

	case 'input_bahan' :if(!file_exists ("input_bahan.php")) die (header("location:index.php")); 
							include "input_bahan.php"; 
							break;
	case 'ubah_bahan' :if(!file_exists ("ubah_bahan.php")) die (header("location:index.php")); 
							include "ubah_bahan.php"; 
							break;
							
	case 'detail_bahan' :if(!file_exists ("detail_bahan.php")) die (header("location:index.php")); 
							include "detail_bahan.php"; 
							break;

	case 'parameter' :if(!file_exists ("parameter_bahan.php")) die (header("location:index.php")); 
							include "parameter_bahan.php"; 
							break;

	case 'lihat_sbb' :if(!file_exists ("lihat_sbb.php")) die (header("location:index.php")); 
							include "lihat_sbb.php"; 
							break;

	case 'input_sbb' :if(!file_exists ("input_sbb.php")) die (header("location:index.php")); 
							include "input_sbb.php"; 
							break;

	case 'ubah_sbb' :if(!file_exists ("ubah_sbb.php")) die (header("location:index.php")); 
							include "ubah_sbb.php"; 
							break;				
							
	case 'detail_sbb' :if(!file_exists ("detail_sbb.php")) die (header("location:index.php")); 
							include "detail_sbb.php"; 
							break;		

	case 'lihat_sbt' :if(!file_exists ("lihat_sbt.php")) die (header("location:index.php")); 
							include "lihat_sbt.php"; 
							break;

	case 'input_sbt' :if(!file_exists ("input_sbt.php")) die (header("location:index.php")); 
							include "input_sbt.php"; 
							break;

	case 'ubah_sbt' :if(!file_exists ("ubah_sbt.php")) die (header("location:index.php")); 
							include "ubah_sbt.php"; 
							break;				
							
	case 'detail_sbt' :if(!file_exists ("detail_sbt.php")) die (header("location:index.php")); 
							include "detail_sbt.php"; 
							break;						

	case 'lihat_tk' :if(!file_exists ("lihat_tk.php")) die (header("location:index.php")); 
							include "lihat_tk.php"; 
							break;

	case 'input_tk' :if(!file_exists ("input_tk.php")) die (header("location:index.php")); 
							include "input_tk.php"; 
							break;

	case 'ubah_tk' :if(!file_exists ("ubah_tk.php")) die (header("location:index.php")); 
							include "ubah_tk.php"; 
							break;				
							
	case 'detail_tk' :if(!file_exists ("detail_tk.php")) die (header("location:index.php")); 
							include "detail_tk.php"; 
							break;	 

    case 'lihat_list_dokumen' :if(!file_exists ("lihat_list_dokumen.php")) die (header("location:index.php")); 
							include "lihat_list_dokumen.php"; 
							break;

	case 'input_dokumen' :if(!file_exists ("input_dokumen.php")) die (header("location:index.php")); 
							include "input_dokumen.php"; 
							break;

	case 'detail_list_dokumen' :if(!file_exists ("detail_list_dokumen.php")) die (header("location:index.php"));
							include "detail_list_dokumen.php"; 
							break;
           
	case 'ubah_dokumen' :if(!file_exists ("ubah_dokumen.php")) die (header("location:index.php")); 
							include "ubah_dokumen.php"; 
							break;

	case 'lihat_info_sh' :if(!file_exists ("lihat_info_sh.php")) die (header("location:index.php")); 
							include "lihat_info_sh.php"; 
							break;

	case 'input_sh' :if(!file_exists ("input_sh.php")) die (header("location:index.php")); 
							include "input_sh.php"; 
							break;

	case 'detail_info_sh' :if(!file_exists ("detail_info_sh.php")) die (header("location:index.php")); 
							include "detail_info_sh.php"; 
							break;

	case 'ubah_sh' :if(!file_exists ("ubah_sh.php")) die (header("location:index.php")); 
							include "ubah_sh.php"; 
							break;	

	case 'riwayat' :if(!file_exists ("riwayat.php")) die (header("location:index.php")); 
							include "riwayat.php"; 
							break;

	case 'detail_riwayat' :if(!file_exists ("detail_riwayat.php")) die (header("location:index.php")); 
							include "detail_riwayat.php"; 
							break;

	case 'komentar_pengguna' :if(!file_exists ("lihat_komentar.php")) die (header("location:index.php")); 
							include "lihat_komentar.php"; 
							break;

	case 'proses' :if(!file_exists ("proses.php")) die (header("location:index.php")); 
							include "proses.php"; 
							break;



// ======================= //
// Menu Pengunjung Website //
// ======================= //

	

	case 'bahan' :if(!file_exists ("data_bahan\index.php")) die (header("location:index.php")); 
							include "data_bahan\index.php"; 
							break;

	case 'lihat_dokumen' :if(!file_exists ("lihat_dokumen.php")) die (header("location:index.php")); 
							include "lihat_dokumen.php";
							break;

	case 'detail_dokumen' :if(!file_exists ("detail_dokumen.php")) die (header("location:index.php")); 
							include "detail_dokumen.php";
							break;

	case 'tentukan_bahan' :if(!file_exists ("tentukan_bahan\index.php")) die (header("location:index.php")); 
							include "tentukan_bahan\index.php";
							break;

	case 'lihat_sh' :if(!file_exists ("lihat_sh.php")) die (header("location:index.php")); 
							include "lihat_sh.php";
							break;

	case 'detail_sh' :if(!file_exists ("detail_sh.php")) die (header("location:index.php")); 
							include "detail_sh.php";
							break;

	case 'input_komentar' :if(!file_exists ("input_komentar.php")) die (header("location:index.php")); 
							include "input_komentar.php";
							break;

	case 'riwayatPD' :if(!file_exists ("riwayatPD.php")) die (header("location:index.php")); 
							include "riwayatPD.php"; 
							break;
				
	

}
?>