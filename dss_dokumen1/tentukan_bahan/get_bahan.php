<?php
include_once "../app/config.php";

$keyword = ($_GET['b']);

$data = mysql_query("	SELECT sumber_bahan, sbt, titik_kritis, dokumen, deskripsi
											FROM BAHAN 
											WHERE (NAMA_BAHAN) LIKE '%$keyword%' 
											ORDER BY NAMA_BAHAN ASC;") or die ("query error");

$result = array();
while($hasil = mysql_fetch_assoc($data)){
	$result[] = $hasil;
}

echo json_encode($result);

?>