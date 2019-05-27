<?php 
// this script displays an image

$name = FALSE;

// check for an image name in url
if(isset($_GET['image'])){
	$ext = strtolower(substr($_GET['image'], -4));
	if(($ext == '.jpg') OR ($ext == 'jpeg') OR ($ext == '.png')){
		// full image path
		$image = "../../../uploads/{$_GET['image']}";
		// check that the image exists and is a file
		if(file_exists($image) && (is_file($image))){
			// set the name as this image
			$name = $_GET['image'];
		}
	}
}

// if there was a problem, use default image
if(!$name){
	$image = 'images/unavailable.jpeg';
	$name = 'unavailable.jpeg';
}

// get the image info
$info = getimagesize($image);
$fs = filesize($image);

// send the content info
header("Content-type: {$info['mime']}\n");
header("Content-Disposition: inline;filename=\"$name\"\n");
header("Content-Length: $fs\n");

// send the file
readfile($image);
