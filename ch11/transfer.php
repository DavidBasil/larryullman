<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Transfer Funds</title>
</head>
<body>
<h2>Transfer Funds</h2>

<?php 
// this page uses transactions
require('../mysqli_connect.php');

// check form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// form validation
	if(isset($_POST['from'], $_POST['to'], $_POST['amount']) && 
		is_numeric($_POST['from']) && is_numeric($_POST['to']) && is_numeric($_POST['amount'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
		$amount = $_POST['amount'];
		// make sure enough funds are available
		$q = "select balanc from account where account_id=$from";
		$r = @mysqli_query($dbc, $q);
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		if($amount > $row['balance']){
			echo '<p class="error">Insufficient funds to complete the transfer</p>';
		} else {
			// turn autocommit off
			mysqli_autocommit($dbc, FALSE);
			$q = "update accounts set balance=balance-$amount where account_id=$from";
			$r = @mysqli_query($dbc, $q);
			if(mysqli_affected_rows($dbc) == 1){
				$q = "update accounts set balance=balance+amount where account_id=$to";
				$r = @mysqli_query($dbc, $q);
				if(mysqli_affected_rows($dbc) == 1){
					mysqli_commit($dbc);
					echo '<p>The transfer was a success</p>';
				} else {
					mysqli_rollback($dbc);
					echo '<p>The transfer could not be made due to a system error. We apologize for any inconvenience.</p>';
					echo '<p>'.mysqli_error($dbc).'<br>Query: '.$q.'</p>';
				}
			} else {
				mysqli_rollback($dbc);
				echo '<p>The transfer could not be made due to a system error. We apologize for any inconvenience</p>';
				echo '<p>'.mysqli_error($dbc).'<br>Query: '.$q.'</p>';
			}
		}
	} else {
		echo '<p>Please select a valid "from" and "to" account and enter a numeric amount to transfer.</p>';
	}
	return false;
}

// get all accounts and balances
$q = "select account_id , concat(last_name, ', ', first_name) as name, 
	type, balance from accounts left join customers using (customer_id) order by name";
$r = @mysqli_query($dbc, $q);
$options = '';
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	$options .= "<option value=\"{$row['account_id']}\">{$row['name']} ({$row['type']})\${$row['balance']}</option>\n";
}

// create the form
echo '<form action="transfer.php" method="post">
	<p>From Account: <select name="from">'.$options.'</select></p>
	<p>To Account: <select name="to">'.$options.'</select></p>
	<p>Amount: <input type="number" name="amount" step="0.01" min="1"></p>
	<p><input type="submit" name="submit" value="Submit"></p>
</form>';
mysqli_close($dbc);
?>

</body>
</html>
