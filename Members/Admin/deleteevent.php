<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php

 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

 // check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['eventid']) && is_numeric($_GET['eventid']))
{
 // get id value
	$eventid = $_GET['eventid'];
	
 // delete the entry
	$result = mysql_query("DELETE FROM events WHERE eventid='$eventid'")
	or die(mysql_error()); 
	
 // redirect back to the view page
	header("Location: events.php");
}
else
 // if id isn't set, or isn't valid, redirect back to view page
{
	header("Location: events.php");
}

?>