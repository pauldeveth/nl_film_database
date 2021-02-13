<?php
//initialisatie databasevariabelen, Constanten
// databasegegevens
define('DB_HOST', 			'localhost');
define('DB_USER', 			'YOURDBUSER');
define('DB_PASSW', 			'YOURDBPASSWORD');
define('DB_DBNAME', 		'YOURDBNAME');
define('ROOT_URL', 			'YOURROOTURL');
define('ROOT_PATH', 		'YOURROOTPATH');

$query		= null;
$db 		= null;
date_default_timezone_set ('Europe/Amsterdam');
