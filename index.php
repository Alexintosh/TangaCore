<?php define('__EXEC', 1);

function load($name)
{
	if(!($name = trim($name)))
		return false;
	$fn = PLUGINS.$name.'/index.php'; /* XXX sanitize $name */
	if(!file_exists($fn))
		return false;
	try {
		require_once($fn);
	} catch (Exception $e) {
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

function main()
{
	require('config.inc.php');
	if(!(load((string)@$_GET['tanga']) || load(config('default_tanga'))))
		dieWithRsc404();
}

main();
?>
