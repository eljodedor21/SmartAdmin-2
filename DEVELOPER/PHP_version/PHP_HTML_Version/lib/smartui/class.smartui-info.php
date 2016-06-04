<?php

class Info extends SmartUI {
	private $_options_map = array(
		'stripped' => false,
		'grouped' => false
	);

	private $_structure = array(
		'row' => array(),
		'options' => array(),
		'value' => array(),
		'name' => array(),
		'icon' => array(),
		'action' => array(),
		'title' => ''
	);

	public function __construct($rows, $options = array()) {
		$this->_init_structure($rows, $options);
	}

	private function _init_structure($rows, $user_options = array()) {
		$this->_structure = parent::array_to_object($this->_structure);
		$this->_structure->options = parent::set_array_prop_def($this->_options_map, $user_options);

		$this->_structure->row = $rows;
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

		$rows = $get_property_value($structure->row, array(
			'if_closure' => function($rows) use ($that) {
				return SmartUI::run_callback($rows, array($that));
			},
			'if_other' => function($rows) {
				SmartUI::err('SmartUI::ProfileInfo::row requires array');
				return null;
			}
		));

		if (!is_array($rows)) {
			parent::err("SmartUI::ProfileInfo::row requires array");
			return null;
		}

		$rows_html_list = array();

		foreach ($rows as $key => $info) {

			$row_prop = array(
				'icon' => isset($structure->icon[$key]) ? $structure->icon[$key] : '',
				'value' => isset($structure->value[$key]) ? $structure->value[$key] : '',
				'name' => isset($structure->name[$key]) ? $structure->name[$key] : $key,
				'action' => isset($structure->action[$key]) ? $structure->action[$key] : '',
			);

			$new_row_prop = parent::get_clean_structure($row_prop, $info, array($that, $rows, $key), 'value');

			$icon = $new_row_prop['icon'] ? '<i class="'.SmartUI::$icon_source.' '.$new_row_prop['icon'].'"></i> ' : '';
			
			$row_html = '<div class="info-row">';
			$row_html .= '	<div class="info-name"> '.$new_row_prop['name'].' </div>';
			$row_html .= '	<div class="info-action"> '.$new_row_prop['action'].' </div>';
			$row_html .= '	<div class="info-value"> '.$icon.$new_row_prop['value'].' </div>';
			$row_html .= '</div>';

			$rows_html_list[] = $row_html;
		}
		$classes = array();
		if ($structure->options['stripped']) $classes[] = 'info-stripped';
		if ($structure->options['grouped']) $classes[] = 'info-grouped';

		$result = '<div class="info'.($classes ? ' '.implode(' ', $classes) : '').'">';
		$result .= $structure->title ? '<div class="info-title">'.$structure->title.'</div>' : '';
		$result .= implode('', $rows_html_list);
		$result .= '</div>';

		if ($return) return $result;
		else echo $result;
	}
}

?>