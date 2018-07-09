<?php
include('app/config.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$result = mysql_query("SELECT id_riwayat,nama,email,bahan, dokumen, log FROM riwayat_pemilihan_dokumen ORDER BY nama ASC") or die(mysql_error());

$html_var = "";
while($row = mysql_fetch_array($result))
{
    $id_riwayat = $row["id_riwayat"];
    $nama = $row["nama"];
    $email = $row["email"];
    $bahan = $row["bahan"];
    $dokumen = $row["dokumen"];
    $log = $row["log"];

$html_var .= "<tr>
			<td>" . $id_riwayat ."</td>
			<td>" . $nama ."</td>
			<td>" . $email . "</td>
			<td>" . $bahan . "</td>
			<td>" . $dokumen . "</td>
			<td>" . $log . "</td>
		</tr>";

}

$html = "
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>
h2 {
	font-family: Arial, \"Helvetica Neue\", Helvetica, sans-serif;
	font-size: 20px;
	color: black;
}
table {
    border-collapse: collapse;
    font-size: 12px;
    width: 100%;
}
table, th, td {
	border: 1px solid black;
}

th {
	font-size: 13px;
	text-align: center;
}

td {
    text-align: left;
    vertical-align: top;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<center><h2>Dokumen Pendukung Bahan</h2></center>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>E-mail</th>
			<th>Bahan</th>
			<th>Dokumen</th>
			<th>Waktu Pemilihan</th>
		</tr>
	</thead>
	<tbody>" . $html_var . "</tbody>
</table>
</body>
</html>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("document.pdf", array("Attachment" => false));

exit(0);