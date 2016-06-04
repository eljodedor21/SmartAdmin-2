<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Widgets PHP Class";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["widgets-php"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-list-alt fa-fw "></i> 
					Widgets
					<span>>
					Smart Widgets
					</span>
				</h1>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<ul id="sparks" class="">
					<li class="sparks-info">
						<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
						<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
							1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
						<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
						<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
				</ul>
			</div>
		</div>

		<!-- widget grid -->
		<section id="widget-grid" class="">
		
			<!-- row -->
			<div class="row">
				
				<!-- NEW WIDGET START -->
				<article class="col-xs-12">
					<?php
						$sui = new SmartUI;
						$options = array(
							"fullscreenbutton" => false,
						);
						$widget = $sui->create_widget($options);
						
						//you can also set options this way
						//$widget->options = $options;

						//set a widget property by passing closure
						$widget->attr = function($widget) {
							return 'data-custom-attr="test" data-some-id="12341111"';
						};

						//set a widget property by passing an array
						//$widget->attr = array("data-custom-attr"=>"test", "data-some-id" => "12341111");

						//set a widget property by passing string (some properties are required only to have strings)
						//$widget->attr = 'data-custom-attr="test" data-some-id="12341111"';

						//same as attr example, you can do the same with other widget properties
						//$widget->header = '<h2><strong>Default</strong> <i>Widget</i> PHP</h2>';
						
						//Let's do some dynamic content on the header. Passing toolbar and content keys to $widget->header
						$widget->header = array(
							"icon" => 'fa fa-check',
							"toolbar" => array(
								array(
									"id" => "toolbar-id",
									"content" => '<label class="input"> <i class="icon-append fa fa-question-circle"></i>
												<input type="text" placeholder="Focus to view the tooltip">
												<b class="tooltip tooltip-top-right">
													<i class="fa fa-warning txt-color-teal"></i> 
													Some helpful information</b> 
										</label>',
									"class" => 'smart-form'
								), 
								array(
									"attr" => array("data-cool-id" => "123454321"),
									"content" => '<div class="progress progress-striped active" rel="tooltip" data-original-title="55%" data-placement="bottom">
											<div class="progress-bar progress-bar-success" role="progressbar" style="width: 55%">55 %</div>
										</div>'
								),
								'<div class="label label-danger">
									<i class="fa fa-arrow-up"></i> 2.35% (Simple Toolbar)
								</div>'
							),
							"title" => "<h2>My PHP Widget</h2>"
						);

						$widget->class = "some-cool-class";
						$widget->id = "my-id-here";
						$widget->body = array(
							'editbox'=>'<input class="form-control" type="text">
								<span class="note"><i class="fa fa-check text-success"></i> Change title to update and save instantly!</span>',
							'content' => '<h2>Hello World!</h2><p>I just want to say that word in &lt;h2&gt;</p>',
							'toolbar' => '<div class="row">
										
										<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
												<input class="form-control" id="prepend" placeholder="Filter" type="text">
											</div>
										</div>
									</div>',
							//"class" => "no-padding"
						);

						$result = $widget->print_html(true);
						echo $result;
					?>
				</article>
				<!-- WIDGET END -->	
			</div>
		
			<!-- end row -->
			<!-- row -->
		
			<div class="row">
		
				<div class="col-sm-12">

					<?php
						$hb = new HTMLIndent();
						$html_snippet = SmartUtil::clean_html_string($hb->indent($result), false);
						$options = array(
							"editbutton" => false,
							"colorbutton" => false,
							"collapsed" => true
						);

						$contents = array(
							"body" => '<pre class="prettyprint linenums">'.$html_snippet.'</pre>',
							"header" => array(
								"icon" => 'fa fa-code',
								"title" => '<h2>HTML Output (Click &quot;+&quot; to expand)</h2>'
							)
						);

						$sui->create_widget($options, $contents)->color('pink')->print_html();

						//setting with callback and chaining (Like jQuery)
						$widget->body("content", "This is a new value using jQuery style setup.")
							->header("toolbar", '')
							->header("title", "<h2>Toolbar removed!!!</h2>")
							->color('darken', function($w) {
								$html_result = $w->print_html(true);
								$hb = new HTMLIndent();
								$html_snippet = SmartUtil::clean_html_string($hb->indent($html_result), false);
								$w->body("content", $w->body("content").'<br /><br /><pre class="prettyprint linenums">'.$html_snippet.'</pre>')->print_html();
						});

	
					?>
		
				</div>
		
			</div>

			<!-- end row -->

			<!-- row -->
		
			<div class="row">
		
				<div class="col-sm-12">
					<div class="well">
						<?php

							$md = file_get_contents("docs/smartui/widget.md");
							$parsedown = new Parsedown();
							$doc = $parsedown->parse($md);
							echo str_replace('<pre', '<pre class="prettyprint linenums"', $doc);

						?>				
					</div>
		
				</div>
		
			</div>

		
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	// include page footer
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
		
<script type="text/javascript">
	$(document).ready(function() {
	
		// switch style change
		$('input[name="checkbox-style"]').change(function() {
			//alert($(this).val())
			$this = $(this);
	
			if ($this.attr('value') === "switch-1") {
				$("#switch-1").show();
				$("#switch-2").hide();
			} else if ($this.attr('value') === "switch-2") {
				$("#switch-1").hide();
				$("#switch-2").show();
			}
	
		}); 
		
		// tab - pills toggle
		$('#show-tabs').click(function() {
			$this = $(this);
			if($this.prop('checked')){
				$("#widget-tab-1").removeClass("nav-pills").addClass("nav-tabs");
			} else {
				$("#widget-tab-1").removeClass("nav-tabs").addClass("nav-pills");
			}
			
		});			
	
	});

</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>