<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Sorting</title>
</head>
<body>

<table border="0" cellspacing="3" cellpadding="3" align="center">
	<thead>
		<tr>
			<th><h2>Rating</h2></th>
			<th><h2>Title</h2></th>
		</tr>
	</thead>	
	<tbody>
<?php 
# script 2.8 - sorting.php

// create array
$movies = [
'Casablanca' => 10,
'To kill a mockingbird' => 10,
'The English Patient' => 2,
'Stranger than Fiction' => 9,
'Story of the weeping camel' => 5,
'Donnie Darko' => 7
];

// display movies in their orginial order
echo '<tr><td colspan="2"><strong>In their original order:</strong></td></tr>';
foreach($movies as $title => $rating){
	echo '<tr><td>'.$rating.'</td><td>'.$title.'</td></tr>'; 
}

// display movies sorted by title
ksort($movies);
echo '<tr><td colspan="2"><strong>Sorted by title:</strong></td></tr>';
foreach($movies as $title => $rating){
	echo '<tr><td>'.$rating.'</td><td>'.$title.'</td></tr>';
}

// display movies sorted by rating
arsort($movies);
echo '<tr><td colspan="2"><strong>Sorted by rating:</strong></td></tr>';
foreach($movies as $title => $rating){
	echo '<tr><td>'.$rating.'</td><td>'.$title.'</td></tr>';
}

?>
	</tbody>
</table>

</body>
</html>
