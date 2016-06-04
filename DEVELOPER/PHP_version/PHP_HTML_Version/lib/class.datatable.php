<?php

class DataTable {
    private $_uid;
    private $_table_properties;
    public $title = "DataTable Result Set";
    public $color = "darken";
    public $no_data_text = "No Data";
    public $cols_hidden_mobile = array();
    public $cols_hidden_tablet = array();
    public $cols_hidden = array();
    public $cols_icon = array();
    public $cols_sorting = array();
    public $row_actions = array();
    public $row_detail = null;
    public $col_cells = array();
    public $row_checkbox = null;
    public $data = array();
    public $toolbar = null;
    public $pagination = true;
    public $custom_dtable_prop = null;
    
    public function __construct($data, $static=false, $in_widget=true, $hover=true) {
        $this->_uid = md5($this->create_id());
        $this->data = $data;
        $this->_static = $static;
        $this->_table_properties->static = $static;
        $this->_table_properties->in_widget = $in_widget;
        $this->_table_properties->hover = $hover;
    }
    
    private function create_id($md5=false) {
        $uid = substr(uniqid((double)microtime() * 10000, 1), 0, 12);
        $result = str_replace(".", "", $uid);
        $result = $md5 ? md5($result) : $result;
        return $result;
    }

    private function object_to_array($object) {
        if (!is_object($object) && !is_array($object))
            return $object;
        
        if (is_object($object))
            $object = get_object_vars($object);
            
        return array_map(array($this, 'object_to_array'), $object);
    }

    public function get_otable_var() {
        return 'oTable'.$this->_uid;
    }
    
    public function get_table_id() {
        return $this->_uid."_table";
    }
    
    public function row_count() {
        return $this->data ? count($this->data) : 0;
    }
    
    private function is_closure($obj) {
        return (is_object($obj) && (($obj instanceof SuperClosure) || ($obj instanceof Closure)));   
    }
    
    private function map_cols($col) {
        $th_class = 'class="';
        $th_class .= in_array($col, $this->cols_hidden_tablet) ? " hidden-tablet " : "";
        $th_class .= in_array($col, $this->cols_hidden_mobile) ? " hidden-phone " : "";
        $col_icon = isset($this->cols_icon[$col]) ? '<i class="fa fa-lg '.$this->cols_icon[$col].' '.$th_class.'"></i> ' : '';
        $th_class .= '"';
        
        $result = '<th '.$th_class.'>'.$col_icon.''.$col.'</th>
        ';
        return $result;
    }
    
    private function replace_col_codes($str, $row, $url_encode=false) {
        preg_match_all("/\{([^&={}]+)\}/", $str, $matched_cols);
        $col_replace = array();
        $col_search = array();
        foreach($matched_cols[1] as $matched_col) {
            if (isset($row[$matched_col])) {
                $col_replace[] = $url_encode ? urlencode($row[$matched_col]) : $row[$matched_col];    
                $col_search[] = "/{".$matched_col."}/";
            }
        }
        return preg_replace($col_search, $col_replace, $str);
    }
    
    private function get_detail_content($detail, $cols) {
        $result = "";
        if ($this->is_closure($detail)) {
            $cols_list = new stdClass;
            foreach ($cols as $col) 
                $cols_list->{$col} = '{'.$col.'}';
            
            $str = $detail($cols_list);
            $result = 'return \''.$this->replace_detail_codes($str, $cols).'\';';
            
        } else if (is_array($detail)) {
            if (isset($detail["custom"])) {
                $result = $this->replace_detail_codes($detail['code'], $cols, true);
            }
        } else $result = 'return \''.$this->replace_detail_codes($detail, $cols).'\';';
        
        return $result;
    }
    
    private function replace_detail_codes($str, $cols, $custom_code = false) {
        preg_match_all("/\{([^{}]+)\}/", $str, $matched_cols);
        $col_replace = array();
        $col_search = array();
        foreach($matched_cols[1] as $matched_col) {
            $arr_col_index = array_keys($cols, $matched_col);
            if ($arr_col_index) {
                $col_index = !is_null($this->row_detail) ? $arr_col_index[0] + 1 : $arr_col_index[0];
                $col_index = !is_null($this->row_checkbox) ? $col_index + 1 : $col_index;
                $col_replace[] = $custom_code ? 'aData['.$col_index.']' : '\'+aData['.$col_index.']+\'';    
                $col_search[] = "/{".$matched_col."}/";
            }
        }
        $result = preg_replace($col_search, $col_replace, $str);
        return preg_replace('/\s+/', ' ', $result); //remove white spaces
    }
    
    private function map_js_cols($col) {
        return "null";
    }
    
    private function map_rows($row) {
        $result = '';
        
        foreach ($row as $col => $cell_value) {
            $cell = $cell_value;
            $td_class = 'class="';
            $td_class .= in_array($col, $this->cols_hidden_tablet) ? " hidden-tablet " : "";
            $td_class .= in_array($col, $this->cols_hidden_mobile) ? " hidden-phone " : "";
            $td_class .= '"';
            
            $cell_icon = "";
            $cell_html = "";
            if (isset($this->col_cells[$col])) {
                $prop = $this->col_cells[$col]; 
                if ($this->is_closure($prop)) {
                    $cell = $prop($cell_value, $row);
                } else {
                    //icon
                    $cell_icon = isset($prop['icon']) ? '<i class="fa '.$prop['icon'].' fa-md"></i> ' : '';
                    if (isset($prop["icon"])) {
                        $icon_prop = $prop["icon"];
                        if (is_array($icon_prop)) {
                            
                        } else if ($this->is_closure($icon_prop)) {
                            $cell_icon = $icon_prop($cell_value, $row);
                        } else {
                            $cell_icon = '<i class="fa '.$icon_prop.' fa-md"></i>';
                        }
                    }
                    
                    //html                
                    if (isset($prop["html"])) {
                        $html_prop = $prop["html"];
                        if (is_array($html_prop)) {
                            
                        } else if ($this->is_closure($html_prop)) {
                            $cell_html = $this->replace_col_codes($html_prop($cell_value, $row), $this->object_to_array($row));
                        } else {
                            $cell_html = $html_prop;
                        }
                    }
                    
                    //url
                    if (isset($prop['url'])) {
                        $url_prop = $prop['url'];
                        $cell_tooltip_attr = '';
                        $cell_url_title = '';
                        $cell_url_target = '_self';
                        if (is_array($url_prop)) { //array of additional url options
                            $cell_url_target = isset($url_prop['target']) ? $url_prop['target'] : "_self";
                            $cell_url = isset($url_prop['href']) ? $this->replace_col_codes($url_prop['href'], $this->object_to_array($row), true) : '#';
                            $cell_tooltip_attr = isset($url_prop['tooltip']) && $url_prop['tooltip'] ? 'class="'.$url_prop['tooltip'].' desktop" data-rel="tooltip"' : '';
                            $cell_url_title = isset($url_prop['title']) ? $url_prop['title'] : '';
                        } else if ($this->is_closure($url_prop)) { //a closure url object
                            $cell_url = $url_prop($cell_value, $row);
                        } else { //a regular string url
                            $cell_url = $this->replace_col_codes($url_prop, $this->object_to_array($row), true);
                        }
                        
                        $cell = '<a href="'.$cell_url.'" target="'.$cell_url_target.'" '.$cell_tooltip_attr.' title="'.$cell_url_title.'">'.$cell.'</a>';
                    }
                    
                    //color
                    if (isset($prop["color"])) {
                        $color_prop = $prop["color"];
                        $color_class = '';
                        if (is_array($color_prop)) { //array additional color options
                            
                        } else if ($this->is_closure($color_prop)) { //a closure color object
                            $color_class = $color_prop($cell_value, $row);
                        } else { //a regular string color
                            $color_class = $color_prop;
                        }
                        $cell = '<span class="'.$color_class.'">'.$cell.'</span>';
                    }
                    
                    //closure - custom display
                    $cell = "$cell_icon $cell $cell_html";
                    if (isset($prop["closure"]) && $this->is_closure($prop["closure"])) {
                        $cell = $prop["closure"]($cell, $cell_value, $row);
                    }
                }
            }
            
            $result .= '<td '.$td_class.'>'.$cell.'</td>';
        }
        $row_actions = '';
        if (count($this->row_actions) > 0) {
            //load row actions
            $actions_desktop = "";
            $actions_mobile = "";
            foreach ($this->row_actions as $action => $prop) {
                //options
                //process url
                $url = "";
                $target = "";
                if (isset($prop['url'])) {
                    $url_prop = $prop['url'];
                    if (is_array($url_prop)) {
                        $target = isset($url_prop['target']) ? $url_prop['target'] : "_self";
                        $url = isset($url_prop['href']) ? $this->replace_col_codes($url_prop['href'], $this->object_to_array($row), true) : '#';
                    } else {
                        $url = $this->replace_col_codes($url_prop, $this->object_to_array($row), true);
                        $target = "_self";
                    }
                        
                }
                $title = isset($prop['title']) ? $prop['title'] : $action;
                $icon = isset($prop['icon']) ? '<i class="fa '.$prop['icon'].' fa-md"></i>' : $action ;
                $color = isset($prop['color']) ? $prop['color'] : 'blue';
                $attr = $this->replace_col_codes(isset($prop['attr']) ? implode(' ', $prop['attr']) : '', $this->object_to_array($row));
                
                $actions_desktop .= 
                    '<a class="'.$color.' tooltip-info desktop" href="'.$url.'" data-rel="tooltip" title="'.$title.'" target="'.$target.'" '.$attr.'>
            			'.$icon.'
            		</a> ';
                $actions_mobile .= 
                    '<li>
    					<a href="'.$url.'" class="phone" title="'.$title.'" target="'.$target.'" '.$attr.'>
    						<span class="'.$color.'">
    							'.$icon.'
    						</span>
    					</a>
    				</li>';
            }
            
            $row_actions = '
                <td class="td-actions">
                	<div class="hidden-phone visible-desktop action-buttons">
                		'.$actions_desktop.'
                	</div>
                	<div class="hidden-desktop visible-phone">
                		<div class="inline position-relative">
                			<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                				<i class="fa fa-caret-down icon-only fa-md"></i>
                			</button>
                
                			<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                				'.$actions_mobile.'
                			</ul>
                		</div>
                	</div>
                </td>';
        }
        
        $row_detail = '';
        if (!is_null($this->row_detail)) {
            $row_detail = '
                <td class="center">
                    <div class="action-buttons">
						<a class="grey" href="#">
							<i class="fa fa-plus-square fa-md" data-toggle="row-detail" title="Show Details"></i>
						</a>
					</div>
                </td>';
        }
        $row_checkbox = '';
        if (!is_null($this->row_checkbox)) {
            $name = isset($this->row_checkbox['name']) ? $this->row_checkbox['name'] : 'select';
            $value = isset($this->row_checkbox['value']) ? 'value="'.$this->replace_col_codes($this->row_checkbox['value'], $this->object_to_array($row)).'"' : 'value=""';
            $row_checkbox = '
                <td class="center">
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" '.$value.' class="checkbox style-0" name="'.$name.'[]" />
                          <span></span>
                        </label>
                    </div>
				</td>';
        }
        
        return "<tr>".$row_detail.$row_checkbox.$result.$row_actions."</tr>";
    }
    
    private function map_js_hidden_cols($index, $col) {
        $index = !is_null($this->row_detail) ? $index + 1 : $index;
        $index = !is_null($this->row_checkbox) ? $index + 1 : $index;
        if (!in_array($col, $this->cols_hidden)) return null;
        else return "fnShowHideCol($index, false);";
    }
    
    private function map_js_cols_sorting($index, $col) {
        $index = !is_null($this->row_detail) ? $index + 1 : $index;
        $index = !is_null($this->row_checkbox) ? $index + 1 : $index;
        if (isset($this->cols_sorting[$col])) {
            $sorting = $this->cols_sorting[$col];
            return "[$index, '$sorting']";
        } else return null;
    }
    
    private function map_static_hidden_cols($raw_data) {
        foreach ($this->cols_hidden as $hidden_col)
            unset($raw_data->{$hidden_col});
        
        return $raw_data;
    }
    
    private function map_toolbar_html($toolbar) {
        return '
            <div class="widget-toolbar hidden-print"> 
                '.$toolbar['html'].'
            </div>';
    }
    
    private function map_toolbar_js($toolbar) {
        return $toolbar['js'];
    }
    
    private function map_custom_table_args($key, $js) {
        return "'$key' : $js";
    }
    
    public function display($return = false) {
        if (!$this->data) {
            $col_list = array($this->no_data_text);
            $rows = array("");
        } else {
            if ($this->_table_properties->static) {
                array_map(array($this, "map_static_hidden_cols"), $this->data);
            }
            $col_list = array_keys(is_object($this->data[0]) ? get_object_vars($this->data[0]) : $this->data[0]);
            $rows = array_map(array($this, "map_rows"), $this->data);
        }
        
        $cols = array_map(array($this, "map_cols"), $col_list);
        //$custom_cols = array_filter(array_map(array($this, "map_custom_cols"), array_keys($col_list), $col_list));
        $js_hidden_cols = array_filter(array_map(array($this, "map_js_hidden_cols"), array_keys($col_list), $col_list));
        $htm_widget_toolbar = !$this->_table_properties->static ? '
            '.(!is_null($this->toolbar) ? implode('', array_map(array($this, 'map_toolbar_html'), $this->toolbar)) : '').'
            ' : '';
            
        $widget_header = '
            <div class="jarviswidget jarviswidget-color-'.$this->color.'" id="'.$this->_uid.'_widget" >
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"
                -->

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>'.$this->title.' </h2>
                    '.$htm_widget_toolbar.'
                </header>

                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                        <input class="form-control" type="text">
                        <span class="note"><i class="fa fa-check text-success"></i> Change title to update and save instantly!</span>
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        '.(!$this->_table_properties->static ? '
                        <div class="widget-body-toolbar">
                            
                        </div>' : '').'
                	';
        $widget_footer = '
                	</div>
                </div>
            </div>';
    
        $dtable_htm = 
            ($this->_table_properties->in_widget ? $widget_header : '').'
                 <table id="'.$this->_uid.'_table" class="table table-striped table-bordered '.($this->_table_properties->hover ? 'table-hover' : '').'" width="100%">
    				<thead>
    					<tr>
                            '.(!is_null($this->row_detail) ? '<th width="20px"></th>' : '').'
                            '.(!is_null($this->row_checkbox) ? '<th class="center" width="20px"><div class="checkbox"><label><input type="checkbox"  class="checkbox style-0"><span></span></label></div></th>' : '').'
                            '.implode('', $cols).'
                            '.(count($this->row_actions) > 0 ? '<th></th>' : '').'
    					</tr>
    				</thead>
    
    				<tbody>
                        '.implode('', $rows).'
    				</tbody>
    			</table>'
            .($this->_table_properties->in_widget ? $widget_footer : '');
            
        $dtable_js = '';
        if (!$this->_table_properties->static) {
            $otable_var = $this->get_otable_var();
            $table_id = $this->get_table_id();
            $dtable_js = '
                <script type="text/javascript">
        			$(function() {
                        $(".desktop[data-rel=\'tooltip\']").tooltip();
        				$(".phone[data-rel=\'tooltip\']").tooltip({placement: tooltip_placement});
        				function tooltip_placement(context, source) {
        					var $source = $(source);
        					var $parent = $source.closest("table")
        					var off1 = $parent.offset();
        					var w1 = $parent.width();
        			
        					var off2 = $source.offset();
        					var w2 = $source.width();
        			
        					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return "right";
        					return "left";
        				}
                     
                        $("#'.$table_id.' a i[data-toggle=\'row-detail\']").on("click", function () {
                            var nTr = $(this).parents("tr")[0];
                            if ( '.$otable_var.'.fnIsOpen(nTr) )
                            {
                                /* This row is already open - close it */
                                $(this).removeClass("fa-minus-square").addClass("fa-plus-square");
                                this.title = "Show Details";
                                '.$otable_var.'.fnClose( nTr );
                            }
                            else
                            {
                                /* Open this row */
                                $(this).removeClass("fa-plus-square").addClass("fa-minus-square");
                                this.title = "Hide Details";
                                '.$otable_var.'.fnOpen( nTr, fnFormatDetails('.$otable_var.', nTr), "details" );
                            }
                            return false;
                        });
                        var '.$otable_var.' = $("#'.$table_id.'").dataTable({ 
                            '.(is_null($this->custom_dtable_prop) ? '' : implode(', ', array_map(array($this, 'map_custom_table_args'), array_keys($this->custom_dtable_prop), $this->custom_dtable_prop)).',').'
                            '.(!$this->pagination ? '"bPaginate": false, "bInfo": false,' : '').'
            				aoColumns: [
                                '.(!is_null($this->row_detail) ? '{"bSortable": false},' : '').'
                                '.(!is_null($this->row_checkbox) ? '{"bSortable": false},' : '').'
                                '.implode(', ', array_map(array($this, 'map_js_cols'), $col_list)).'
                                '.(count($this->row_actions) > 0 ? ', { "bSortable": false }' : '').'              
            				],
                            aaSorting: ['.implode(', ', array_filter(array_map(array($this, 'map_js_cols_sorting'), array_keys($col_list), $col_list))).'],
                            
                        });
                        
                        '.(!$this->pagination ? '$("#'.$table_id.'").next(".row-fluid").empty();' : '').'
                        
                        $("#'.$this->_uid.'_cols li label input[type=checkbox]").on("click", function() {
                            fnShowHideCol($(this).data("column-toggle"), $(this).prop("checked"));
                        })
                        '.implode("\n", $js_hidden_cols).'
                        function fnShowHideCol(iCol, bVis) {
                            /* Get the DataTables object again - this is not a recreation, just a get of the object */
                            //var bVis = '.$otable_var.'.fnSettings().aoColumns[iCol].bVisible;
                            '.$otable_var.'.fnSetColumnVis(iCol, bVis);
                        }
                        
                        function fnFormatDetails ( '.$otable_var.', nTr ) {
                            var aData = '.$otable_var.'.fnGetData( nTr );
                            '.(!is_null($this->row_detail) ? $this->get_detail_content($this->row_detail, $col_list) : '').'
                                                    
                        }
                        
        				$("#'.$this->_uid.'_table th input:checkbox").on("click" , function(){
        					var that = this;
        					$(this).closest("table").find("tr > td input:checkbox").each(function(){
        						this.checked = that.checked;
        						//$(this).closest("tr").toggleClass("selected");
        					});	
        				});
                        
                        '.(!is_null($this->toolbar) ? implode("\n", array_map(array($this, "map_toolbar_js"), $this->toolbar)) : "" ).'
                        
        			})
        		</script>';
        }
        $result = $dtable_htm.$dtable_js;
            
        if ($return) return $result;
        else echo $result;    
    }
}
?>