<?php defined('__EXEC') or die;

define('PATH', getcwd().'/');
define('PLUGINS', PATH.'plugins/');

$config = array(
	'plugins_autoload' => ['security'],
	'default_activity' => 'home',
);

?>