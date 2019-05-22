<?php 
# script 3.4 - index.php

// this function creates ads
function create_ad(){
	echo '<div class="alert alert-info" role="alert">
		<p>This is annoying ad! This is annoying ad! This is annoying ad!</p>
	</div>';
} // end of function

$page_title = 'Welcome to this Site!';
include('includes/header.html');

// call ads function
create_ad();
?>

<div class="page-header">
	<h1>Content Header</h1>
</div>
<p>This is where the page-specific content goes. This section, and the corresponding header, will change from one page to the next.</p>
<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
	tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
	vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
	no sea takimata sanctus est Lorem ipsum dolor sit amet.
</p>

<?php 
// call the ads function
create_ad();
include('includes/footer.html'); 
?>
