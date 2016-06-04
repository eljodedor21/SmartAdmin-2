<?php

class Accordion extends SmartUI {

	private $_options_map = array(
		'global_icons' => array()
	);

	private $_structure = array(
		'panel' => array(),
		'id' => '',
		'header' => array(),
		'content' => array(),
		'expand' => array(),
		'padding' => array(),
		'icons' => array(),
		'options' => array()
	);

	public function __construct($panels, $options = array()) {
		$this->_options_map['global_icons'] = array(SmartUI::$icon_source.'-lg '.SmartUI::$icon_source.'-chevron-down pull-right', ''.SmartUI::$icon_source.'-lg '.SmartUI::$icon_source.'-chevron-up pull-right');
		$this->_init_structure($panels, $options);
	}

	private function _init_structure($panels, $user_options = array()) {
		$this->_structure = parent::array_to_object($this->_structure);
		$this->_structure->options = parent::set_array_prop_def($this->_options_map, $user_options);
		$this->_structure->id = parent::create_id(true);
		$this->_structure->panel = $panels;
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

	public function print_html($return = false) {
		$get_property_value = parent::_get_property_value_func();

		$that = $this;
		$structure = $this->_structure;

		$panels = $get_property_value($structure->panel, array(
			'if_closure' => function($panels) use ($that) {
				return SmartUI::run_callback($panels, array($that));
			},
			'if_other' => function($panels) {
				SmartUI::err('SmartUI::Accordion:panel requires array');
				return null;
			}
		));

		if (!is_array($panels)) {
			parent::err("SmartUI::Accordion:panel requires array");
			return null;
		}

		$panel_html_list = array();
		foreach ($panels as $panel_id => $panel_prop) {

			$panel_structure = array(
				'header' => isset($structure->header[$panel_id]) ? $structure->header[$panel_id] : '',
				'content' => isset($structure->content[$panel_id]) ? $structure->content[$panel_id] : '',
				'expand' => isset($structure->expand[$panel_id]) ? $structure->expand[$panel_id] : false,
				'padding' => isset($structure->padding[$panel_id]) ? $structure->padding[$panel_id] : null,
			);

			$new_panel_prop = parent::get_clean_structure($panel_structure, $panel_prop, array($this, $panels), 'header');

			foreach ($new_panel_prop as $panel_prop_key => $panel_prop_vaue) {
				$new_panel_prop_value = $get_property_value($panel_prop_vaue, array(
					'if_closure' => function($prop_value) use ($that, $panels) {
						return SmartUI::run_callback($prop_value, array($that, $panels));
					}
				));
				$new_panel_prop[$panel_prop_key] = $new_panel_prop_value;
			}

			// header
			$header_structure = array(
				'content' => '',
				'container' => 'h4',
				'icons' => isset($structure->icons[$panel_id]) ? $structure->icons[$panel_id] : $structure->options['global_icons']
			);
			$new_header_prop = parent::get_clean_structure($header_structure, $new_panel_prop['header'], array($that, $panels), 'content');

			$a_classes = array();
			if (!$new_panel_prop['expand']) $a_classes[] = 'collapsed';

			$a_attr = array();
			$a_attr[] = 'data-parent="#'.$structure->id.'"';
			$a_attr[] = 'href="#'.$panel_id.'"';
			$a_attr[] = 'data-toggle="collapse"';

			$icons = is_array($new_header_prop['icons']) ? implode(' ', array_map(function($icon){
				return '<i class="'.SmartUI::$icon_source.' '.$icon.'"></i> ';
			}, $new_header_prop['icons'])) : $new_header_prop['icons'];

			$body_classes = array();
			$body_classes[] = 'panel-body';

			if (isset($new_panel_prop['padding'])) {
				$body_classes[] = $new_panel_prop['padding'] ? 'padding-'.$new_panel_prop['padding'] : 'no-padding';
			}


			$panel_html = '<div class="panel panel-default">';
			$panel_html .= '	<div class="panel-heading">';
			$panel_html .= '		<'.$new_header_prop['container'].' class="panel-title">';

			$panel_html .= '			<a '.implode(' ', $a_attr).' class="'.implode(' ', $a_classes).'"> ';
			$panel_html .= 					$icons;
			$panel_html .= 					$new_header_prop['content'];
			$panel_html .= '			</a>';

			$panel_html .= '		</'.$new_header_prop['container'].'>';
			$panel_html .= '	</div>';

			$panel_html .= '	<div id="'.$panel_id.'" class="panel-collapse collapse '.($new_panel_prop['expand'] ? 'in' : '').'">';
			$panel_html .= '		<div class="'.implode(' ', $body_classes).'">';
			$panel_html .= 				$new_panel_prop['content'];
			$panel_html .= '		</div>';
			$panel_html .= '	</div>';
			$panel_html .= '</div>';

			$panel_html_list[] = $panel_html;
		}


		$result = '<div class="panel-group smart-accordion-default" id="'.$structure->id.'">';
		$result .= implode('', $panel_html_list);
		$result .= '</div>';

		if ($return) return $result;
		else echo $result;
	}
}

?>