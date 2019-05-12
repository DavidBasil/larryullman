<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Form Feedback</title>
</head>
<body>
<?php 
# script 2.4 - handle_form.php

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments'])){
	echo "<p>Thank you, <strong>{$_POST['name']}</strong>, for the following comments:</p>
	<pre>{$_POST['comments']}</pre>
	<p>We will reply to you at <em>{$_POST['email']}</em></p>\n";
} else {
	echo '<p>Please fill out the form again</p>';
}

?>
</body>
</html>
