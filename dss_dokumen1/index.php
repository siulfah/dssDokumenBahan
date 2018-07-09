<?php
ob_start();

$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>SPK PDPB</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Optometry Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/dAutocomplete.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet" >

<link href="images/logo.png" rel="shortcut icon">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/own.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href="images/logo.png" rel="shortcut icon">
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-nav" style="margin-top: 15px;">
			</div>
			<div class="clearfix"> </div>
			 <ul class="nav navbar-nav cl-effect-14">
				<p><?php include('tanggal.php');?></p> 
			</ul>
		</div>
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<a class="navbar-brand" href="index.php"><?php include('logo.php'); ?></a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<?php include('menu_tab.php'); ?>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->

<!-- banner -->
	<?php if ($page == "home") { ?>
	<div class="banner" style="margin-bottom: 85px;">
		<div class="container">
			<div class="banner-left">
			</div>
			<div class="clearfix"> </div>
			<div class="banner-pos">
				<?php include('slider.php'); ?>	
			</div>
		</div>
	</div>
	<?php } ?>
<!-- //banner -->
<!-- events 
	<div class="events">
		
	</div>
//events -->
<!-- banner-bottom -->
	<!--<div class="banner-bottom">
		<div class="container">
			<div class="wmuSlider example1">
			    
			</div>
				<script src="js/jquery.wmuSlider.js"></script> 
					  <script>
						$('.example1').wmuSlider();         
					 </script> 
		</div>
	</div>-->
<!-- //banner-bottom --><!-- testimonials -->
	<div class="testimonials" >
		<div class="container content">
			<?php include('buka_file.php'); ?>
		</div>
	</div>
<!-- //testimonials -->
<!-- footer -->
	<div class="footer">	
		<div class="container">
			<?php include('footer.php'); ?>
		</div>
	</div>
	<div class="copy">
		<div class="container" style="margin-top: 20px;">
			<p>Institut Pertanian Bogor (IPB) © 2016 All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
<!--//footer-->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>