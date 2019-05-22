<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Report_errors</title>
</head>
<body>

<h2>Testing error handling</h2>
<?php #script 8.3 - handle_errors.php

// flag variable for site status
define('LIVE', FALSE);

// create error handler
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
	// build the error message
	$message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";

	// append $e_vars to $message:
	$message .= print_r($e_vars, 1);

	if(!LIVE){
		echo '<pre>'.$message."\n";
		debug_print_backtrace();
		echo '</pre><br>';
	} else {
		echo '<div class="error">
			A system error occurred. We apologize for the inconvenience.
		</div><br>';
	}
}

// use error handler
set_error_handler('my_error_handler');

// create errors
foreach($var as $v){
}

$result = 1/0;


?>
	

</body>
</html>
