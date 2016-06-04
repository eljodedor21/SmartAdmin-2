<?php

class SmartUI {


	public function __construct() {

	}

	public function create_widget($options = array(), $contents = array()) {
		return new Widget($options, $contents);
	}

	protected static function err($message = "SmartUI Error notice:") {
		$trace = debug_backtrace();
        trigger_error($message.' in '.$trace[0]['file'].' on line '.$trace[0]['line'], E_USER_NOTICE);
	}

    public static function print_error($message, $return = false) {
    	$result = $message; //format this later for error printing
    	if ($return) return $result;
    	else echo $result;
    }

    public static function print_warning($message, $return = false) {
    	$result = $message; //format this later for error printing
    	if ($return) return $result;
    	else echo $result;
    }
}

class SmartUtil extends SmartUI {
	public static function clean_html_string($str_value) {
        if (is_null($str_value)) $str_value = "";
        $new_str = is_string($str_value) ? htmlentities(html_entity_decode($str_value, ENT_QUOTES)) : $str_value;
        return nl2br(utf8_encode($new_str));
    }

    public static function is_closure($obj) {
        return (is_object($obj) && ($obj instanceof Closure));   
    }

    public static function array_to_object($array) {
	    if (!is_object($array) && !is_array($array))
	        return $array;
	       
	    if (is_array($array))
	    	return (object)array_map(array(__CLASS__, 'array_to_object'), $array);
	    else return $array;
	    
	}

    public static function object_to_array($object) {
        if (!is_object($object) && !is_array($object))
            return $object;
        
        if (is_object($object))
            $object = get_object_vars($object);
            
        return array_map(array(__CLASS__, 'object_to_array'), $object);
    }
}


?>