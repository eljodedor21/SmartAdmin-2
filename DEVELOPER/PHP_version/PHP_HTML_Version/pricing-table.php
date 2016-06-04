<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Pricing Tables";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["misc"]["sub"]["pricing_tables"]["active"] = true;
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

		<div class="row">
			
			<div class="col-sm-12">
				
				<div class="well well-light">
					
					<h1>Professional, <small>4 Plans</small></h1>
					<div class="row">
						
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-success pricing-big">
				            	
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Light version</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            <strong>FREE</strong></h1>
				                    </div>
									<div class="price-features">
										<ul class="list-unstyled text-left">
								          <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
								          <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
								          <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
								          <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
								          <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
								        </ul>
									</div>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Download <span> now!</span></a>
				                	<div>
				                		Or <a href="javascript:void(0);">Sign up</a>
				                	</div>
				                </div>
				            </div>
				        </div>
				        
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-teal pricing-big">
				            	
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Personal Project</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $99<span class="subscript">/ mo</span></h1>
				                    </div>
									<div class="price-features">
										<ul class="list-unstyled text-left">
								          <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
								          <li><i class="fa fa-check text-success"></i> Superbig <strong> download quota</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
								          <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> access to all files</li>
								          <li><i class="fa fa-check text-success"></i> <strong>Allowed</strong> to be exclusing per sale</li>
								        </ul>
									</div>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Purchase <span>via Paypal</span></a>
				                	<div>
				                		<a href="javascript:void(0);"><i>We accept all major credit cards</i></a>
				                	</div>
				                </div>
				            </div>
				        </div>
				        
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-primary pricing-big">
				            	<img src="<?php echo ASSETS_URL; ?>/img/ribbon.png" class="ribbon" alt="">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Developer Bundle</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $350<span class="subscript">/ mo</span></h1>
				                    </div>
									<div class="price-features">
										<ul class="list-unstyled text-left">
								          <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
								          <li><i class="fa fa-check text-success"></i> Superbig <strong> download quota</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
								          <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> access to all files</li>
								          <li><i class="fa fa-check text-success"></i> <strong>Allowed</strong> to be exclusing per sale</li>
								        </ul>
									</div>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Purchase <span>via Paypal</span></a>
				                	<div>
				                		<a href="javascript:void(0);"><i>We accept all major credit cards</i></a>
				                	</div>
				                </div>
				            </div>
				        </div>
				        
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-darken pricing-big">
				            	
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Premium Package</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $999<span class="subscript">/ mo</span></h1>
				                    </div>
									<div class="price-features">
										<ul class="list-unstyled text-left">
								          <li><i class="fa fa-check text-success"></i> Lifetime access <strong> to all storage locations</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
								          <li><i class="fa fa-check text-success"></i> Superbig <strong> download quota</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
								          <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
								          <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> access to all files</li>
								          <li><i class="fa fa-check text-success"></i> <strong>Allowed</strong> to be exclusing per sale</li>
								        </ul>
									</div>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Purchase <span>via Paypal</span></a>
				                	<div>
				                		<a href="javascript:void(0);"><i>We accept all major credit cards</i></a>
				                	</div>
				                </div>
				            </div>
				        </div>		    	
		    		</div>
		
					<hr>
					
					<h1>Simple, <small>4 Plans</small></h1>
					<div class="row">
						
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-darken">
				            	
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Bronze</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $10<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                1 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                1 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                100K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                100MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-success" role="button">Sign Up</a>
				                    1 month FREE trial</div>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-primary">
				                <img src="<?php echo ASSETS_URL; ?>/img/ribbon.png" class="ribbon" alt="">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Silver</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $20<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                2 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                5 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                100K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                200MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-success" role="button">Sign Up</a>
				                    1 month FREE trial</div>
				            </div>
				        </div>		       
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-greenLight">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Gold</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $35<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                5 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                20 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                300K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                500MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-success" role="button">Sign Up</a> 1 month FREE trial</div>
				            </div>
				        </div>		        
				        <div class="col-xs-12 col-sm-6 col-md-3">
				            <div class="panel panel-primary">
				                <div class="panel-heading bg-color-blueDark txt-color-white">
				                    <h3 class="panel-title">
				                        Diamond</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $99<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                Unlimited Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                3000K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer text-align-center">
				                    <a href="javascript:void(0);" class="btn btn-success" role="button">Sign Up</a> 1 month FREE trial</div>
				            </div>
				        </div>
				    			    	
		    		</div>
		
					<hr>
					
					<h1>Simple, <small>6 Plans</small></h1>
					<div class="row">
						
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-orange">
				            	
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Bronze</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $10<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                1 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                1 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                100K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                100MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-orange txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-purple">
				                <img src="<?php echo ASSETS_URL; ?>/img/ribbon.png" class="ribbon" alt="">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Silver</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $20<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                2 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                5 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                100K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                200MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-purple txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>		       
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-greenLight">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Gold</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $35<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                5 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                20 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                300K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                500MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-greenLight txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>		        
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-blue">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Diamond</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $99<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                Unlimited Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                3000K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-blue txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-redLight">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Gold</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $35<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                5 Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                20 Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                300K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                500MB Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-redLight txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>		        
				        <div class="col-xs-12 col-sm-4 col-md-2">
				            <div class="panel panel-pink">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                        Diamond</h3>
				                </div>
				                <div class="panel-body no-padding text-align-center">
				                    <div class="the-price">
				                        <h1>
				                            $99<span class="subscript">/mo</span></h1>
				                        <small>1 month FREE trial</small>
				                    </div>
				                    <table class="table">
				                        <tr>
				                            <td>
				                                Unlimited Account
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Project
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                3000K API Access
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Unlimited Storage
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>
				                                Custom Cloud Services
				                            </td>
				                        </tr>
				                        <tr class="active">
				                            <td>
				                                Weekly Reports
				                            </td>
				                        </tr>
				                    </table>
				                </div>
				                <div class="panel-footer no-padding">
				                    <a href="javascript:void(0);" class="btn bg-color-pink txt-color-white btn-block" role="button">Sign Up</a>
				                </div>
				            </div>
				        </div>
				    			    			    	
		    		</div>			
					
				</div>
				
			</div>
			
		</div>


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

<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>