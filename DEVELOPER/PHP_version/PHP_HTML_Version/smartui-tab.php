<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "SmartUI Tab Class";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["smartui"]["sub"]["tab"]["active"] = true;
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
				$tabs = array(
					'tab1' => 'My Tab', 
					'tab2' => 'My Tab 2', 
					'tab3' => 'My Tab 3'
				);
				$tab = $ui->create_tab($tabs);
				$tab->content('tab1', function() {
						return 'test content';
					})
					->content('tab2', 'Ths is Tab2 content')
					->content('tab3', 'this is Tab3 content');

				$dropdown_items = array(
					'<a href="javascript:void(0);">Some action</a>',
					'<a href="javascript:void(0);">Some other action</a>',
					'-',
					array(
						'content' => '<a tabindex="-1" href="javascript:void(0);">Hover me for more options</a>',
						'submenu' => array(
							'<a tabindex="-1" href="javascript:void(0);">Second level</a>',
							array(
								'content' => '<a href="javascript:void(0);">Even More..</a>',
								'submenu' => array(
									'<a href="javascript:void(0);">3rd level</a>',
									'<a href="javascript:void(0);">3rd level</a>'
								)
							),
							'<a href="javascript:void(0);">Second level</a>',
							'<a href="javascript:void(0);">Second level</a>'
						)
					)
				);
				$tab->dropdown('tab2', $dropdown_items);

				$tab->options('bordered', true);

				$tab->active('tab3', true);
				$tab->title('tab3', 'New Tab 3 Title <span class="badge bg-color-pinkDark txt-color-white">99</span>');

				$tab_html = $tab->print_html(true);

				// tab in widget
				$tab_widget = $ui->create_tab(array('My New Tab', 'This is a tab'));
				$tab_widget->content(0, 'This is a tab content #0');
				$tab_widget->content(1, 'THis is a tab content #1');

				$tab_widget->options('widget', true)->options('pull', 'right');
				$tab_widget_html = $tab_widget->print_html(true);

				$body = $tab_html.'<hr class="simple" />';

				$ui->create_widget()->body('content', $body)
					->options('editbutton', false)
				    ->header('title', '<h2>SmartUI::Tab</h2>')->print_html();

				echo $tab_widget_html;

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

							$md = file_get_contents("docs/smartui/tab.md");
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