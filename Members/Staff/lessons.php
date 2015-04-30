<?php
session_start();
if (($_SESSION['account_type'])=="Admin" OR ($_SESSION['account_type'])=="Staff") {
    
} else
	header("Location: ../Users/fun.php");
?>
<?php 
include ("../headerm.php");
?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search">
        <input type="submit" name="searchButton" value="Search">
    </form>
   
<br>
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

$searchQuery = "SELECT * FROM bookings WHERE location LIKE '%".$_POST['search']."%' OR staffmember LIKE '%".$_POST['search']."%' OR date LIKE '%".$_POST['search']."%' OR horsename LIKE '%".$_POST['search']."%' ORDER BY date ASC";;


//Search the MySQL database with the text value on click
if(isset($_POST['searchButton'])){
    $searchResults = mysqli_query($dbc, $searchQuery);
    echo '<table border="1px">';
    echo '<tr class="header"><th>Horse Name</th><th>Lesson Name</th><th>Lesson Type</th><th>Location</th><th>Date</th><th>Time</th><th>Additional Details</th><th>Staff Member</th></tr>';
    while($row1 = mysqli_fetch_array($searchResults)){
        echo '<tr>';
        
        echo '<td><strong>';
        echo $row1['horsename'];
        echo '</strong></td>';
        
        echo '<td><strong>';
        echo $row1['lessonname'];
        echo '</strong></td>';
        
        echo '<td><strong>';
        echo $row1['lessontype'];
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

        echo '<td><strong>';
        echo $row1['additionaldetails'];
        echo '</strong></td>';

        echo '<td><strong>';
        echo $row1['staffmember'];
        echo '</strong></td>';

        echo '</tr>';
    }
    echo '</table>';
}
?>
<br>
    
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
		$lessons .= "<a href='view_lessons.php?lessonid=".$lessonid."'>".$name."</a> - ".$description." - ".$type." - ".$time." - ".$date." - ".$location." - ".$spaces."</a>";
	}
	// Display list of links
	echo $lessons;
} else {
	// If there are is no data in the categories table
	echo "<p>There are no categories available yet.</p>";
}
?>
</div>
</div>

</body>
<?php
include ("footer.php");
?>
</html>