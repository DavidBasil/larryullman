<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Display_errors</title>
</head>
<body>

<h2>Testing display errors</h2>
<?php # script 8.1 - display_errors.php

// set errors reporting
ini_set('display_errors', 1);

// adjust error reporting
error_reporting(E_ALL);

// create errors
foreach($var as $v){
}
$result = 1/0;


?>

</body>
</html>
