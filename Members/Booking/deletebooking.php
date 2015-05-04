<?php
$page_title = "Delete Booking";
$page_description = "Delete a booking for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");

 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");


 // check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['bookingid']) && is_numeric($_GET['bookingid']))
{
 // get id value
	$lessonid = $_GET['lessonid'];
	$bookingid = $_GET['bookingid'];
	
 // delete the entry
	mysql_query("DELETE FROM bookings WHERE bookingid=" . $bookingid . "")
	or die(mysql_error()); 
	mysql_query("UPDATE lessons SET spaces = spaces + 1 where lessonid=".$lessonid."")
	or die(mysql_error());


 // redirect back to the view page


	header("Location: view_lessons.php?lessonid=".$lessonid."");
}
else
 // if id isn't set, or isn't valid, redirect back to view page
{
	header("Location: view_lessons.php?lessonid=".$lessonid."");
}

?>

</body>
<?php
include ("footer.php");
?>
</html>