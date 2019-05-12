<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Multidimensional Arrays</title>
</head>
<body>

<p>Some North American States, Provinces and Territories.</p>

<?php 
# script 2.7 - multi.php

// create mexico array
$mexico = [
	'YU' => 'Yucatan',
	'BC' => 'Beja California',
	'OA' => 'Oaxaca'
];

// create us array
$us = [
	'MD' => 'Maryland',
	'IL' => 'Illinois',
	'PA' => 'Pennsylvania',
	'IA' => 'Iowa'
];

// create canada array
$canada = [
	'QC' => 'Quebec',
	'AB' => 'Alberta',
	'NT' => 'Northwest Territories',
	'YT' => 'Yukon',
	'PE' => 'Prince Edward Island'
];

// combine the arrays
$n_america = [
	'Mexico' => $mexico,
	'United States' => $us,
	'Canada' => $canada
];

// loop through the countries
foreach($n_america as $country => $list){
	// print a heading
	echo '<h2>'.$country.'</h2><ul>';
	// print each state
	foreach($list as $k => $v){
		echo '<li>'.$k.' - '.$v.'</li>';
	}
	// close the list
	echo '</ul>';
}

?>

</body>
</html>
