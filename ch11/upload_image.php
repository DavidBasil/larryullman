<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Upload_image</title>
<style type="text/css" media="screen">
.error {
	font-weight: bold;
	color: #C00;
}
</style>
</head>
<body>
<?php 
// check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// check for uploaded file
	if(isset($_FILES['upload'])){
		// validate the type	
		$allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 
			'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
		if(in_array($_FILES['upload']['type'], $allowed)){
			// move the file
			if(move_uploaded_file($_FILES['upload']['tmp_name'], "../../../uploads/{$_FILES['upload']['name']}")){
				echo '<p><em>The file has been uploaded!</em></p>';
			}
		} else {
			echo '<p class="error">Please upload a JPEG or PNG image</p>';
		}
	}
	// check for error
	if($_FILES['upload']['error'] > 0){
		echo '<p class="error">The file could not be uploaded because:<strong>';
		switch($_FILES['upload']['error']){
		case 1:
			print 'The file exceeds the upload_max_filesize setting in php.ini';
			break;
		case 2:
			print 'The file exceeds max_file_size setting in the HTML form';
			break;
		case 3:
			print 'The file was only partially uploaded';
			break;
		case 4:
			print 'No file was uploaded';
			break;
		case 6:
			print 'No temporary folder was available';
			break;
		case 7:
			print 'Unable to write to the disk';
			break;
		case 8:
			print 'File upload stopped';
			break;
		default:
			print 'A system error occurred';
			break;
		}
		print '</strong></p>';
	}
	// delete the file if it still exists
	if(file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])){
		unlink($_FILES['upload']['tmp_name']);
	}
}
?>

<form enctype="multipart/form-data" action="upload_image.php" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="524288">
	<fieldset>
		<legend>Select a JPEG or PNG image of 512 kb or smaller to be uploaded:</legend>
		<p><strong>File: </strong><input type="file" name="upload"></p>	
	</fieldset>
	<div align="center">
		<input type="submit" name="submit" value="Submit">
	</div>
</form>

</body>
</html>
