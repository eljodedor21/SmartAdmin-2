<?php

//initilize the page
require_once("inc/init.php");

?>
		<section id="widget-grid" class="">
			
			<?php
				$ui = new SmartUI;
				$ui->start_track();
				
				$data = json_decode(file_get_contents(APP_URL.'/data/data.json'));

				// SmartForm layout
				
				$fields = array(
					'fname' => array(
						'type' => 'input', // or FormField::FORM_FIELD_INPUT
						'col' => 6,
						'properties' => array(
							'placeholder' => 'First name',
							'icon' => 'fa-user',
							'icon_append' => false
						)
					),
					'lname' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'placeholder' => 'Last name',
							'icon' => 'fa-user',
							'icon_append' => false
						)
					),
					'email' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'placeholder' => 'E-mail',
							'icon' => 'fa-envelope',
							'type' => 'email',
							'icon_append' => false
						)
					),
					'phone' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'placeholder' => 'Phone',
							'icon' => 'fa-phone',
							'type' => 'email',
							'icon_append' => false
						)
					),
					'country' => array(
						'type' => 'select',
						'col' => 5,
						'properties' => array(
							'data' => array(
								array('country' => 'Philippines'),
								array('country' => 'USA'),
								array('country' => 'Canada')
							)
						)
					),
					'city' => array(
						'type' => 'input',
						'col' => 4,
						'properties' => array(
							'placeholder' => 'City'
						)
					),
					'zip' => array(
						'type' => 'input',
						'col' => 3,
						'properties' => array(
							'placeholder' => 'Post Code'
						)
					),
					'address' => array(
						'type' => 'input',
						'properties' => 'Address'
					),
					'other-info' => array(
						'type' => 'textarea',
						'properties' => 'Additional Info'
					),
					'card' => array(
						'type' => 'radio',
						'properties' => array(
							'items' => array(array('label' => 'Visa', 'checked' => true), 'MasterCard', 'American Express'),
							'inline' => true
						)
					),
					'name-on-card' => array(
						'col' => 10,
						'properties' => 'Name on card'
					),
					'cvv' => array(
						'col' => 2,
						'properties' => 'CVV2'
					),
					'card-label' => array(
						'type' => 'label',
						'col' => 4,
						'properties' => 'Expiration Date'
					),
					'card-month' => array(
						'type' => 'select',
						'col' => 5,
						'properties' => array(
							'data' => array(
								array('month' => 'January'),
								array('month' => 'February'),
								array('month' => '...')
							)
						)
					),
					'card-year' => array(
						'col' => 3,
						'properties' => 'Year'
					)
				);

				$form = $ui->create_smartform($fields);
				$form->fieldset(0, array('fname', 'lname', 'email', 'phone'));
				$form->fieldset(1, array('country', 'city', 'zip', 'address', 'other-info'));
				$form->fieldset(2, array('card', 'name-on-card', 'cvv', 'card-label', 'card-month', 'card-year'));

				$form->header('Automatic Layout Creation!');
				$form->footer(function($this) use ($ui) {
					return $ui->create_button('Submit', 'primary')->attr(array('type' => 'submit'))->print_html(true);
				});

				$form->title('<h2>Auto Layout</h2>');
				$result = $form->print_html(true);
				echo $result;

				// individual print field
				$body = '
					
					<form class="smart-form">
						<header>Individual Print Fields (setup your own form HTML)</header>
						<fieldset>
							<div class="row">
								'.SmartForm::print_field('name', SmartForm::FORM_FIELD_INPUT, 
									array(
										'icon' => 'fa-user', 
										'tooltip' => 'Input name',
										'placeholder' => 'Name',
										'label' => 'Your Name',
										'note' => '<strong>Note:</strong> Type in something to autocomplete',
										'autocomplete' => array(
											'data' => $data,
											'display' => 'Name',
											'value' => 'Name'
										)
									), 6, true).'
								'.SmartForm::print_field('email', SmartForm::FORM_FIELD_INPUT, 
									array(
										'icon' => 'fa-envelope', 
										'tooltip' => 'This is a tooltip',
										'type' => 'email',
										'label' => 'Email Address',
										'placeholder' => 'myemail@domain.com'
									), 6, true).'
							</div>
							'.SmartForm::print_field('addr', SmartForm::FORM_FIELD_INPUT, 'Your Address (minimal setup)', 0, true).'
							<div class="row">
								'.SmartForm::print_field('file', SmartForm::FORM_FIELD_FILEINPUT, null, 6, true).'
								'.SmartForm::print_field('select', SmartForm::FORM_FIELD_SELECT, 
									array(
										'data' => $data,
										'value' => 'ID',
										'display' => 'Name'
									), 6, true).'
							</div>
							<div class="row">
								'.SmartForm::print_field('select', SmartForm::FORM_FIELD_MULTISELECT, 
									array(
										'data' => $data,
										'value' => 'ID',
										'display' => 'Name',
										'label' => 'Multi Select'
									), 6, true).'
							</div>
						</fieldset>
						<fieldset>
							'.SmartForm::print_field('textarea', SmartForm::FORM_FIELD_TEXTAREA, 
								array(
									'rows' => 4,
									'label' => 'Textarea',
									'type' => 'resizable'
								), null, true).'
						</fieldset>
						<fieldset>
							'.SmartForm::print_field('checkbox[]', SmartForm::FORM_FIELD_CHECKBOX, array(
								'items' => array('This is a checkbox', 'checkbox two', array(
										'name' => 'new-name',
										'checked' => true,
										'label' => 'A third checkbox',
									), '4th Checkbox', '5th checkBox'),
								'cols' => 3,
								'label' => 'Collumned Checkboxes'
							), null, true).'

							'.SmartForm::print_field('checkbox_inline[]', SmartForm::FORM_FIELD_CHECKBOX, array(
								'items' => array('one', 'two', array(
										'name' => 'new-name-inline',
										'checked' => true,
										'label' => 'three',
									), 'four', 'six'),
								'inline' => true,
								'label' => 'Inline!'
							), null, true).'

							'.SmartForm::print_field('solo', SmartForm::FORM_FIELD_CHECKBOX, 'One Checkbox only (minimal setup)', null, true).'
						</fieldset>
						<fieldset>
							'.SmartForm::print_field('radio', SmartForm::FORM_FIELD_RADIO, array(
								'items' => array('This is a Radio', 'Radio two', array(
										'name' => 'new-name',
										'checked' => true,
										'label' => 'A third Radio',
										'disabled' => true
									), '4th Radio', '5th Radio'),
								'cols' => 3,
								'label' => 'Collumned Radios'
							), null, true).'

							'.SmartForm::print_field('radio_inline', SmartForm::FORM_FIELD_RADIO, array(
								'items' => array('one', 'two', array(
										'name' => 'new-name-inline',
										'checked' => true,
										'label' => 'three',
									), 'four', 'six'),
								'inline' => true,
								'label' => 'Inline!'
							), null, true).'

							'.SmartForm::print_field('solo', SmartForm::FORM_FIELD_RADIO, 'One Radio only (minimal setup)', null, true).'
						</fieldset>
						<fieldset>
							<div class="row">
								'.SmartForm::print_field('toggle_checkbox', SmartForm::FORM_FIELD_CHECKBOX, array(
									'items' => array('Switch 1', 'Switch 2', 'Switch 3'),
									'toggle' => true,
									'label' => 'Checkbox Toggle'
								), 6, true).'

								'.SmartForm::print_field('toggle_checkbox', SmartForm::FORM_FIELD_RADIO, array(
									'items' => array('Switch 1', 'Switch 2', 'Switch 3'),
									'toggle' => true,
									'label' => 'Radio Toggle'
								), 6, true).'
							</div>
						</fieldset>
						<fieldset>
							'.SmartForm::print_field('rating-star', SmartForm::FORM_FIELD_RATING, 10, null, true).'
							'.SmartForm::print_field('rating-star2', SmartForm::FORM_FIELD_RATING, array(
								'max' => 8,
								'icon' => 'fa-asterisk',
								'label' => 'Rating',
								'note' => '<strong>Note:</strong> This is a customized rating field'
							), null, true).'

						</fieldset>
						<fieldset>
							'.SmartForm::print_field('rating-multiple', SmartForm::FORM_FIELD_RATINGS, array(
								'items' => array(
									array(
										'max' => 6,
										'icon' => 'fa-trophy',
										'label' => 'The Rating'
									), 3, 7, 10, 20
								),
								'label' => 'Multiple Ratings? No problem!'
							), null, true).'
						</fieldset>
						<footer>
							'.$ui->create_button('Submit', 'primary')->container('button')->attr(array('type' => 'submit'))->print_html(true).'
						</footer>
					</form>

				';

				$ui->create_widget()->body('content', $body)
					->options('editbutton', false)
					->body('class', 'no-padding')
				    ->header('title', '<h2>SmartUI::SmartForm</h2>')->print_html();


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
							$md = file_get_contents("docs/smartui/smartform.md");
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