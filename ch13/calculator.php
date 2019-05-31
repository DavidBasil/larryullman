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

	$quantity = (isset($_POST['quantity'])) 
		? filter_var($_POST['quantity'], FILTER_VALIDATE_INT, ['min_range' => 1]) 
		: NULL;

	$price = (isset($_POST['price']))
		? filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
		: NULL;

	$tax = (isset($_POST['tax']))
		? filter_var($_POST['tax'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
		: NULL;

	if(($quantity > 0) && ($price > 0) && ($tax > 0)){
		$total = $quantity * $price;
		$total += $total * ($tax/100);
		echo '<p>The total cost of purchasig '.$quantity.' widget(s) at $'.number_format($price, 2).' each, plus tax, is $'.number_format($total, 2).'.</p>';
	} else {
		echo '<p style="font-weight: bold; color: #C00">Please enter a valid quantity, price, and tax rate</p>';
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
