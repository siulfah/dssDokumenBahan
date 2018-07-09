<?php

include_once "../app/config.php";

$keyword = ($_POST['query']);

$data = mysql_query("	SELECT id_bahan, nama_bahan, sumber_bahan, titik_kritis
											FROM BAHAN 
											WHERE (NAMA_BAHAN) LIKE '%$keyword%' 
											ORDER BY NAMA_BAHAN ASC;") or die ("query error");

$result = array();
while($hasil = mysql_fetch_assoc($data)){
	$result[] = $hasil;
}

$elem	= array();
foreach ($result as $key => $value){
	$nama = ($value['nama_bahan']);
	$nama2 = str_replace_first(($keyword), '<strong>'.$keyword.'</strong>', $nama);

	$elem[$key] = '<div class="auto-result-show" value="'.$nama.'" id="'.$value['id_bahan'].'">
										<span class="result-parent">
	              			'.$nama2.'
	              		</span>
	              		<br>
	              		<span class="result-child">
	              			'.$value['sumber_bahan'].'
	              		</span>
	              		<br>
	              		<span class="result-child">
		              		'.$value['titik_kritis'].'
	              		</span>
	              	</div>';
}

echo json_encode($elem);
	
function str_replace_first($from, $to, $subject)
{
    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $subject, 1);
}
?>