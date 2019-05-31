<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/login.js"></script>
</head>
<body>

<h2>Login</h2>

<p id="results"></p>

<form action="login.php" method="post" id="login">

	<p id="emailP">Email Address: <input type="email" name="email" id="email">
		<!-- error -->
		<span class="errorMessage" id="emailError">Plese enter your email address</span>
	</p>

	<p id="passwordP">Password: <input type="password" name="password" id="password">
		<!-- error -->
		<span class="errorMessage" id="passwordError">Plese enter your password</span>
	</p>

	<p><input type="submit" name="submit" value="Login"></p>

</form>

</body>
</html>
