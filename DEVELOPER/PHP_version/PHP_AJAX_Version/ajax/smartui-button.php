<?php

//initilize the page
require_once("inc/init.php");
?>
		<section id="widget-grid" class="">
			<?php
				$ui = new SmartUI;
				$btn_simple = $ui->create_button('Click Me!', 'danger')
					->attr('href', 'http://facebook.com')->attr('target', '_blank')
				    ->icon('fa-gear')
				    ->print_html(true);

				$btn_spinning = $ui->create_button('', 'success')
					->class(array('bg-color-green', 'txt-color-white'))
					->icon('fa-refresh fa-4x fa-spin')
					->print_html(true);

				$btn_circle = $ui->create_button('', 'primary')
					->class('btn-circle')->size('lg')
					->icon('fa-check')->print_html(true);

				$btn_labeled = $ui->create_button('A Labeled Button', 'success')
					->icon('fa-check')
					->options('labeled', true)
					->print_html(true);

				// dropdown
				$items = array(
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

				$dropdown = $ui->create_button('Simple Dropdown')
				    ->dropdown('items', $items)->dropdown('split', false)
				    ->print_html(true);

				$dropdown_split = $ui->create_button('Split Dropdown')
					->dropdown('items', $items)->dropdown(
						'split', array( // set to 'true' for defaults, or string for the type key
							'type' => 'success',
							'disabled' => false,
							'dropup' => false,
							'class' => array('class-1', 'class-2', 'class-custom'),
							'attr' => array('data-custom-attr' => '12345')
						)
					)
					->dropdown('multilevel', true)
					->attr('href', 'http://twitter.com')->attr('data-custom-id', '34343')
					->size(Button::BUTTON_SIZE_XSMALL)
					->print_html(true);

				$run_time = $ui->run_time(false);


				$widget = $ui->create_widget();
				$body = $btn_simple.$btn_spinning.$btn_circle.$btn_labeled.'
					<hr class="simple" />
					'.$dropdown.'
					<hr class="simple" />
					'.$dropdown_split;
				$widget->body('content', $body)
					->options('editbutton', false)
				    ->header('title', '<h2>SmartUI::Button</h2>')->print_html();

				$options = array(
					"editbutton" => false,
					"colorbutton" => false,
					"collapsed" => true
				);

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

				$ui->create_widget($options, $contents)->color('pink')->print_html();
			?>
			<div class="row">
		
				<div class="col-sm-12">
					<div class="well">
						<?php

							$md = file_get_contents("docs/smartui/button.md");
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