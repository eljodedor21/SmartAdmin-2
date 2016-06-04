<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "SmartUI Accordion";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["smartui"]["sub"]["accordion"]["active"] = true;
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
				$panels = array(
					'panel1' => 'Collapsible Group Item #1',
					'panel2' => 'Collapsible Group Item #2',
					'panel3' => 'Collapsible Group Item #3'
				);
				$accordion = $ui->create_accordion($panels);

				$accordion->content('panel1', 
					'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.'
				);

				$accordion->content('panel2', function($this, $panels) use ($ui) {
					$data = json_decode(file_get_contents(APP_URL."/data/data.json"));
					$dt = $ui->create_datatable($data)->options('in_widget', false);
					return $dt->print_html(true);
				})->padding('panel2', false)->expand('panel2', true);

				$accordion->icons('panel2', array('fa fa-fw fa-plus-circle txt-color-green pull-right', 'fa-fw fa-minus-circle txt-color-red pull-right'));

				$accordion_html = $accordion->print_html(true);
				$body = $accordion_html;

				$ui->create_widget()->body('content', $body)
					->options('editbutton', false)
				    ->header('title', '<h2>SmartUI::Accordion</h2>')->print_html();

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
							$md = file_get_contents("docs/smartui/accordion.md");
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
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});
	})

</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>