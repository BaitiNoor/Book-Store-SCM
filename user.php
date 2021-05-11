<?php
	session_start();
		$page_title = 'View Admin!';
	include ('includes/header.html');
?>

<html>
<body>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #ffa07a;
  text-align: left;
  padding: 8px;
}

th {
  background-color: #ee7575;
}

tr {
  background-color: #ffffff;
}
</style>

<?php 
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

echo '<h1><center>View Admin</h1>';

require ('mysqli_connect.php');
		
// Define the query:
$q = "SELECT first_name,last_name,email, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, admin_id FROM admin ORDER BY registration_date ASC";		
$r = @mysqli_query ($db, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<center><p>There are currently $num registered admin.</p></center>\n";
	  
	// Table header:
	echo '<table align="center" border="5" cellspacing="5" cellpadding="5" width="100%">
	<tr>
		<td align="left"><b>Update</b></td>
		<td align="left"><b>First Name</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>Date Registered</b></td>
	</tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left"><a href="edit_user.php?id=' . $row['admin_id'] . '">update</a></td>
			<td align="left">' . $row['first_name'] . '</td>
			<td align="left">' . $row['last_name'] . '</td>
			<td align="left">' . $row['email'] . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysqli_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered admin users.</p>';
}

mysqli_close($db);

?>
</html>
</body>
