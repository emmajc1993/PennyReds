<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$page_title = "View Category";
$page_description = "View a forum category for the forum on Penny Red's Pony Parties Riding School in Cornwall.";
include ('headerf.php');
?>
<div id="wrapper">

<?

include_once("connect.php");

// Function that will count how many replies each topic has
function topic_replies($cid, $tid) {
	$sql = "SELECT count(*) AS topic_replies FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
	$res = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($res);
	return $row['topic_replies'] - 1;
}
// Function that will convert a user id into their username
function getusername($username) {
	$sql = "SELECT username FROM users WHERE userid='".$username."'";
	$res = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($res);
	return $row['username'];
}
// Function that will convert the datetime string from the database into a user-friendly format
function convertdate($date) {
	$date = strtotime($date);
	return date("M j, Y g:ia", $date);
}

$cid = $_GET['cid'];
?>

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


$searchQuery = "SELECT * FROM topics WHERE topic_title LIKE '%".$_POST['search']."%' ORDER BY topic_date DESC";


//Search the MySQL database with the text value on click
if(isset($_POST['searchButton'])){
	$searchResults = mysqli_query($dbc, $searchQuery);
	echo '<table border="1px">';
	echo '<tr class="header"><th>Topic</th></tr>';
	while($row1 = mysqli_fetch_array($searchResults)){
		echo '<tr>';

		echo '<td><strong style="background-color: white;">';
		echo $row1['topic_title'];
		echo '</strong></td>';
		
		echo '</tr>';
	}
	echo '</table>';
}


// Check to see if the person accessing this page is logged in
if (isset($_SESSION['username'])) {
	$logged = " <a href='create_topic.php?cid=".$cid."'>Click Here To Create A Topic</a>";
} else {
	$logged = " | Please log in to create topics in this forum.";
}
// Query that checks to see if the category specified in the $cid variable actually exists in the database
$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
// Execute the SELECT query
$res = mysql_query($sql) or die(mysql_error());
// Check if the category exists
if (mysql_num_rows($res) == 1) {
	// Select the topics that are associated with this category id and order by the topic_reply_date
	$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' AND approved='Yes' ORDER BY topic_reply_date DESC";
	// Execute the SELECT query
	$res2 = mysql_query($sql2) or die(mysql_error());
	// Check to see if there are topics in the category
	if (mysql_num_rows($res2) > 0) {
		// Appending table data to the $topics variable for output on the page
		$topics .= "<table class='forumtable' width='100%'>";
		$topics .= "<tr><td colspan='4'>".$logged."</td></tr>";
		$topics .= "<tr><td>Topic Title</td><td width='65'>Replies</td><td width='65'>Views</td></tr>";
		$topic .= "<tr><td colspan='4'><hr /></td><tr>";
		// Fetching topic data from the database
		while ($row = mysql_fetch_assoc($res2)) {
			// Assign local variables from the database data
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$date = $row['topic_date'];
			$creator = $row['topic_creator'];
			
			// Append the actual topic data to the $topics variable
			$topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by: ".getusername($creator)." on ".convertdate($date)."</span></td><td>".topic_replies($cid, $tid)."</td><td>".$views."</td></tr>";
			$topics .= "<tr><td colspan='4'><hr /></td></tr>";
		}
		$topics .= "</table>";
		// Displaying the $topics variable on the page
		echo $topics;
	} else {
		// If there are no topics
		echo "<a href='view_category.php?cid=1'>Return To Forum Index</a><hr />";
		echo "<p>There are no topics in this category yet.".$logged."</p>";
	}
} else {
	// If the category does not exist
	echo "<a href='view_category.php?cid=1'>Return To Forum Index</a><hr />";
	echo "<p>You are trying to view a category that does not exist yet.";
}
?>
</div>
</body>
<?php
include ("footer.html");
?>
</html>