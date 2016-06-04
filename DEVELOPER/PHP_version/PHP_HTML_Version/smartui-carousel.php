<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "SmartUI Carousel";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["smartui"]["sub"]["carousel"]["active"] = true;
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
				
				$items = array(
					ASSETS_URL."/img/demo/m3.jpg",
					ASSETS_URL."/img/demo/m1.jpg",
					ASSETS_URL."/img/demo/m2.jpg",
				);

				$carousel1 = $ui->create_carousel($items);
				$carousel1->caption(0, '<h4>Title 1</h4>
					<p>
						Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
					</p>
					<br>
					<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>'
				);

				$carousel2 = $ui->create_carousel(array(
					'item1' => ASSETS_URL."/img/demo/s1.jpg",
					'item2' => array(
						'img' => ASSETS_URL."/img/demo/s2.jpg",
						'caption' => 
							'<h4>S2 Background Image</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
							<br>
							<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>'
					),
					'item3' => array(
						'img' => array(
							'src' => ASSETS_URL."/img/demo/s3.jpg",
							'alt' => 'This is s3 image'
						)
					)
				), 'fade');

				$carousel2->caption('item3', '<h4>S3 Background Image</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
							<br>
							<a href="javascript:void(0);" class="btn btn-info btn-sm">Read more</a>');

				$body = '<div class="row">';
				$body .='	<div class="col-sm-12 col-md-12 col-lg-6">';
				$body .=		$carousel1->print_html(true);
				$body .= '	</div>';
				$body .= '	<div class="col-sm-12 col-md-12 col-lg-6">';
				$body .= 		$carousel2->print_html(true);
				$body .= '	</div>';
				$body .= '</div>';

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
							$md = file_get_contents("docs/smartui/carousel.md");
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