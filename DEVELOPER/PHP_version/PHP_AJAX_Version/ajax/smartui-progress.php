<?php

//initilize the page
require_once("inc/init.php");
?>
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

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 * 
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 * 
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 * 
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 * 
	 * // activate inline charts
	 * runAllCharts();
	 * 
	 * // setup widgets
	 * setup_widgets_desktop();
	 * 
	 * //setup nav height (dynamic)
	 * nav_page_height();
	 * 
	 * // run form elements
	 * runAllForms();
	 * 
	 ********************************
	 * 
	 * pageSetUp() is needed whenever you load a page. 
	 * It initializes and checks for all basic elements of the page 
	 * and makes rendering easier.
	 * 
	 */	
	 
	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 */

	loadScript('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js');

	// load bootstrap-progress bar script
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-progressbar/bootstrap-progressbar.min.js", progressBarAnimate);

	// Fill all progress bars with animation
	function progressBarAnimate() {
		$('.progress-bar').progressbar({
			display_text : 'fill'
		});
	}
	
	
</script>