<?php defined('__EXEC') or die;

global $_CACHE; /* run-time cache */

function gskv(&$a, $k, $v = null) {
	if($v === null)
		return isset($a[$k]) ? $a[$k] : null;
	$o = @$a[$k];
	$a[$k] = $v;
	return $o;
}

function sess($k, $v = null) {
	switch(session_status()) {
		case PHP_SESSION_ACTIVE:
			break;
		case PHP_SESSION_DISABLED:
			die; /* XXX What here? */
		case PHP_SESSION_NONE:
			register_shutdown_function(function() {
				session_write_close();
			});
			session_start();
			break;
	}

	return gskv($_SESSION, $k, $v);
}

function cache($k, $v = null) {
	global $_CACHE;
	return gskv($_CACHE, $k, $v);
}

function cookie($k, $v = null, $expire = null) {
	$ns = '__cookies'; /* namespace */
	$nsk = $ns.'['.$k.']'; /* encapsulation */

	$_COOK = isset($_COOKIE[$ns]) ? $_COOKIE[$ns] : null;
	$r = isset($_COOK[$k]) ? $_COOK[$k] : null;
	if($v !== null) {
		if($v === '')
			setcookie($nsk, '', time() - 3600); /* delete */
		else {
			if($expire === null)
				$expire = time()+60*60*24*30; /* Expires in 1 month by default */
			setcookie($nsk, $v, $expire);
		}
	}

	return $r;
}

?>
