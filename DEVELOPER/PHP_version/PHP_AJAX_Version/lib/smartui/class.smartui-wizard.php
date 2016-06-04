<?php

class Wizard extends SmartUI {

	const WIZARD_BOOTSTRAP = 'bootstrap';
	const WIZARD_FUEL = 'fuel';

	private $_options_map = array(
		'in_widget' => true,
		'type' => Wizard::WIZARD_BOOTSTRAP
	);

	private $_structure = array(
		'options' => array(),
		'step' => array(),
		'content' => array(),
		'widget' => null,
		'active' => array(),
		'title' => '',
		'tabl_class' => 'form-wizard',
		'id' => ''
	);

	public function __construct($steps, $options = array()) {
		$this->_init_structure($steps, $options);
	}

	private function _init_structure($steps, $user_options = array()) {
		$this->_structure = parent::array_to_object($this->_structure);
		$this->_structure->options = parent::set_array_prop_def($this->_options_map, $user_options);
		$this->_structure->step = $steps;
		$this->_structure->id = parent::create_id(true);
		$ui = new parent();
		$widget = $ui->create_widget();
		$widget->options('editbutton', false)
		    ->header('title', '<h2></h2>');

		$this->_structure->widget = $widget;
	}

	public function __get($name) {
		if (isset($this->_structure->{$name})) {
            return $this->_structure->{$name};
        }
        SmartUI::err('Undefined structure property: '.$name);
        return null;
	}

	public function __set($name, $value) {
		if (isset($this->_structure->{$name})) {
            $this->_structure->{$name} = $value;
            return;
        }
		SmartUI::err('Undefined structure property: '.$name);
	}

	public function __call($name, $args) {
		return parent::_call($this, $this->_structure, $name, $args);
	}

	private function _get_bootstrap_result() {
		$get_property_value = parent::_get_property_value_func();

		$that = $this;
		$structure = $this->_structure;

		$steps = $get_property_value($structure->step, array(
			'if_closure' => function($steps) use ($that) {
				return SmartUI::run_callback($steps, array($that));
			},
			'if_other' => function($steps) {
				SmartUI::err('SmartUI::Wizard::step requires array');
				return null;
			}
		));

		if (!is_array($steps)) {
			parent::err("SmartUI::Wizard::step requires array");
			return null;
		}

		$li_list = array();
		$step_content_list = array();
		$has_active = false;
		$step = 1;
		foreach ($steps as $step_id => $step_prop) {
			$step_structure = array(
				'content' => isset($structure->content[$step_id]) ? $structure->content[$step_id] : '',
				'title' => isset($structure->title[$step_id]) ? $structure->title[$step_id] : '',
				'step' => $step,
				'active' => isset($structure->active[$step_id]) && $structure->active[$step_id] === true,
			);

			$new_step_prop = parent::get_clean_structure($step_structure, $step_prop, array($that, $steps, $step_id), 'title');

			foreach ($new_step_prop as $step_prop_key => $step_prop_vaue) {
				$new_step_prop_value = $get_property_value($step_prop_vaue, array(
					'if_closure' => function($prop_value) use ($that, $steps) {
						return SmartUI::run_callback($prop_value, array($that, $steps));
					}
				));
				$new_step_prop[$step_prop_key] = $new_step_prop_value;
			}

			$step_content_classes = array();
			$step_content_classes[] = 'tab-pane';
			$li_classes = array();
			$a_classes = array();
			$a_attr = array();

			if ((!$structure->active && !$has_active) || ($new_step_prop['active'] === true && !$has_active)) {
				$li_classes[] = 'active';
				$step_content_classes[] = 'active';
				$has_active = true;
			} 

			$title = $new_step_prop['title'];

			$href = '#'.$step_id;
			$a_attr[] = 'data-toggle="tab"';

			$class = $li_classes ? ' class="'.implode(' ', $li_classes).'"' : '';

			$li_html = '<li'.$class.' data-target="#'.$step_id.'">';
			$li_html .= '<a href="'.$href.'" '.($a_classes ? 'class="'.implode(' ', $a_classes).'"' : '').($a_attr ? ' '.implode(' ', $a_attr) : '').'>';
			$li_html .= '<span class="step">'.$new_step_prop['step'].'</span> <span class="title">'.$title.'</span>';
			$li_html .= '</a>';
			$li_html .= '</li>';
			$li_list[] = $li_html;

			$step_content_html = '<div class="'.implode(' ', $step_content_classes).'" id="'.$step_id.'">';
			$step_content_html .= $new_step_prop['content'];
			$step_content_html .= '</div>';
			$step_content_list[] = $step_content_html;

			$step++;
		}

		$ul_classes = array();
		$ul_classes[] = 'bootstrapWizard';
		$ul_classes[] = $structure->tabl_class;

		$content_classes = array();
		$content_classes[] = 'tab-content';
		$content_html = '<div class="'.implode(' ', $content_classes).'">';
		$content_html .= 	implode('', $step_content_list);
		$content_html .= '		<div class="form-actions">
									<div class="row">
										<div class="col-sm-12">
											<ul class="pager wizard no-margin">
												<!--<li class="previous first disabled">
												<a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
												</li>-->
												<li class="previous disabled">
													<a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
												</li>
												<!--<li class="next last">
												<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
												</li>-->
												<li class="next">
													<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
												</li>
											</ul>
										</div>
									</div>
								</div>';
		$content_html .= '</div>';

		

		$ul_html = '<div class="form-bootstrapWizard">';
		$ul_html .= '	<ul class="'.implode(' ', $ul_classes).'">';
		$ul_html .= 		implode('', $li_list);
		$ul_html .= '	</ul>';
		$ul_html .= '	<div class="clearfix"></div>';
		$ul_html .= '</div>';

		$main_content_html = '<div class="row">';
		$main_content_html .= '		<div class="col-sm-12" id="'.$structure->id.'">';
		$main_content_html .= 			$ul_html.$content_html;
		$main_content_html .= '		</div>';
		$main_content_html .= '</div>';

		
		if (isset($structure->options["in_widget"]) && $structure->options["in_widget"]) {
			$structure->widget->body("content", $main_content_html);
			if ($structure->title) {
				$structure->widget->header('title', $structure->title);
			}
			
			$result = $structure->widget->print_html(true);
		} else $result = $main_content_html;

		return $result;
	}

	private function _get_fuel_result() {
		
	}

	public function print_html($return = false) {
		switch ($this->_structure->options["type"]) {
			case Wizard::WIZARD_BOOTSTRAP:
				$result = self::_get_bootstrap_result();
				break;
			
			default:
				parent::err('SmartUI::Wizard Invalid Wizard Type: wizard "'.$this->_structure->options["type"].'" not found.');
				break;
		}

		if ($return) return $result;
		else echo $result;
	}
}

?>