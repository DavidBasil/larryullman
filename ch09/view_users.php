<?php # script 10.4
// this script retrieves all the records from the users table using pagination

$page_title = 'View Current Users';
include('includes/header.html');

echo '<h2>Registred Users</h2>';

// required db
require_once('../mysqli_connect.php');

// number of records per page
$display = 10;

// determine how many pages there are
if(isset($_GET['p']) && is_numeric($_GET['p'])){
	$pages = $_GET['p'];
} else {
	// count the nuumber of records
	$q = "select count(user_id) from users";
	$r = @mysqli_query($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
	$records = $row[0];
	// calculate the number of pages
	if($records > $display){
		$pages = ceil($records/$display);
	} else {
		$pages = 1;
	}
}

// determine where in the database to start returning results
if(isset($_GET['s']) && is_numeric($_GET['s'])){
	$start = $_GET['s'];
} else {
	$start = 0;
}

// define the query
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display";
$r = @mysqli_query($dbc, $q);

// table
echo '<table width="60%">
	<thead>
		<tr>
			<th align="left"><strong>Edit</strong></th>
			<th align="left"><strong>Delete</strong></th>
			<th align="left"><strong>Last Name</strong></th>
			<th align="left"><strong>First Name</strong></th>
			<th align="left"><strong>Date registered</strong></th>
		</tr>
	</thead>
	<tbody>';

// fetch and print all records
$bg = '#eeeeee';

while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	$bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
	echo '<tr bgcolor="'.$bg.'">
		<td align="left"><a href="edit_user.php?id='.$row['user_id'].'">Edit</a></td>
		<td align="left"><a href="delete_user.php?id='.$row['user_id'].'">Edit</a></td>
		<td align="left">'.$row['last_name'].'</td>
		<td align="left">'.$row['first_name'].'</td>
		<td align="left">'.$row['dr'].'</td>
	</tr>';
	} // end of while loop

echo '</tbody></table>';
mysqli_free_result($r);
mysqli_close($dbc);

// make the links to other pages, if necesarry
if($pages > 1){
	echo '<br><p>';
	$current_page = ($start/$display) + 1;
	if($current_page != 1){
		echo '<a href="view_users.php?s='.($start-$display).'&p='.$pages.'">Previous</a>';
	}
	for($i = 1; $i <= $pages; $i++){
		if($i != $current_page){
			echo '<a href="view_users.php?s='.(($display * ($i -1))).'&p='.$pages.'">'.$i.'</a>';
		} else {
			echo $i.' ';
		}
	}
	// next button
	if($current_page != $pages){
		echo '<a href="view_users.php?s='.($start + $display).'&p'.$pages.'">Next</a>';
	}	
	echo '</p>';
} 

include('includes/footer.html');

?>
