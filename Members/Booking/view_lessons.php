<?php
$page_title = "View Lesson";
$page_description = "View lesson booking for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if (($_SESSION['account_type'])=="Admin" OR ($_SESSION['account_type'])=="Staff") {
	echo "";
} else
header("Location: ../Users/fun.php");

$lessonid = $_GET['lessonid'];
?>

<p><a href="newbooking.php?lessonid='" . $lessonid . "'">Add a new booking</a></p>

<?php


mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
	// number of results to show per page
$per_page = 10;
$lessonid = $_GET['lessonid'];
	// figure out the total pages in the database
$result = mysql_query("SELECT * FROM bookings WHERE lessonid='".$lessonid."'");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);

	// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
if (isset($_GET['page']) && is_numeric($_GET['page']))
{
	$show_page = $_GET['page'];
	
		// make sure the $show_page value is valid
	if ($show_page > 0 && $show_page <= $total_pages)
	{
		$start = ($show_page -1) * $per_page;
		$end = $start + $per_page; 
	}
	else
	{
			// error - show first set of results
		$start = 0;
		$end = $per_page; 
	}		
}
else
{
		// if page isn't set, show first set of results
	$start = 0;
	$end = $per_page; 
}

	// display data in table
echo "<table class='forumtableleft' border='1' cellpadding='10'>";
echo "<tr class='header'><th>First Name</th><th>Last Name</th><th>Height</th><th>Weight</th><th>Horsename</th><th>Additional Details</th><th>Staff Member</th></tr>";

	// loop through results of database query, displaying them in the table	
for ($i = $start; $i < $end; $i++)
{
		// make sure that PHP doesn't try to show results that don't exist
	if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
	echo "<tr>";
	echo '<td>' . mysql_result($result, $i, 'fname') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'lname') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'height') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'horsename') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'additionaldetails') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'staffmember') . '</td>';
	echo '<td><a href="editlesson.php?bookingid=' . mysql_result($result, $i, 'bookingid') . '" style="background-color: white;">Edit</a></td>';
	echo '<td><a href="deletebooking.php?bookingid=' . mysql_result($result, $i, 'bookingid') . '" style="background-color: white;">Delete</a></td>';
	echo "</tr>"; 
}
	// close table>
echo "</table>"; 

	// pagination

?>
</body>
<?php
include ("footer.html");
?>
</html>