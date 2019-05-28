<?php 
// the user is redirected here from login.php

// if no cookie is present, redirect the user
if(!isset($_COOKIE['user_id'])){
	require('includes/login_functions.inc.php');
	redirect_user();
}

// set the page title and include the html header
$page_title = 'Logged In';
include('includes/header.html');

// print message
echo "<h2>Logged in!</h2><p>You are now logged in, {$_COOKIE['first_name']}!</p>
	<p><a href=\"logout\">Logout</a></p>";

include('includes/footer.html');

?>
