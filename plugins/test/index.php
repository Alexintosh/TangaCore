<?php defined('__EXEC') or die;
/* Base plugin: where magic happen. */

function unused() {
	load('DB');

	// Create a new PDO connection to MySQL
	$pdo = new PDO(
		'mysql:dbname=databasename;host=localhost',
		'root',
		'',
		array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		)
	);

	// Create a new DB class object
	DB::$c = $pdo;
}

echo "cca siemu";
?>
