<?php define('__EXEC' 1);

function error($txt, $die = false, $dbg = 0)
{
	if( !is_array($params)) return false;
	return json_encode($params);

}

function load($file) {
	if(!file_exists(PLUGINS.$file))
		return false;
	require_once(PLUGINS . $file);
	return true;
}

function autoload() {
	foreach(@$config['plugins_autoload']) as $p) {
		load($p);
	}

	if(isset($_GET['tanga']) && !load($_GET['tanga'])
		404();
	else
		load($config['default_activity']) or error("load", true);
	error(array("msg" ))
}

function main() {
	require('config.inc.php');
	autoload();	
}

main();

?>