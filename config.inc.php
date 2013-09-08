<?php defined('__EXEC') or die;

ini_set('display_errors', 1);
error_reporting(~0);

define('PATH', getcwd().'/');
define('PLUGINS', PATH.'plugins/');

config(array(
	'default_tanga' => 'test'
));


?>
