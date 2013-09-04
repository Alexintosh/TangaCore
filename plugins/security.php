<?php
//Security
class Security{

	static function _sanitize($s)
	{
		return addslashes(htmlentities($s, ENT_QUOTES, 'UTF-8'));
	}

	static function sanitize(&$data)
	{
		foreach(@$data as $k => $v) {
			if(is_array($v)) {
				Security::_sanitize($v);
				continue;
			}
			$data[$k] = Security::sanitize($v);
		}
	}

	static function main() {
		Security::sanitize($_POST);
		Security::sanitize($_GET);
		Security::sanitize($_REQUEST);
	}
}

Security::main();
?>
