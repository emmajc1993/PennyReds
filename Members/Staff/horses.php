<?php
session_start();
if(($_SESSION['account_type'])=="Admin"){
	echo "";
} else
	header("Location: ../Users/fun.php");

include ("../headerm.php");
?>
<script type="text/javascript">
 function makesure() {
  if (confirm('Are you sure you wish to delete this horse?')) {
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

if(isset($_POST['searchButton'])){
    $search = $_POST['search'];
}else if(!isset($_POST['searchButton'])){
   $search = '';
}

//Variables
$dbc = mysqli_connect('localhost', 'root', 'root', 'PennyReds') or DIE("Cannot find specified server");

$searchQuery = "SELECT * FROM `horses` WHERE `horsename` LIKE '%".$_POST['search']."%' ORDER BY horsename ASC";


//Search the MySQL database with the text value on click
if(isset($_POST['searchButton'])){
    $searchResults = mysqli_query($dbc, $searchQuery);
    echo '<table border="1px">';
    echo '<tr class="header"><th>Horse ID</th><th>Horse Name</th><th>Height (hh)</th><th>Weight (kg)</th></tr>';
    while($row1 = mysqli_fetch_array($searchResults)){
        echo '<tr>';

        echo '<td><strong>';
        echo $row1['horseid'];
        echo '<strong></td>';
        
        echo '<td><strong>';
        echo $row1['horsename'];
        echo '</strong></td>';
        
        echo '<td><strong>';
        echo $row1['height'];
        echo '</strong></td>';
        
        echo '<td><strong>';
        echo $row1['weight'];
        echo '</strong></td>';

        echo '<td><a href="edithorse.php?horseid=' . $horseid . '">Edit</a></td>';
		echo '<td><a href="deletehorse.php?horseid=' . mysql_result($result, 'horseid') . '">Delete</a></td>';

        echo '</tr>';
    }
    echo '</table>';
}
?>
<br>
<p><a href="newhorse.php">Add a new record</a></p>    

<?php
	
	// number of results to show per page
	$per_page = 10;
	
	// figure out the total pages in the database
	$result = mysql_query("SELECT * FROM horses");
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
	
	echo "<p><a href='horses.php'><b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='horses.php?page=$i'>$i</a> ";
	}
	echo "</p>";
		
	// display data in table
	echo "<table border='1' cellpadding='10'>";
	echo "<tr class='header'> <th>Horse Name</th><th>Height (hh)</th> <th>Weight (kg)</th></tr>";

	// loop through results of database query, displaying them in the table	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
		echo "<tr>";
		// echo '<td>' . mysql_result($result, $i, 'horseid') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'horsename') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'height') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
		echo '<td><a href="edithorse.php?horseid=' . mysql_result($result, $i, 'horseid') . '">Edit</a></td>';
		echo '<td><a href="deletehorse.php?horseid=' . mysql_result($result, $i, 'horseid') . '" onclick="return makesure();">Delete</a></td>';
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