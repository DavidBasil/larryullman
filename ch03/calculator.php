<?php 
# script 3.5 - calculator.php

// function to create radio buttons
// takes one arguments: value
// makes button "sticky"
function create_radio($value, $name='gallon_price'){
	// start the element
	echo '<input type="radio" name="'.$name.'" value="'.$value.'"';
	// check for stickiness
	if(isset($_POST[$name]) && ($_POST[$name] == $value)){
		echo ' checked="checked"';
	}
	// complete the element
	echo '> '.$value.' ';
} // end of function

// function to calculate the cost of the trip
// take 3 arguments: distance, fuel efficiency and the price per gallon
// function returns total cost
function calculate_trip_cost($miles, $mpg, $ppg){
	// get the number of gallons
	$gallons = $miles/$mpg;
	// get the cost of those gallons
	$dollars = $gallons * $ppg;
	// return the formatted cost
	return number_format($dollars, 2);
} // end of functions


$page_title = 'Trip Cost Calculator';
include('includes/header.html');

// check for form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// minimal form validation
	if(isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) && is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency'])){
		// calculate the results
		$cost = calculate_trip_cost($_POST['distance'], $_POST['efficiency'], $_POST['gallon_price']);
		$hours = $_POST['distance'] / 65;
		// print the results
		echo '<div class="page-header">
			<h1>Total Estimated Cost</h1>
			</div>
			<p>The total cost of driving'.$_POST['distance'].' miles, averaging '.$_POST['efficiency'].' miles per gallon and paying an average of $'.$_POST['gallon_price'].' per gallon, is $'.$cost.'. If you drive at an average of 65 miles per hour, the trip will take approcimately '.number_format($hours, 2).' hours.</p>';
	} else {
		// invalid sumbmitted values
		echo '<div class="page-header">
			<h1>Erro!</h1>
		</div>
		<p class="text-danger">Please enter a valid distance, price per gallon, and fuel efficiency.</p>';
	}
} // end of main submission IF

?>

<div class="page-header">
	<h1>Trip cost calculator</h1>
	<form action="calculator.php" method="post">
		<p>Distance (in miles): <input type="number" name="distance" value="<?php if (isset($_POST['distance'])) echo $_POST['distance']; ?>"></p>
		<p>Average price per gallon: 
		<?php 
		create_radio('3.00');
		create_radio('3.50');
		create_radio('4.00');
	 	?>
		</p>
		<p>Fuel Efficiency: <select name="efficiency">
				<option value="10" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo 'selected="selected"' ?>>Terrible</option>	
				<option value="20" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo 'selected="selected"' ?>>Decent</option>	
				<option value="30" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo 'selected="selected"' ?>>Very Good</option>	
				<option value="50" <?php if(isset($_POST['efficiency']) && ($_POST['efficiency'] == '40')) echo 'selected="selected"'?>>Outstanding</option>	
			</select>
		</p>
		<p><input type="submit" name="submit" value="Calculate"></p>
	</form>
</div>

<?php include('includes/footer.html') ?>
