<?php
	
	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	
	
	define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'Omap2014');
	define('DB_DATABASE', 'mydb');
 
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if ( !$db ) {
		die("Connection failed : " .mysqli_connect_error());
	}
	
?>