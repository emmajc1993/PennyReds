<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Admin Events";
$page_description = "Edit the events happening at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>

<script type="text/javascript">
function makesure() {
	if (confirm('Are you sure you wish to delete this event? This action is irreversible!')) {
		return true;
	}
	else {
		return false;
	}
}
</script>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="text" name="search">
	<input type="submit" name="searchButton" value="Search">
</form>

<br>
<?php



if(isset($_POST['searchButton'])){
	$search = $_POST['search'];
}else if(!isset($_POST['searchButton'])){
	$search = '';
}

//Variables
$dbc = mysqli_connect('localhost', 'root', 'root', 'PennyReds') or DIE("Cannot find specified server");
// $eventid = $_SESSION['eventid'];

$searchQuery = "SELECT * FROM events WHERE location LIKE '%".$_POST['search']."%' OR eventname LIKE '%".$_POST['search']."%' OR date LIKE '%".$_POST['search']."%' ORDER BY date ASC";

//Search the MySQL database with the text value on click
if(isset($_POST['searchButton'])){
	$searchResults = mysqli_query($dbc, $searchQuery);
	echo '<table border="1px">';
	echo '<tr class="header"><th>Event Name</th><th>Description</th><th>Location</th><th>Date</th><th>Time</th></tr>';
	while($row1 = mysqli_fetch_array($searchResults)){
		echo '<tr>';

		echo '<td><strong>';
		echo $row1['eventname'];
		echo '<strong></td>';
		
		echo '<td><strong>';
		echo $row1['eventdescription'];
		echo '</strong></td>';
		
		echo '<td><strong>';
		echo $row1['location'];
		echo '</strong></td>';
		
		echo '<td><strong>';
		echo $row1['date'];
		echo '</strong></td>';

		echo '<td><strong>';
		echo $row1['time'];
		echo '</strong></td>';

		echo '</tr>';
	}
	echo '</table>';
}
?>
<br>
<p><a href="newevent.php">Add a new event</a></p>    
</body>
</html>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Records</title>
</head>
<body>

	<?php

	mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
	mysql_select_db("PennyReds") or die("Couldnt find the database");
	
	// number of results to show per page
	$per_page = 10;
	
	// figure out the total pages in the database
	$result = mysql_query("SELECT * FROM events ORDER BY date ASC");
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
	
	// display pagination
	
	echo "<p><a href='events.php'><b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='events.php?page=$i'>$i</a> ";
	}
	echo "</p>";
	
	// display data in table
	echo "<table border='1' cellpadding='10'>";
	echo "<tr class='header'> <th>Event Name</th> <th>Description</th> <th>Location</th> <th>Date</th> <th>Time</th> </tr>";

	// loop through results of database query, displaying them in the table	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
		
		// echo out the contents of each row into a table
		echo "<tr>";
		// echo '<td>' . mysql_result($result, $i, 'eventid') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'eventname') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'eventdescription') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'location') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'date') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'time') . '</td>';
		echo '<td><a href="editevent.php?eventid=' . mysql_result($result, $i, 'eventid') . '">Edit</a></td>';
		echo '<td><a href="deleteevent.php?eventid=' . mysql_result($result, $i, 'eventid') . '" onclick="return makesure();">Delete</a></td>';
		echo "</tr>"; 
	}
	// close table>
	echo "</table>"; 
	
	// pagination
	
	?>
</body>
<?php
include ("footer.php");
?>
</html>