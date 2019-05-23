<?php # script 9.3 - register.php
// this script inserts a recorder into USERS table

// set page title
$page_title = 'Register';
// include header
include('includes/header.html');

// check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// connect to db
	require('../mysqli_connect.php');
	// initiliaze an error array
	$errors = [];
	// check for the first name
	if(empty($_POST['first_name'])){
		$errors[] = 'You forgot to add your first name';
	} else {
		$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	// check for the last name
	if(empty($_POST['last_name'])){
		$errors[] = 'You forgot to add your last name';
	} else {
		$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	// check for email
	if(empty($_POST['email'])){
		$errors[] = 'You forgot to add email';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	// check for password and match against the confirmed one
	if(!empty($_POST['pass1'])){
		if($_POST['pass1'] != $_POST['pass2']){
			$errors[] = 'Your password did not match the confirmed password';
		} else {
			$password = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password';
	}

	// if there are not errors and everything's ok
	if(empty($errors)){
		// register the user in the database
		// connect to db
		// make the query
		$q = "insert into users(first_name, last_name, email, pass, registration_date)
			values('$first_name', '$last_name', '$email', SHA2('$password', 512), NOW())";
		// run the query
		$r = @mysqli_query($dbc, $q);
		// if ok
		if($r){
			echo '<h2>Thank you</h2><p>You are now registered</p>';
		} else {
			echo '<h2>System error</h2><p class="error">Could not register due to the system error</p>';
			echo '<p>'.mysqli_error($dbc).'<br>Query: '.$q.'</p>';
		}
		// close db connnection
		mysqli_close($dbc);
		// include the footer and exit the script
		include('includes/footer.html');
		exit();
	} else {
		// report the errors
		echo '<h2>Error!</h2>
			<p class="error">The following error(s) occurred: <br>';
		foreach($errors as $error){
			echo " - $error <br>\n";
		}
		echo '</p><p>Please try again</p><br>';
	}
	// close connection
	mysqli_close($dbc);

} // end of submit condiational


?>

<h2>Register</h2>

<form action="register.php" method="post">

	<!-- first name -->
	<p>First name: 
		<input type="text" name="first_name" size="15" maxlength="20" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
	</p>
	<!-- last name -->
	<p>Last name:
		<input type="text" name="last_name" size="15" maxlength="40" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	</p>
	<!-- email -->
	<p>Email address:
	<input type="email" name="email" size="20" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
	</p>
	<!-- password -->
	<p>Password: 
		<input type="password" name="pass1" size="10" maxlength="20" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
	</p>
	<!-- confirm password -->
	<p>Confirm password:
		<input type="password" name="pass2" size="10" maxlength="20" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
	</p>
	<!-- submit -->
	<p><input type="submit" name="submit" value="Register"></p>

</form>

<!-- add footer -->
<?php include('includes/footer.html'); ?>
