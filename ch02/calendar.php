<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Calendar</title>
</head>
<body>

<form action="calendar.php" method="post">
	
<?php 
# script 2.6 - calendar.php

// make months array
$months = [
	1 => 'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December'
];

// make days and years array
/* $days = range(1, 31); */
/* $years = range(2017, 2027); */

// make months pull-down menu
echo '<select name="month">';
foreach($months as $key => $value){
	echo "<option value=\"$key\">$value</option>\n";
}
echo '</select>';

// make days pull-down menu
echo '<select name="day">';
for($day = 1; $day <= 31; $day++){
	echo '<option value="'.$day.'">'.$day.'</option>';
}
echo '</select>';

// make the years pull-down menu
echo '<select name="year">';
for($year = 2017; $year <= 2027; $year++){
	echo '<option value="'.$year.'">'.$year.'</option>';
}
echo '</select>';

?>

</form>

</body>
</html>
