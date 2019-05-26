<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Email</title>
</head>
<body>

<h2>Contact Us</h2>

<?php 
// check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// form validation
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments']))	{
		// create the body
		$body = "Name: {$_POST['name']}\n\nComments: {$_POST['comments']}";
		// no longer than 70 characters
		$body = wordwrap($body, 70);
		// send the email
		mail('your_example@example.com', 'Contact form submission', $body, "From: {$_POST['email']}");
		// print the message
		echo '<p><em>Thank you for contacting me. I will reply some day.</em></p>';
		// clear $_POST so the form is not sticky
		$_POST = [];
	} else {
		echo '<p style="font-weight: bold; color: #C00">Please fill out the form completely.</p>';
	}
}
?>

<p>Fill out the form to contact us</p>

<form action="email.php" method="post">
	<p>Name: <input type="text" name="name" size="30" maxlength="60" 
	value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>"></p>
	<p>Email: <input type="email" name="email" size="30" maxlength="80" 
	value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>"></p>
	<p>Comments: <textarea name="comments" rows="5" cols="30">
		<?php if(isset($_POST['comments'])) echo $_POST['comments'] ?>
	</textarea></p>
	<p><input type="submit" name="submit" value="Send"></p>
</form>

</body>
</html>




