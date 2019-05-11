<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Constants</title>
</head>
<body>
<?php 
# script 1.9 - constants.php

// set today's date as a constant:
define('TODAY', 'May 11, 2019');

// print a message using predefined constants and the TODAY constant:
echo '<p>
Today is '.TODAY .'.
<br>
This server is running version
<strong>'.PHP_VERSION.'</strong> of PHP on the 
<strong>'.PHP_OS.'</strong> operating system.
</p>';

?>
<hr>
<br>

<?php 
echo PHP_VERSION;

?>

</body>
</html>
