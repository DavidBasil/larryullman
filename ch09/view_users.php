<?php # script 9.4 - view_users.php
// this script gets all records from users table

$page_title = 'View all users';
include('includes/header.html');

// page header
echo '<h2>Registered Users</h2>';

// connect to db
require('../mysqli_connect.php');

// make the query
$q = "select concat(last_name, ', ', first_name) as name,
date_format(registration_date, '%M %d, %Y') as dr 
from users order by registration_date asc";
$r = @mysqli_query($dbc, $q);

// count the number of returned rows
$num = mysqli_num_rows($r);

// if it ran ok, display the results
if($num > 0){
	// print how many users there are
	echo '<p>There are currently '.$num.' registered users.</p>';
	// table header
	echo '<table width="60%">
		<thead>
			<tr>
				<th align="left">Name</th>
				<th align="left">Date registered</th>
			</tr>
		</thead>	
	<tbody>';
	// fetch and print all records
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	echo '<tr><td align="left">'.$row['name'].'</td><td align="left">'.$row['dr']
		.'</td></tr>';
	}
	echo '</tbody></table>';
	// free up resources
	mysqli_free_result($r);
} else {
	echo '<p class="error">There are currently no registered users</p>';
}
// close db
mysqli_close($dbc);
include('includes/footer.html');

?>
