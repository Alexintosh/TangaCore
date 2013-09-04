<?php define('__EXEC', 1);

function load($file)
{
	if(!file_exists(PLUGINS.$file))
		return false;
	try {
		@require_once(PLUGINS . $file);
	}catch (Exception $e) {
	    die('Caught exception: '. $e->getMessage());
	}
	return true;
}

function config($k, $v = null)
{
	global $_CONFIG;

	if(is_array($k)) {
		if($v !== null)
			return false;
		foreach($k as $_k => $_v) {
			$_CONFIG[$_k] = $_v;
		}
		return true;
	}

	$r = @$_CONFIG[$k];
	if($v !== null)
		$_CONFIG[$k] = $v;
	return $r;
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
		load($config['default_activity']) or die('load');
}

function main() {
	global $config;
	require('config.inc.php');
	autoload();
}

main();
?>
