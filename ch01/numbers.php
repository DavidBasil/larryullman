<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Numbers</title>
</head>
<body>

<?php 
# script 1.8 - numbers.php

// set the variables
$quantity = 30; // buying 30 widgets
$price = 119.95;
$taxrate = .05; // 5% sales tax

// calculate the total
$total = $quantity * $price;
$total = $total + ($total * $taxrate); // calculate and add the tax

// format the total
$total = number_format($total, 2);

// print the results
echo '<p>
You are purchasing <strong>'.$quantity . '</strong> widget(s) at a cost of
<strong>'. $price . '</strong> each. With tax, the total comes to <strong>$'. $total . '</strong>.
</p>';

?>

</body>
</html>
