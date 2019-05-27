<?php 
// login processing

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('includes/login_functions.inc.php');
	require('../mysqli_connect.php');
	// check the login
	list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	if($check){
		// set cookies
		setcookie('user_id', $data['user_id']);
		setcookie('first_name', $data['first_name']);
		// redirect
		redirect_user('loggedin.php');
	} else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include('includes/login_page.inc.php');
?>
