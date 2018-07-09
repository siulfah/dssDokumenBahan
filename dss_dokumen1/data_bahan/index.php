<link href="js/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<h3 class="title" align="center">Daftar Bahan</h3>
<div class="bs-docs-example">
	<table id="table" class="table table-bordered" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Nama Bahan</th>
	            <th>Sumber Bahan</th>
	            <th>Titik Kritis Bahan</th>
	            <th>Deskripsi Bahan</th>
	            <th>Dokumen Pendukung Bahan</th>
	        </tr>
	    </thead>
	    <tbody>
	    </tbody>
	</table>
</div>

<script src="js/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
 
$(document).ready(function() {
 
	$('#table').dataTable({
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "data_bahan/data.php",<!-- sesuaikan dengan letak file pengambilan data. -->
		"aoColumnDefs": [ 
			{ "aTargets": [0], 
			      "sType": "html", 
			      "fnRender": function(o, val) { 
			      		var data = "";
			      		if (o.aData.length >= 1) {
			      			data = $("<div/>").html(o.aData[0]).text();	
			      		}
			          	return data;
			      } 
			 },
			{ "aTargets": [1], 
			      "sType": "html", 
			      "fnRender": function(o, val) { 
			      		var data = "";
			      		if (o.aData.length >= 2) {
			      			data = $("<div/>").html(o.aData[1]).text();	
			      		}
			          	return data;
			      } 
			    },
			    { "aTargets": [2], 
			      "sType": "html", 
			      "fnRender": function(o, val) { 
			      		var data = "";
			      		if (o.aData.length >= 3) {
			      			data = $("<div/>").html(o.aData[2]).text();	
			      		}
			          	return data;
			      } 
			    },
			    { "aTargets": [3], 
			      "sType": "html", 
			      "fnRender": function(o, val) { 
			      		var data = "";
			      		if (o.aData.length >= 4) {
			      			data = $("<div/>").html(o.aData[3]).text();	
			      		}
			          	return data;
			      } 
			    },
			{ "aTargets": [4], 
		      "sType": "html", 
		      "fnRender": function(o, val) { 
		      		var data = "";
			      		if (o.aData.length >= 5) {
			      			data = $("<div/>").html(o.aData[4]).text();	
			      		}
		          	return data;
		      } 
		    }
		]
	});
 
});
</script>