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
if (isset($_GET['userid']) && is_numeric($_GET['userid']))
{
 // get id value
	$userid = $_GET['userid'];
	
 // delete the entry
	$result = mysql_query("DELETE FROM users WHERE userid='$userid'")
	or die(mysql_error()); 
	
 // redirect back to the view page
	header("Location: members.php");
}
else
 // if id isn't set, or isn't valid, redirect back to view page
{
	header("Location: members.php");
}

?>