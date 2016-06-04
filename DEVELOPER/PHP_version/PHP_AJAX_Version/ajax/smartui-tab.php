<?php

//initilize the page
require_once("inc/init.php");
?>
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