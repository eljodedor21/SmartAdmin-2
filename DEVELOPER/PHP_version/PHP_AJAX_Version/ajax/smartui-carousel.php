<?php

//initilize the page
require_once("inc/init.php");

?>
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