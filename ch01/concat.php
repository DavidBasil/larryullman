<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Concatenation</title>
</head>
<body>
<?php 
# script 1.7 - concat.php

// create variables
$first_name = 'Melissa';
$last_name = 'Bank';
$author = $first_name . ' ' . $last_name;
$book = 'The Girls\' Guide to Hunting and Fishing';

// print the values
echo "<p>
	The book <em>$book</em> was written by $author.
	</p>";

?>

</body>
</html>
