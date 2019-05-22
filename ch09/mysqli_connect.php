<?php #script 9.2 - mysqli_connect.php

// set the database access info as constants
define('DB_USER', 'root');
define('DB_PASSWORD', 'Slayer101!');
define('DB_HOST', 'localhost');
define('DB_NAME', 'sitename');

// make the connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or die('Could not connect MYSQL: '.mysqli_connect_error());

// set the encoding
mysqli_set_charset($dbc, 'utf8');

