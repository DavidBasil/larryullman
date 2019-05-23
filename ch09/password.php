<?php # script 9.7 password.php
// this page lets user change the password

$page_title = 'Change your password';
include('includes/header.html');

// check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// connect to db
	require('../mysqli_connect.php');
	// initialize errors array
	$errors = [];

	// check email
	if(empty($_POST['email'])){
		$errors[] = 'You forgot to enter email address';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	// check current password
	if(empty($_POST['pass'])){
		$errors[] = 'Your forgot to enter your current password';
	} else {
		$password = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	// check new password and match
	if(!empty($_POST['pass1'])){
		if($_POST['pass1'] != $_POST['pass2']){
			$errors[] = 'Your new password did not match the confirmed password';
		} else {
			$new_password = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password';
	}

	// if everything's ok
	if(empty($errors)){
		// check that they've entered the right email address/password combination
		$q = "select user_id from users where (email='$email' and pass=SHA2('$password', 512))";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		// if match was made
		if($num == 1){
			// get user_id
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
			// make the update query
			$q = "update users set pass=SHA2('$new_password', 512) where user_id=$row[0]";
			$r = @mysqli_query($dbc, $q);
			// if it ran ok
			if(mysqli_affected_rows($dbc) == 1){
				// print a message
				echo '<h1>Thank you!</h1>
					<p>Your password has been updated.</p>';
			} else {
				echo '<h1>System error</h1>
					<p class="error">You password could not be changed.</p>';
				// debugging message
				echo '<p>'.mysqli_error($dbc).'<br><br>Query: '.$q.'</p>';
			}
			// close db connection
			mysqli_close($dbc);
			// include the footer and close the script
			include('includes/footer.html');
			exit();
		} else {
			echo '<h1>Error</h1>
				<p class="eror">The email and password don\'t match</p>';
		}

	} else {
		echo '<h1>Error</h1>
			<p class="error">The following errors occured: <br>';
		foreach($errors as $msg){
			echo " - $msg <br>";
		}
		echo '</p><p>Please try again. <br></p>';
	}

	// close db connection
	mysqli_close($dbc);

} // end of server request if



?>

<h2>Change Your Password</h2>

<form action="password.php" method="post">
	
	<p>Email address: 
		<input type="email" name="email" size="20" maxlength="60" 
		value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
	</p>

	<p>Current password:
		<input type="password" name="pass" size="10" maxlength="20" 
		value="<?php if(isset($_POST['pass'])) echo $_POST['pass'] ?>">
	</p>

	<p>New password:
		<input type="password" name="pass1" size="10" maxlength="20"
		value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'] ?>">
	</p>

	<p>Confirm new password:
		<input type="password" name="pass2" size="10" maxlength="20"
		value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'] ?>">
	</p>

	<p><input type="submit" name="submit" value="Change Password"></p>

</form>

<?php include('includes/footer.html') ?>

