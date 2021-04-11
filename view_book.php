<?php
	session_start();
		$page_title = 'View Book!';
	include ('includes/header.html');
?>
<?php 
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

echo '<h1><center>View Book</h1>';

require ('mysqli_connect.php');
		
// Define the query:
$q = "SELECT title,type,genre,author,edition,publication,isbn,image, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, book_id FROM bookinfo ORDER BY title ASC";		
$r = @mysqli_query ($db, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered books.</p>\n";
	  
	// Table header:
	echo '<table align="center" border="5" cellspacing="5" cellpadding="5" width="100%">
	<tr>
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
		<td align="left"><b>Title</b></td>
		<td align="left"><b>Type</b></td>
		<td align="left"><b>Genre</b></td>
		<td align="left"><b>Author</b></td>
		<td align="left"><b>Edition</b></td>
		<td align="left"><b>Publication</b></td>
		<td align="left"><b>Isbn</b></td>
		<td align="left"><b>Image</b></td>
		<td align="left"><b>Date Registered</b></td>
	</tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left"><a href="edit_book.php?id=' . $row['book_id'] . '">Edit</a></td>
			<td align="left"><a href="delete_book.php?id=' . $row['book_id'] . '">Delete</a></td>
			<td align="left">' . $row['title'] . '</td>
			<td align="left">' . $row['type'] . '</td>
			<td align="left">' . $row['genre'] . '</td>
			<td align="left">' . $row['author'] . '</td>
			<td align="left">' . $row['edition'] . '</td>
			<td align="left">' . $row['publication'] . '</td>
			<td align="left">' . $row['isbn'] . '</td>
			<td align="left">'.'<img src= "data:image;base64, '.base64_encode($row['image']).'" alt="image" style="width:100px; height=100px;">' . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>
		';
	}

	echo '</table>';
	mysqli_free_result ($r);	

} else { // If no records were returned.
	echo '<p class="error">There are currently no registered books.</p>';
}

mysqli_close($db);

?>