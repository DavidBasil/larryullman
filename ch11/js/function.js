// pop up window function
function create_window(image, width, height){
	width = width + 10;
	height = height + 10;
	if(window.popup && !window.popup.closed){
		window.popup.resizeTo(width, height);
	}
	var specs = "location=no, scrollbars=no, menubar=no, toolbar=no, resizable=yes, left=0, top=0, width=" 
		+ width + ", height=" 
		+ height;
	var url = "show_image.php?image=" + image;
	popup = window.open(url, "ImageWindow", specs);
	popup.focus();
}
