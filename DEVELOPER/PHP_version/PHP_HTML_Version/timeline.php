<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Timeline";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["views"]["sub"]["timeline"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Other Pages"] = "";
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- row -->
		<div class="row">
		
			<!-- col -->
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-home"></i> Other Pages <span>>
					Timeline </span></h1>
			</div>
			<!-- end col -->
		
		<!-- right side of the page with the sparkline graphs -->
			<!-- col -->
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<!-- sparks -->
				<ul id="sparks">
					<li class="sparks-info">
						<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
						<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
							1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
						<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
						<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
				</ul>
				<!-- end sparks -->
			</div>
			<!-- end col -->
		
		</div>
		<!-- end row -->
		
		<!-- row -->
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
				<div class="well well-sm">
					<!-- Timeline Content -->
					<div class="smart-timeline">
						<ul class="smart-timeline-list">
							<li>
								<div class="smart-timeline-icon">
									<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny.png" width="32" height="32" />
								</div>
								<div class="smart-timeline-time">
									<small>just now</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<a href="javascript:void(0);"><strong>My New Car!</strong></a>
									</p>
									<p>
										Check out my new car guys, got a really good deal!
									</p>
									<p>
										<a href="javascript:void(0);" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the post</a>
									</p>
									<div class="row">
										<div class="col-sm-12">
											<img src="<?php echo ASSETS_URL; ?>/img/superbox/superbox-full-4.jpg" alt="img" width="200">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon">
									<i class="fa fa-file-text"></i>
								</div>
								<div class="smart-timeline-time">
									<small>1 min ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong>Meeting invite for "GENERAL GNU" [<a href="javascript:void(0);"><i>Go to my calendar</i></a>]</strong>
									</p>
									
									<div class="well well-sm display-inline">
										<p>Will you be able to attend the meeting - <strong> 10:00 am</strong> tomorrow?</p>
										<button class="btn btn-xs btn-default">Confirm Attendance</button>
									</div>		
												
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon bg-color-greenDark">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="smart-timeline-time">
									<small>5 hrs ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong class="txt-color-greenDark">24hrs User Feed</strong>
									</p>
									
									<div class="sparkline" 
									data-sparkline-type="compositeline" 
									data-sparkline-spotradius-top="5" 
									data-sparkline-color-top="#3a6965" 
									data-sparkline-line-width-top="3" 
									data-sparkline-color-bottom="#2b5c59" 
									data-sparkline-spot-color="#2b5c59" 
									data-sparkline-minspot-color-top="#97bfbf" 
									data-sparkline-maxspot-color-top="#c2cccc" 
									data-sparkline-highlightline-color-top="#cce8e4" 
									data-sparkline-highlightspot-color-top="#9dbdb9" 
									data-sparkline-width="200px" 
									data-sparkline-height="55px" 
									data-sparkline-line-val="[6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6]" 
									data-sparkline-bar-val="[4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7]"></div>
									
									<br>
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon">
									<i class="fa fa-user"></i>
								</div>
								<div class="smart-timeline-time">
									<small>yesterday</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<a href="javascript:void(0);"><strong>Update user information</strong></a>
									</p>
									<p>
										Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
									</p>
									
									Tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon">
									<i class="fa fa-pencil"></i>
								</div>
								<div class="smart-timeline-time">
									<small>12 Mar, 2013</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<a href="javascript:void(0);"><strong>Nabi Resource Report</strong></a>
									</p>
									<p>
										Ean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis.
									</p>
									<a href="javascript:void(0);" class="btn btn-xs btn-default">Read more</a>
								</div>
							</li>
							<li class="text-center">
								<a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-arrow-down text-muted"></i> LOAD MORE</a>
							</li>
						</ul>
					</div>
					<!-- END Timeline Content -->
		
				</div>
		
			</div>
		
		</div>
		
		<!-- end row -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	// include page footer
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>