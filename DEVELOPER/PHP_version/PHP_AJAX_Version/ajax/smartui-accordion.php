<?php

//initilize the page
require_once("inc/init.php");
?>
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
	
</script>