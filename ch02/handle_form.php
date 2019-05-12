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

// create the gender variable
if (isset($_REQUEST['gender'])){
	$gender = $_REQUEST['gender'];
} else {
	$gender = NULL;
}

// print the submitted info
echo "<p>Thank you, 
<strong>$name</strong>,
for the following comments:
</p>
<pre>$comments</pre>
<p>We will reply to you at <em>$email</em></p>";

// print the message based upon the gender value
if($gender == 'M'){
	echo '<p><strong>Good day, Sir!</strong></p>';
} elseif($gender == 'F'){
	echo '<p><strong>Good day, Madam!</strong></p>';
} else {
	echo '<p><strong>You forgot to enter gender!</strong></p>';
}

?>
</body>
</html>
