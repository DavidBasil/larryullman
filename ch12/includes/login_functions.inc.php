<?php 
// two functions used by login/logout process

// this functions redirects the user
function redirect_user($page = 'index.php'){
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/'.$page;
	header("Location: $url");
	exit();
}

// this function validates the form
function check_login($dbc, $email = '', $pass = ''){
	$errors = [];
	// validate email
	if(empty($email)){
		$errors[] = 'You forgot to enter email address';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	// validate password
	if(empty($pass)){
		$errors[] = 'You forgot to enter your password';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}
	if(empty($errors)){
		$q = "select user_id, first_name from users where email='$e' and pass=SHA2('$p', 512)";
		$r = @mysqli_query($dbc, $q);
		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return [true, $row];
		} else {
			$errors[] = 'The email address and password entered do not match those on record';
		}
	}
	return [false, $errors];
}
