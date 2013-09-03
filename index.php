<?php define('__EXEC' 1);

function error($txt, $die = false, $dbg = 0)
{
	//Collecting errors
	// ...
	//Write a log 
}

function load($file)
{
	if(!file_exists(PLUGINS.$file))
		return false;
	require_once(PLUGINS . $file);
	return true;
}

function dieWithRsc404()
{
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	header("Status: 404 Not Found"); /* CGI */
	die();
}

function autoload() {
	foreach(@$config['plugins_autoload']) as $p) {
		load($p);
	}

	if(isset($_GET['tanga']) && !load($_GET['tanga'])
		dieWithRsc404();
	else
		load($config['default_activity']) or error("load", true);
}

function main() {
	require('config.inc.php');
	autoload();	
}

main();
?>
