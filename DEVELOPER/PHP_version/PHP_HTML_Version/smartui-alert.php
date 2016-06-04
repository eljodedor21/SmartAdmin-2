<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "SmartUI General Elements";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["smartui"]["sub"]["general"]["sub"]["alert"]["active"] = true;
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
		<section id="widget-grid" class="">
			<?php
				$ui = new SmartUI;
				$ui->start_track();
				$alert_success = SmartUI::print_alert('<strong>Success</strong> The page has been added.', 'success', array(), true);
				$alert_danger = SmartUI::print_alert('<strong>Success</strong> Opps!!!', 'danger', array('closebutton'=>false), true);
				$alert_options = SmartUI::print_alert('<h4 class="alert-heading">Warning!</h4>
						Best check yo self, you\'re not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.', 'warning', array('block' => true, 'closebutton' => false, 'icon' => false), true);

				// snippet
				$body = $alert_success.$alert_danger.$alert_options;
				$run_time = $ui->run_time(false);

				$ui->create_widget()->body('content', $body)
				    ->header('title', '<h2>SmartUI Alerts</h2>')->print_html();

				// print html output
				$hb = new HTMLIndent();
				$html_snippet = SmartUtil::clean_html_string($hb->indent($body), false);
				$contents = array(
					"body" => '<pre class="prettyprint linenums">'.$html_snippet.'</pre>',
					"header" => array(
						"icon" => 'fa fa-code',
						"title" => '<h2>HTML Output (Run Time: '.$run_time.')</h2>'
					)
				);
				$options = array(
					"editbutton" => false,
					"colorbutton" => false,
					"collapsed" => true
				);
				$ui->create_widget($options, $contents)->color('pink')->print_html();
			?>
			<div class="row">
		
				<div class="col-sm-12">
					<div class="well">
						<?php

							$md = file_get_contents("docs/smartui/alert.md");
							$parsedown = new Parsedown();
							$doc = $parsedown->parse($md);
							echo str_replace('<pre', '<pre class="prettyprint linenums"', $doc);

						?>				
					</div>
		
				</div>
		
			</div>
		</section>
	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>