<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Error 404";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["misc"]["sub"]["err_404"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		$breadcrumbs["Misc"] = "";
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- row -->
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center error-box">
							<h1 class="error-text-2 bounceInDown animated"> Error 404 <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>
							<h2 class="font-xl"><strong><i class="fa fa-fw fa-warning fa-lg text-warning"></i> Page <u>Not</u> Found</strong></h2>
							<br />
							<p class="lead">
								The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from
							</p>
							<p class="font-md">
								<b>... That didn't work on you? Dang. May we suggest a search, then?</b>
							</p>
							<br>
							<div class="error-search well well-lg padding-10">
								<div class="input-group">
									<input class="form-control input-lg" type="text" placeholder="let's try this again" id="search-error">
									<span class="input-group-addon"><i class="fa fa-fw fa-lg fa-search"></i></span>
								</div>
							</div>
		
							<div class="row">
		
								<div class="col-sm-12">
									<ul class="list-inline">
										<li>
											&nbsp;<a href="javascript:void(0);">Dashbaord</a>&nbsp;
										</li>
										<li>
											.
										</li>
										<li>
											&nbsp;<a href="javascript:void(0);">Inbox (14)</a>&nbsp;
										</li>
										<li>
											.
										</li>
										<li>
											&nbsp;<a href="javascript:void(0);">Calendar</a>&nbsp;
										</li>
										<li>
											.
										</li>
										<li>
											&nbsp;<a href="javascript:void(0);">Gallery</a>&nbsp;
										</li>
										<li>
											.
										</li>
										<li>
											&nbsp;<a href="javascript:void(0);">My Profile</a>&nbsp;
										</li>
									</ul>
								</div>
		
							</div>
		
						</div>
		
					</div>
		
				</div>
		
			</div>

		<!-- end row -->

	</div>
	
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
