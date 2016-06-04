<?php

class Tab extends SmartUI {

	private $_options_map = array(
		'bordered' => true,
		'position' => '',
		'pull' => '',
		'padding' => 10,
		'widget' => false,
		'toggle' => true,
		'titles' => 'text'
	);

	private $_structure = array(
		'tab' => array(),
		'content' => array(),
		'url' => array(),
		'content_id' => '',
		'content_class' => '',
		'icon' => array(),
		'tabs_id' => '',
		'title' => array(),
		'options' => array(),
		'active' => array(),
		'dropdown' => array(),
		'position' => array()
	);

	public function __construct($tabs, $options = array()) {
		$this->_init_structure($tabs, $options);
	}

	private function _init_structure($tabs, $user_options = array()) {
		$this->_structure = parent::array_to_object($this->_structure);
		$this->_structure->options = parent::set_array_prop_def($this->_options_map, $user_options);

		$this->_structure->tab = $tabs;
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

		$structure->options = parent::set_array_prop_def($this->_options_map, $structure->options);

		$tabs = $get_property_value($structure->tab, array(
			'if_closure' => function($tabs) use ($that) {
				return SmartUI::run_callback($tabs, array($that));
			},
			'if_other' => function($tabs) {
				SmartUI::err('SmartUI::Tab::tab requires array');
				return null;
			}
		));

		if (!is_array($tabs)) {
			parent::err("SmartUI::Tab::tab requires array");
			return null;
		}

		$li_list = array();
		$tab_content_list = array();
		$has_active = false;
		foreach ($tabs as $tab_id => $tab_prop) {
			$tab_structure = array(
				'content' => isset($structure->content[$tab_id]) ? $structure->content[$tab_id] : '',
				'title' => isset($structure->title[$tab_id]) ? $structure->title[$tab_id] : '',
				'icon' => isset($structure->icon[$tab_id]) ? $structure->icon[$tab_id] : '',
				'dropdown' => isset($structure->dropdown[$tab_id]) ? $structure->dropdown[$tab_id] : '',
				'position' => isset($structure->position[$tab_id]) ? $structure->position[$tab_id] : '',
				'active' => isset($structure->active[$tab_id]) && $structure->active[$tab_id] === true,
				'fade' => false,
				'url' => isset($structure->url[$tab_id]) ? $structure->url[$tab_id] : '#'.$tab_id
			);

			$new_tab_prop = parent::get_clean_structure($tab_structure, $tab_prop, array($that, $tabs, $tab_id), 'title');

			foreach ($new_tab_prop as $tab_prop_key => $tab_prop_vaue) {
				$new_tab_prop_value = $get_property_value($tab_prop_vaue, array(
					'if_closure' => function($prop_value) use ($that, $tabs) {
						return SmartUI::run_callback($prop_value, array($that, $tabs));
					}
				));
				$new_tab_prop[$tab_prop_key] = $new_tab_prop_value;
			}

			$tab_content_classes = array();
			$tab_content_classes[] = 'tab-pane';
			$li_classes = array();
			$a_classes = array();
			$a_attr = array();

			if ($new_tab_prop['active'] === true && !$has_active) {
				$li_classes[] = 'active';
				$tab_content_classes[] = 'in active';
				$has_active = true;
			} 
			
			// $a_attr[] = 'title="'.$new_tab_prop['title'].'"';
			if (!$structure->options['titles']) {
				$title = '';
			} else if ($structure->options['titles'] == 'tooltip') {
				$title = '';
				$a_attr[] = 'rel="tooltip"';
				$a_attr[] = 'data-placement="top"';
				$a_attr[] = 'title="'.$new_tab_prop['title'].'"';
			} else {
				$title = $new_tab_prop['title'];
			}
			$dropdown_html = '';
			if ($new_tab_prop['dropdown']) {
				$dropdown = $new_tab_prop['dropdown'];
				$li_classes[] = 'dropdown';
				$href = 'javascript:void(0);';
				$dropdown_html = is_array($dropdown) ? parent::print_dropdown($dropdown, false, true) : $dropdown;
				$a_classes[] = 'dropdown-toggle';
				$a_attr[] = 'data-toggle="dropdown"';
				$title .= ' <b class="caret"></b>';
			} else {
				$href = $new_tab_prop['url'];
				if ($structure->options['toggle']) 
					$a_attr[] = 'data-toggle="tab"';
			}

			if ($new_tab_prop['position']) $li_classes[] = 'pull-'.$new_tab_prop['position'];
			$icon = $new_tab_prop['icon'] ? '<i class="'.SmartUI::$icon_source.' '.$new_tab_prop['icon'].'"></i> ' : '';
			$class = $li_classes ? ' class="'.implode(' ', $li_classes).'"' : '';

			$li_html = '<li'.$class.'>';
			$li_html .= '<a href="'.$href.'" '.($a_classes ? 'class="'.implode(' ', $a_classes).'"' : '').($a_attr ? ' '.implode(' ', $a_attr) : '').' rel="tooltip" data-placement="top">'.$icon.$title.'</a>';
			$li_html .= $dropdown_html;
			$li_html .= '</li>';
			$li_list[] = $li_html;

			if ($new_tab_prop['fade']) $tab_content_classes[] = 'fade';
			$tab_content_html = '<div class="'.implode(' ', $tab_content_classes).'" id="'.$tab_id.'">';
			$tab_content_html .= $new_tab_prop['content'];
			$tab_content_html .= '</div>';
			$tab_content_list[] = $tab_content_html;
		}

		$ul_classes = array();
		$ul_attr = array();
		$ul_classes[] = 'nav nav-tabs';
		$ul_id = $structure->tabs_id ? 'id="'.$structure->tabs_id.'"' : '';
		$ul_attr[] = $ul_id;
		
		$content_classes = array();
		$content_classes[] = 'tab-content';
		if ($structure->content_class)
			$content_classes[] = is_array($structure->content_class) ? implode(' ', $structure->content_class) : $structure->content_class;
		$content_id = $structure->content_id ? 'id="'.$structure->content_id.'"' : '';
		if ($structure->options['padding']) $content_classes[] = 'padding-'.$structure->options['padding'];
		$content_html = '<div class="'.implode(' ', $content_classes).'" '.$content_id.'>';
		$content_html .= implode('', $tab_content_list);
		$content_html .= '</div>';

		$main_content_html = '';
		if ($structure->options['widget']) {
			
			$ul_classes[] = $structure->options['pull'] ? 'pull-'.$structure->options['pull'] : 'pull-left';
			
			$ul_html = '<ul class="'.implode(' ', $ul_classes).'" '.implode(' ', $ul_attr).'>';
			$ul_html .= implode('', $li_list);
			$ul_html .= '</ul>';
			$widget = $structure->options['widget'];
			if (!$widget instanceof Widget) {
				$ui = new parent();
				$widget = $ui->create_widget();
			}

			$widget->body('content', $content_html);
			$widget->options('colorbutton', false)->options('editbutton', false);
			$widget->header('title', $ul_html);

			$result = $widget->print_html(true);
			
		} else {
			if ($structure->options['bordered']) $ul_classes[] = 'bordered';
			if ($structure->options['pull']) $ul_classes[] = 'tabs-pull-'.$structure->options['pull'];

			$ul_html = '<ul class="'.implode(' ', $ul_classes).'" '.implode(' ', $ul_attr).'>';
			$ul_html .= implode('', $li_list);
			$ul_html .= '</ul>';

			$container_classes = array();
			$container_classes[] = 'tabbable';
			switch ($structure->options['position']) {
				case 'right':
				case 'left':
					$container_classes[] = 'tabs-'.$structure->options['position'];
					$main_content_html = $ul_html.$content_html;
					break;
				case 'below':
					$container_classes[] = 'tabs-'.$structure->options['position'];
					$main_content_html = $content_html.$ul_html;
					break;
				default:
					$main_content_html = $ul_html.$content_html;
					break;
			}

			$result = '<div class="'.implode(' ', $container_classes).'">';
			$result .= $main_content_html;
			$result .= '</div>';
		}

		if ($return) return $result;
		else echo $result;
	}
}

?>