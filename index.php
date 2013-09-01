<?php 

function error($params)
{
	if( !is_array($params)) return false;

}

function check_file($file = null)
{
	if(!$file) return false;

}

function load($file = null)
{
	if(!$file) return false;
	if( !check_file($file) )
		return false;
	else {
		require_once(PLUGINS . $file);
		return true;
	}
}

function autoload()
{
	if( isset($config['plugins_autoload']) )
	{
		foreach ($config['plugins_autoload'] as $plugin) {
			load($plugin);
		}
	}

	//$fn  = 'plugins/$action/index.php';
}

function setup()
{
	autoload();
}

function main()
{
	require_once('config.inc.php');
	setup();
}

main();

?>
