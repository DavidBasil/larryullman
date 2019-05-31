$(function(){

	// hide error messages
	$('.errorMessage').hide();

	// form handler
	$('#login').submit(function(e){
		e.preventDefault();
		// init vars
		var email, password;
		// validate email
		if($('#email').val().length >= 6){
			email = $('#email').val();
			$('#emailP').removeClass('error');
			$('#emailError').hide();
		} else {
			$('#emailP').addClass('error');
			$('#emailError').show();
		}

		// validate password
		if($('#password').val().length > 0){
			password = $('#password').val();
			$('#passwordP').removeClass('error');
			$('#passwordError').hide();
		} else {
			$('#passwordP').addClass('error');
			$('#passwordError').show();
		}

		// perform ajax
		if(email && password){
			// object of data
			var data = new Object();
			data.email = email;
			data.password = password;
			console.log('data set')
			// object of ajax options
			var options = new Object();
			options.data = data;
			options.dataType = 'text';
			options.type = 'get';
			console.log('options set');
			options.success = function(response){
				if(response == 'CORRECT'){
					$('#login').hide();
					$('#results').removeClass('error');
					$('#results').text('You are now logged in');
				} else if (response == 'INCORRECT'){
					$('#results').text('The subbmitted credentials do not match those on file.');
					$('#results').addClass('error');
				} else  if (response == 'INCOMPLETE'){
					$('#results').text('Please provide an email and password');
					$('#results').addClass('error');
				} else if (response == 'INVALID_EMAIL'){
					$('#results').text('Please provide your email address');
					$('#results').addClass('error');
				}
			}
				options.url = 'login_ajax.php';
				$.ajax(options);
		}
		 // return false;
	
	})	

})
