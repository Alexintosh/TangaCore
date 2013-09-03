<?php
//Security
class Security{

	static function sanitize($dirty)
	{
		if (get_magic_quotes_gpc()) {
			$clean = mysql_real_escape_string(stripslashes($dirty));
		}else{
			$clean = mysql_real_escape_string($dirty);
		}
		return $clean;
	}

	static function _sanitize(&$data) {
		foreach(@$data as $k => $v) {
			if(is_array($v)) {
				 Security::_sanitize($v);
				continue;
			}
			$data[$k] = Security::sanitize($v);
		}
	}

	static function main() {
		Security::_sanitize($_POST);
		Security::_sanitize($_GET);
		Security::_sanitize($_REQUEST);
	}
}

Security::main();
?>
