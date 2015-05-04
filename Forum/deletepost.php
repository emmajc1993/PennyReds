<?php

 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM posts WHERE id='$id' AND userid='$userid'")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: view_topic.php?cid=".$cid."&tid=".$tid."");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view_topic.php?cid=".$cid."&tid=".$tid."");
 }
 
?>