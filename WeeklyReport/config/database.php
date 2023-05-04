<?php

// The database connection configuration information
$config = array(
	'driver' => 'mysql',  // type of database
	'host' => 'localhost', // database hostname
	'port' => 3306, // database port number
	'database' => 'php_test', // database name
	'username' => 'root', // database username
	'password' => 'root', // database password
	'charset' => 'utf8mb4', // database character set
	'collation' => 'utf8mb4_general_ci', // database collation
	'options' => array(
		PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, // Error handling mode
		PDO:: ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC, // default extraction mode
		PDO:: ATTR_EMULATE_PREPARES => false // Disable the analog preprocessing statement
	)
);

?>