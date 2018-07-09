<ul id="flexiselDemo1">			
					<li>
						<div class="banner-pos-grid1">
							<div class="col-xs-4 banner-pos-grid1-left">
								<span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
							</div>
							<div class="col-xs-8 banner-pos-grid1-right">
								<h3>dolorem eum fugiat voluptate</h3>
							</div>
							<div class="clearfix"> </div>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</p>
						</div>
					</li>
					<li>
						<div class="banner-pos-grid1 banner-pos-grid2">
							<div class="col-xs-4 banner-pos-grid1-left">
								<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							</div>
							<div class="col-xs-8 banner-pos-grid1-right">
								<h3>dolorem eum fugiat voluptate</h3>
							</div>
							<div class="clearfix"> </div>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</p>
						</div>
					</li>
					<li>
						<div class="banner-pos-grid1 banner-pos-grid3">
							<div class="col-xs-4 banner-pos-grid1-left">
								<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
							</div>
							<div class="col-xs-8 banner-pos-grid1-right">
								<h3>dolorem eum fugiat voluptate</h3>
							</div>
							<div class="clearfix"> </div>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</p>
						</div>
					</li>
				</ul>
						<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: false,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 2
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>