<?php

 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['horseid']) && is_numeric($_GET['horseid']))
 {
 // get id value
 $horseid = $_GET['horseid'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM horses WHERE horseid='$horseid'")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: horses.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: horses.php");
 }
 
?>