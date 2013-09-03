<?php defined('__EXEC') or die;
define('PATH', getcwd().'/');
define('PLUGINS', PATH.'plugins/');

$config = array(
	'plugins_autoload' => array('security.php', 'DB.php'),
	'default_activity' => 'test/index.php'
);

?>
