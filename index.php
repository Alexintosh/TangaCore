<?php define('__EXEC', 1);

function load($file)
{
	if(!file_exists(PLUGINS.$file))
		return false;
	try {
		@require_once(PLUGINS . $file);
	}catch (Exception $e) {
	    error('Caught exception: '. $e->getMessage());
	}
	return true;
}

function dieWithRsc404()
{
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	header("Status: 404 Not Found"); /* CGI */
	die();
}

function autoload() {
	global $config;
	foreach(@$config['plugins_autoload'] as $p) {		
		load($p);
	}

	if(isset($_GET['tanga']) && !load($_GET['tanga']))
		dieWithRsc404();
	else
		load($config['default_activity']) or error("load", true);
}

function main() {
	global $config;
	require('config.inc.php');
	autoload();
}

main();
?>
