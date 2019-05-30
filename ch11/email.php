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

	function spam_scrubber($value){
		// list of bad values
		$very_bad = ['to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:',
		'multipart-mixed:', 'content-transfer-encoding:'];
		foreach($very_bad as $v){
			if(stripos($value, $v) !== false) return '';
		}
		$value = str_replace(["\r", "\n", "%0a", "%0d"], ' ', $value);
		return trim($value);
	}

	// clean the form data
	$scrubbed = array_map('spam_scrubber', $_POST);

	// form validation
	if(!empty($scrubbed['name']) && !empty($scrubbed['email']) && !empty($scrubbed['comments'])){
		$body = "Name: {$scrubbed['name']}\n\nComments: {$scrubbed['comments']}";
		$body = wordwrap($body, 70);
		mail('your_example@example.com', 'Contact Form Submission', $body, "From: {$scrubbed['email']}");
		echo '<p><em>Thank you for contacting me. I will reply some day.</em></p>';
		$scrubbed = [];
	} else {
		echo '<p style="font-weight: bold; color: #C000">Please fill out the form completely</p>';
	}

}
?>

<p>Fill out the form to contact us</p>

<form action="email.php" method="post">
	<p>Name: <input type="text" name="name" size="30" maxlength="60" 
	value="<?php if(isset($scrubbed['name'])) echo $scrubbed['name'] ?>"></p>
	<p>Email: <input type="email" name="email" size="30" maxlength="80" 
	value="<?php if(isset($scrubbed['email'])) echo $scrubbed['email'] ?>"></p>
	<p>Comments: <textarea name="comments" rows="5" cols="30">
		<?php if(isset($scrubbed['comments'])) echo $scrubbed['comments'] ?>
	</textarea></p>
	<p><input type="submit" name="submit" value="Send"></p>
</form>

</body>
</html>




