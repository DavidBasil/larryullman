<?php 

if(isset($_GET['email'], $_GET['password'])){

	if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){

		if(($_GET['email'] == 'email@example.com') && ($_GET['password'] == 'testpass')){
			echo 'CORRECT';
		} else {
			echo 'INCORRECT';
		}

	} else {
		echo 'INVALID_EMAIL';
	}

} else {
	echo 'INCOMPLETE';
}
