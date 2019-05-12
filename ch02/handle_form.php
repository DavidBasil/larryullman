<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Form Feedback</title>
</head>
<body>
<?php 
# script 2.2 - handle_form.php

// get the form data
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$comments = $_REQUEST['comments'];

// print the submitted info
echo "<p>Thank you, 
<strong>$name</strong>,
for the following comments:
</p>
<pre>$comments</pre>
<p>We will reply to you at <em>$email</em></p>";


?>
</body>
</html>
