<?php 
// login processing

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('includes/login_functions.inc.php');
	require('../mysqli_connect.php');
	// check the login
	list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	if($check){
		// set session data
		session_start();
		$_SESSION['user_d'] = $data['user_id'];
		$_SESSION['first_name'] = $data['first_name'];
		// set cookies
		/* setcookie('user_id', $data['user_id'], time()+3600, '/', '', 0, 0); */
		/* setcookie('first_name', $data['first_name'], time()+3600, '/', '', 0, 0); */
		// redirect
		redirect_user('loggedin.php');
	} else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include('includes/login_page.inc.php');
?>
