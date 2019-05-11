<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Predefined</title>
</head>
<body>

<?php 
# script 1.5 - predefined.php

// create a shorthand version of variable names:
$file = $_SERVER['SCRIPT_FILENAME'];
$user = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['SERVER_SOFTWARE'];

// print the name of the script
echo "<p>You are running the file: 
<br><strong>$file</strong>.
</p>\n";

// print user's info
echo "<p>You are viewing this page using:
<br><strong>$user</strong>.
</p>\n";

// print the server's info
echo "<p>This server is running: 
<br><strong>$server</strong>.
</p>\n";

?>

</body>
</html>
