<?php 
session_start();
// if no cookie is present, redirect the user
if(!isset($_SESSION['user_id'])){
	require('includes/login_functions.inc.php');
	redirect_user();
} else {
	// delete session
	$_SESSION = [];
	session_destroy();	
	// destroy cookie
	setcookie('PHPSESSID', '', time()-3600, '/', 0, 0);
	// delete cookie
	/* setcookie('user_id', '', time()-3600, '/', '', 0, 0); */
	/* setcookie('first_name', '', time()-3600, '/', '', 0, 0); */
}

$page_title = 'Logged out';
include('includes/header.html');

echo "<h2>Logged out</h2>
	<p>You are now logged out</p>";

include('includes/footer.html');




