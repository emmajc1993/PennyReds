<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'lessons' table
*/

 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['lessonid']) && is_numeric($_GET['lessonid']))
 {
 // get id value
 $lessonid = $_GET['lessonid'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM lessons WHERE lessonid='$lessonid'")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: index.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: index.php");
 }
 
?>