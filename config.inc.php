ST', '');
define('DBUSER', '');
define('DBPASS', '');
define('DBNAME', '');

define('PATH', getcwd() );
define('PLUGINS', PATH . '/plugins');

$config = [];

//Plugins to autoload
$config["plugins_autoload"] = ['security'];
$config["default_activity"] = "";

?>
