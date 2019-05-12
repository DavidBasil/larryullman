<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Form Feedback</title>
<style type="text/css" media="screen">
.error {
font-weight: bold;
color: #C00;
}
</style>
</head>
<body>
<?php 
# script 2.4 - hand_form.php

// validate the name
if(!empty($_REQUEST['name'])){
	$name = $_REQUEST['name'];
} else {
	$name = NULL;
	echo '<p class="error">You forgot to enter your name</p>';
}

// validate the email
if(!empty($_REQUEST['email'])){
	$email = $_REQUEST['email'];
} else {
	$email = NULL;
	echo '<p class="error">You forgot to enter your email</p>';
}

// validate the comments
if(!empty($_REQUEST['comments'])){
	$comments = $_REQUEST['comments'];
} else {
	$comments = NULL;
	echo '<p class="error">Your forgot to enter comments</p>';
}

// validate the gender
if(isset($_REQUEST['gender'])){
	$gender = $_REQUEST['gender'];
	if($gender == 'M'){
		$greeting = '<p><strong>Good day, Sir!</strong></p>';
	} elseif($gender == 'F'){
		$greeting = '<p><strong>Good day, Madam!</strong></p>';
	} else {
		$gender = NULL;
		echo '<p class="error">Gender should be either "M" or "F"</p>';
	}
} else {
	$gender = NULL;
	echo '<p class="error">You forgot to select your gender</p>';
}

// if everythin is ok, print the message
if($name && $email && $gender && $comments){
	echo "<p>Thank you, <strong>$name</strong>, for the following comments:</p>
	<pre>$comments</pre>
	<p>We will reply to you at <em>$email</em></p>\n";
	echo $greeting;
} else {
	echo '<p class="error">Please fill out the form again</p>';
}

?>


</body>
</html>
