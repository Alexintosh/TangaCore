<?php defined('__EXEC') or die;
/* tanga default template */

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

?>
<!doctype html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="UTF-8"> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 

		<title>Title</title>

		<meta http-equiv="X-UA-Compatible" content="IE=9, IE=8, chrome=1">

		<meta name="robots" content="index,follow" /> 
		<meta name="revisit-after" content="7 days" /> 
		<meta name="publisher" content="Vim" />

		<meta name="author" content="Someone" />

		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="copyright" content="" /> 
		<meta http-equiv="content-language" content="IT" />
	</head>

	<body>
		Body.
	</body>
</html>
