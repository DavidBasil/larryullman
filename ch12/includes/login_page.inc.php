<?php 

$page_title = 'Login';
// include header
include('includes/header.html');

// print error messages if exists
if(isset($errors) && !empty($errors)){
	echo '<h2>Error</h2>
	<p class="error">The following error(s) occurred: <br>';
	foreach($errors as $msg){
		echo " - $msg<br>\n";
	}
	echo '</p><p>Please try again.</p>';
}
?>

<br>
<br>
<h2>Login</h2>

<form action="login.php" method="post">
	<p>Email: <input type="email" name="email" size="20" maxlength="60"></p>
	<p>Password: <input type="password" name="pass" size="20" maxlength="20"></p>
	<p><input type="submit" name="submit" value="Login"></p>
</form>

<?php include('includes/footer.html') ?>
