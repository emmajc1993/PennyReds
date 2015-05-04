<?php
$page_title = "Approve Forum Posts";
$page_description = "Approve posts for the forum at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");



mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
	// number of results to show per page
$per_page = 10;

	// figure out the total pages in the database
$result = mysql_query("SELECT id, topic_title FROM topics WHERE approved='Waiting' ORDER BY topic_date DESC");
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
echo "<tr class='header'><th>Topic Title</th></tr>";

	// loop through results of database query, displaying them in the table	
for ($i = $start; $i < $end; $i++)
{
		// make sure that PHP doesn't try to show results that don't exist
	if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
	echo "<tr>";
		// echo '<td>' . mysql_result($result, $i, 'id') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'topic_title') . '</td>';
	echo '<td><a href="editforum.php?id=' . mysql_result($result, $i, 'id') . '" style="background-color: white;">Edit</a></td>';
	echo "</tr>"; 
}
	// close table>
echo "</table>"; 

	// pagination

?>

<?php
	// number of results to show per page
$per_page = 10;

	// figure out the total pages in the database
$result = mysql_query("SELECT id, post_content FROM posts WHERE approved='Waiting' ORDER BY post_date DESC");
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
echo "<table class='forumtableright' border='1' cellpadding='10'>";
echo "<tr class='header'><th>Post Title</th></tr>";

	// loop through results of database query, displaying them in the table	
for ($i = $start; $i < $end; $i++)
{
		// make sure that PHP doesn't try to show results that don't exist
	if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
	echo "<tr>";
		// echo '<td>' . mysql_result($result, $i, 'id') . '</td>';
	echo '<td>' . mysql_result($result, $i, 'post_content') . '</td>';
	echo '<td><a href="editforum2.php?id=' . mysql_result($result, $i, 'id') . '" style="background-color: white;">Edit</a></td>';
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