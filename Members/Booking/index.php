<?php
session_start();
if (($_SESSION['account_type'])=="Admin" OR ($_SESSION['account_type'])=="Staff") {
	echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Bookings";
$page_description = "The lesson bookings for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>
<p><a href="newlesson.php">Add a new lesson</a></p><br />

<?php

// Select all the data from the categories table in your database and order them by the category_title
$sql = "SELECT * FROM lessons ORDER BY date DESC";
// Execute the SELECT query
$res = mysql_query($sql) or die(mysql_error());
$lessons = "";
// Check to make sure that the categories table has data in it
if (mysql_num_rows($res) > 0) {
	// Retrieve data from the categories table
	while ($row = mysql_fetch_assoc($res)) {
		// Assign local variables from each field in the categories table
		$lessonid = $row['lessonid'];
		$name = $row['name'];
		$description = $row['description'];
		$type = $row['type'];
		$time = $row['time'];
		$date = $row['date'];
		$location = $row['location'];
		$spaces = $row['spaces'];
		// Append the data from the categories table into a list of links
		$lessons .= "<div id='lessons'><a href='view_lessons.php?lessonid=".$lessonid."'>".$name."</a> - ".$description."<br /> ".$type." - ".$time." - ".$date." - ".$location." - ".$spaces."</a><br /><br /></div>";
	}
	// Display list of links
	echo $lessons;
} else {
	// If there are is no data in the categories table
	echo "<p>There are no categories available yet.</p>";
}
?>
</body>
<?php
include ("../../footer.html");
?>
</html>