<?php
$page_title = "Events";
$page_description = "Events page for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>      
<? 
include('../connect-db.php');
$per_page = 10;
		// Work out number of pages needed
if ($result = $mysqli->query("SELECT * FROM events ORDER BY date ASC"))
{
	if ($result->num_rows != 0)
	{
		$total_results = $result->num_rows;
		$total_pages = ceil($total_results / $per_page);
		// check page variable is set 
		if (isset($_GET['page']) && is_numeric($_GET['page']))
		{
			$show_page = $_GET['page'];
			if ($show_page > 0 && $show_page <= $total_pages)
			{
				$start = ($show_page -1) * $per_page;
				$end = $start + $per_page; 
			}
			else
			{
				$start = 0;
				$end = $per_page; 
			}               
		}
		else
		{
			$start = 0;
			$end = $per_page; 
		}

				// display pagination
		echo "<p><b>View Page:</b> ";
		for ($i = 1; $i <= $total_pages; $i++)
		{
			if (isset($_GET['page']) && $_GET['page'] == $i)
			{
				echo $i . " ";
			}
			else
			{
				echo "<a href='events.php?page=$i'>$i</a> ";
			}
		}
		echo "</p>";

						        // display data in table
		echo "<table border='1'>";
		echo "<tr class='header'><th>Event Name</th><th>Description</th><th>Location</th><th>Date</th><th>Time</th></tr>";
						        // loop through results of database query, displaying them in the table 
		for ($i = $start; $i < $end; $i++)
		{
						        	// make sure that PHP doesn't try to show results that don't exist
			if ($i == $total_results) { break; }

						        	// find specific row
			$result->data_seek($i);
			$row = $result->fetch_row();

   	 								// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td>' . $row[1] . '</td>';
			echo '<td>' . $row[2] . '</td>';
			echo '<td>' . $row[3] . '</td>';
			echo '<td>' . $row[4] . '</td>';
			echo '<td>' . $row[5] . '</td>';
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "No results to display!";
	} 
}
else
{
	echo "Error: " . $mysqli->error;
}
$mysqli->close();   
?>
</body>
<?php
include ("../footer.html");
?>
</html>