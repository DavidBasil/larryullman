<?php # script 10.2 - delete_user.php
// this page is for deleting a user record
// this page is access through view_users.php

$page_title = "Delete a user <br>";
include('includes/header.html');

echo 'Delete a user';

// check for a valid user_id
if((isset($_GET['id'])) && (is_numeric($_GET['id']))){
	$id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))){
	$id = $_POST['id'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include('includes/footer.html');
	exit();
}

require('../mysqli_connect.php');

// check if form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['sure'] == 'Yes'){ // delete the record
		// make the query
		$q = "delete from users where user_id=$id limit 1";
		$r = @mysqli_query($dbc, $q);
		if(mysqli_affected_rows($dbc) == 1){ // if it ran ok
			// print the message
			echo '<p>The user has been deleted</p>';
		} else { // the query did not run ok
			echo '<p class="error">The user could not be deleted due to the system error.</p>';
			echo '<p>'.mysqli_error($dbc).'<br>Query: '.$q.'</p>';
		}
	} else {
		echo 'The user has not been deleted';
	}
} else { // show the form
	// retrieve the user's info
	$q = "select concat(last_name, ', ', first_name) from users where user_id=$id";
	$r = @mysqli_query($dbc, $q);

	if(mysqli_num_rows($r) == 1){ // valid user id, show form
		// get user's info
		$row = mysqli_fetch_array($r, MYSQLI_NUM);
		// display the record being deleted
		echo "<h3>Name: $row[0]</h3>Are you sure you want to delete the user?";
		// create the form
		echo '<form action="delete_user.php" method="post">
			<input type="radio" name="sure" value="Yes">Yes
			<input type="radio" name="sure" value="No" checked="checked">No
			<input type="submit" name="submit" value="Submit">
			<input type="hidden" name="id" value="'.$id.'">
		</form>';
	} else { // not a valid user id
		echo '<p class="error">This page has been accessed by error</p>';
	}
}

mysqli_close($dbc);
include('includes/footer.html');

?>
