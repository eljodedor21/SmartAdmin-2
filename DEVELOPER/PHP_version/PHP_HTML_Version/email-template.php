<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Blank Page";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["misc"]["sub"]["email_template"]["active"] = true;
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

		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1 class="page-title txt-color-blueDark">
					
					<!-- PAGE HEADER -->
					<i class="icon-fixed-width icon-home"></i> 
						Email Template 
					<span>>  
						Responsive Email templates!
					</span>
				</h1>
			</div>
			
		</div>

		<!-- row -->
		<div class="row">
			
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
				<img src="<?php echo ASSETS_URL; ?>/img/demo/basic.png" alt="Basic Email Template" style="width:100%; height:auto;">
				<br>
				<br>
				<a href="../../COMMON_ASSETS/GOODIES/email-templates/basic.html" target="_blank" class="btn btn-primary btn-block">Basic Email Template</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
				<img src="<?php echo ASSETS_URL; ?>/img/demo/sidebar.png" alt="Sidebar Email Template" style="width:100%; height:auto;">
				<br>
				<br>
				<a href="../../COMMON_ASSETS/GOODIES/email-templates/sidebar.html" target="_blank" class="btn btn-primary btn-block">Sidebar Email Template</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
				<img src="<?php echo ASSETS_URL; ?>/img/demo/hero.png" alt="Hero Email Template" style="width:100%; height:auto;">
				<br>
				<br>
				<a href="../../COMMON_ASSETS/GOODIES/email-templates/hero.html" target="_blank" class="btn btn-primary btn-block">Hero Email Template</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
				<img src="<?php echo ASSETS_URL; ?>/img/demo/sidebarhero.png" alt="Sidebar with Hero" style="width:100%; height:auto;">
				<br>
				<br>
				<a href="../../COMMON_ASSETS/GOODIES/email-templates/sidebar-hero.html" target="_blank" class="btn btn-primary btn-block">Sidebar with Hero</a>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
				<img src="<?php echo ASSETS_URL; ?>/img/demo/newsletter.png" alt="Newsletter Email Template" style="width:100%; height:auto;">
				<br>
				<br>
				<a href="../../COMMON_ASSETS/GOODIES/email-templates/newsletter.html" target="_blank" class="btn btn-primary btn-block">Newsletter Template</a>
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

<script type="text/javascript">

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>


<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>