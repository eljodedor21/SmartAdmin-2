<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Session Locked";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$page_css[] = "lockscreen.min.css";
$no_main_header = true;
include("inc/header.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">

	<!-- MAIN CONTENT -->

	<form class="lockscreen animated flipInY" action="<?php echo APP_URL; ?>/index.php">
		<div class="logo">
			<h1 class="semi-bold"><img src="<?php echo ASSETS_URL; ?>/img/logo-o.png" alt="" /> SmartAdmin</h1>
		</div>
		<div>
			<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny-big.png" alt="" width="120" height="120" />
			<div>
				<h1><i class="fa fa-user fa-3x text-muted air air-top-right hidden-mobile"></i>John Doe <small><i class="fa fa-lock text-muted"></i> &nbsp;Locked</small></h1>
				<p class="text-muted">
					<a href="mailto:simmons@smartadmin">john.doe@smartadmin.com</a>
				</p>

				<div class="input-group">
					<input class="form-control" type="password" placeholder="Password">
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-key"></i>
						</button>
					</div>
				</div>
				<p class="no-margin margin-top-5">
					Logged as someone else? <a href="<?php echo APP_URL; ?>/login.php"> Click here</a>
				</p>
			</div>

		</div>
		<p class="font-xs margin-top-5">
			Copyright SmartAdmin 2014-2020.

		</p>
	</form>

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