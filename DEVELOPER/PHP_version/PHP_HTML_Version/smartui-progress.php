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
$page_nav["smartui"]["sub"]["general"]["sub"]["progress"]["active"] = true;
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
					
					// smartui code
					
					$prg_simple = SmartUI::print_progress(33, 'info', null, true);
					$prg_danger_right_striped_active = SmartUI::print_progress(55.5, 'danger', 
						array(
							'position' => 'right', 
							'striped' => 'active',
							'tooltip' => 'This is tooltip'
						), true
					);
					$prg_small_striped = SmartUI::print_progress(20, '', 
						array(
							'background' => 'redLight', 
							'size' => 'sm', 
							'striped' => true
						), true
					);
					$prg_micro = SmartUI::print_progress(60, '', 
						array(
							'background' => 'greenLight', 
							'size' => 'micro'
						), true
					);
					$prg_trans = SmartUI::print_progress('21%', 'success', array('transitional' => true), true);
					$prg_trans_vertical_bottom = SmartUI::print_progress('80%', '', 
						array(
							'transitional' => true, 
							'vertical' => true,
							'position' => 'bottom',
							'background' => 'redLight'
						), true
					);
					$prg_trans_vertical = SmartUI::print_progress('80%', 'primary', 
						array(
							'transitional' => true, 
							'vertical' => true,
						), true
					);


					// stack progress bars
					$prg_stack = array();
					$prg_stack[] = SmartUI::get_progress(80, '', array('background' => 'redLight'));
					$prg_stack[] = SmartUI::get_progress(55, 'info');
					$prg_stack[] = SmartUI::get_progress(33, 'success');
					$prg_stack_progress = SmartUI::print_stack_progress($prg_stack, array('size' => 'sm', 'tooltip' => 'Stacked Progress', 'striped' => 'active'), true);

					$body = $prg_simple
						.$prg_micro
						.$prg_small_striped
						.$prg_danger_right_striped_active
						.$prg_trans
						.$prg_trans_vertical
						.$prg_trans_vertical_bottom
						.$prg_stack_progress;

					$ui->create_widget()->body('content', $body)
					    ->header('title', '<h2>SmartUI Alerts</h2>')->print_html();

					// print html output
					$run_time = $ui->run_time(false);
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

							$md = file_get_contents("docs/smartui/progress.md");
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
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>