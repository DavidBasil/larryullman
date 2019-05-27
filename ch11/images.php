<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Images</title>
	<script charset="utf-8" src="js/function.js"></script>
</head>
<body>

<p>Click on an image to view it in a separate window.</p>
<ul>

<?php  
// set timezone
date_default_timezone_set('Asia/Tbilisi');

// this script lists the images in the uploads directory
$dir = '../../../uploads';
$files = scandir($dir);

foreach($files as $image){
	if(substr($image, 0, 1) != '.'){
		// image size in pixels
		$image_size = getimagesize("$dir/$image");
		// image size in kb 
		$file_size = round((filesize("$dir/$image")) / 1024)." kb";
		// image upload date and time
		$image_date = date("F d, Y H:i:s", filemtime("$dir/$image"));
		// make image name's url
		$image_name = urlencode($image);
		echo "<li><a href=\"javascript:create_window('$image_name', $image_size[0], $image_size[1])\">$image</a> $file_size ($image_date)</li>\n";
	}
}

?>
</ul>

</body>
</html>
