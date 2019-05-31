<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Widget cost calculator</title>
</head>
<body>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// cast all varriables to a specific type
	$quantity = (int) $_POST['quantity'];
	$price = (float) $_POST['price'];
	$tax = (float) $_POST['tax'];
	// all variables should be positive
	if(($quantity > 0) && ($price > 0) && ($tax > 0)){
		$total = $quantity * $price;
		$total += $total * ($tax/100);
		// print results
		echo '<p>The total cost of purchasing '.$quantity.' widget(s) at $'.number_format($price, 2).' each,
			plus tax, is $'.number_format($total, 2).'</p>';
	} else {
		echo '<p style="font-weight: bold; color: #C00">Please enter a valid quantity and tax rate.</p>';
	}
}
?>

<h2>Widget cost calculator</h2>

<form action="calculator.php" method="post">
	<p>Quantity: <input type="number" name="quantity" step="1" min="1"
	value="<?php if(isset($quantity)) echo $quantity ?>"></p>
	<p>Price: <input type="number" name="price" step=".01" min="0.01"
	value="<?php if(isset($price)) echo $price ?>"></p>
	<p>Tax(%): <input type="text" name="tax" step=".01" min="0.01"
	value="<?php if(isset($tax)) echo $tax ?>"></p>
	<p><input type="submit" name="submit" value="Calculate"></p>
</form>

</body>
</html>
