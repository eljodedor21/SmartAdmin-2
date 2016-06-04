<?php

require_once("inc/init.php");

$get_func = key($GLOBALS["_GET"]);
echo function_exists($get_func) ? call_user_func($get_func) : null;

?>