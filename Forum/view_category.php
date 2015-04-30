<?php

include ('headerf.php');
?>
<div id="wrapper">
<?php
// Check to see if the person accessing this page is logged in
if (!isset($_SESSION['username'])) {
	echo "<form action='login_parse.php' method='post'>
	Username: <input type='text' name='username' />&nbsp;
	Password: <input type='password' name='password' />&nbsp;
	<input type='submit' name='submit' value='Log In' />
	";
} 
?>

<?
// Connect to the database
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

// Assign local variables
$cid = $_GET['cid'];

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
		$topics .= "<table width='100%' style='border-collapse: collapse;'>";
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
			// Check to see if the topic has every been replied to
			
			// Append the actual topic data to the $topics variable
			$topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by: ".getusername($creator)." on ".convertdate($date)."</span></td><td>".topic_replies($cid, $tid)."</td><td>".$views."</td></tr>";
			$topics .= "<tr><td colspan='4'><hr /></td></tr>";
		}
		$topics .= "</table>";
		// Displaying the $topics variable on the page
		echo $topics;
	} else {
		// If there are no topics
		echo "<a href='start.php'>Return To Forum Index</a><hr />";
		echo "<p>There are no topics in this category yet.".$logged."</p>";
	}
} else {
	// If the category does not exist
	echo "<a href='start.php'>Return To Forum Index</a><hr />";
	echo "<p>You are trying to view a category that does not exist yet.";
}
?>
</div>
</body>
<?php
include ("footer.html");
?>
</html>