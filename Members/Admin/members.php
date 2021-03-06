<?php
$page_title = "Admin Members";
$page_description = "A list of members for admin at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");
?>
<script type="text/javascript">
function makesure() {
	if (confirm('Are you sure you wish to delete this member? This action is irreversible!')) {
		return true;
	}
	else {
		return false;
	}
}
</script>
<br />
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="text" name="search">
	<input type="submit" name="searchButton" value="Search">
</form>
<?php
session_start();

if(isset($_POST['searchButton'])){
	$search = $_POST['search'];
}else if(!isset($_POST['searchButton'])){
	$search = '';
}

//Variables
$dbc = mysqli_connect('localhost', 'root', 'root', 'PennyReds') or DIE("Cannot find specified server");
$userid = $_SESSION['userid'];

$searchQuery = "SELECT * FROM users WHERE lname LIKE '%".$_POST['search']."%' OR email_address LIKE '%".$_POST['search']."%' OR fname LIKE '%".$_POST['search']."%' ORDER BY lname ASC";


//Search the MySQL database with the text value on click
if(isset($_POST['searchButton'])){
	$searchResults = mysqli_query($dbc, $searchQuery);
	echo '<table border="1px">';
	echo '<tr class="header"><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Contact Number</th><th>Email Address</th><th>Height</th><th>Weight</th><th>Account Type</th></tr>';
	while($row1 = mysqli_fetch_array($searchResults)){
		echo '<tr>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['fname'];
		echo '</strong></td>';
		
		echo '<td><strong style="background-color: white;">';
		echo $row1['lname'];
		echo '</strong></td>';
		
		echo '<td><strong style="background-color: white;">';
		echo strftime("%d/%m/%Y",strtotime($row1['dob']));
		echo '</strong></td>';
		
		echo '<td><strong style="background-color: white;">';
		echo $row1['contactno'];
		echo '</strong></td>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['email_address'];
		echo '</strong></td>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['height'];
		echo '</strong></td>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['weight'];
		echo '</strong></td>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['account_type'];
		echo '</strong></td>';

		echo '<td><a href="editmembers.php?userid=' . mysql_result($result, $i, 'userid') . '" style="background-color: white;">Edit</a></td>';
		echo '<td><a href="deletemembers.php?userid=' . mysql_result($result, $i, 'userid') . '" style="background-color: white;">Delete</a></td>';

		echo '</tr>';
	}
	echo '</table>';
}
?>
<br>
<!-- <p><a href="newhorse.php">Add a new record</a></p> -->    
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
	$result = mysql_query("SELECT * FROM users");
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
	
	echo "<p><a href='members.php'><b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='members.php?page=$i'>$i</a> ";
	}
	echo "</p>";
	
	// display data in table
	echo "<table border='1' cellpadding='10'>";
	echo "<tr class='header'> <th>First Name</th> <th>Last Name</th> <th>Date Of Birth</th> <th>Contact Number</th> <th>Email Address</th> <th class='heightbox'>Height</th> <th>Weight</th> <th>Account Type</th></tr>";

	// loop through results of database query, displaying them in the table	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . mysql_result($result, $i, 'fname') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'lname') . '</td>';
		$dob =  mysql_result($result, $i, 'dob');
		echo '<td>' . strftime("%d/%m/%Y",strtotime($dob)) . '</td>';
		echo '<td>' . mysql_result($result, $i, 'contactno') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'email_address') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'height') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'account_type') . '</td>';
		echo '<td><a href="editmembers.php?userid=' . mysql_result($result, $i, 'userid') . '" style="background-color: white;">Edit</a></td>';
		echo '<td><a href="deletemembers.php?userid=' . mysql_result($result, $i, 'userid') . '" onclick="return makesure();" style="background-color: white;">Delete</a></td>';
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