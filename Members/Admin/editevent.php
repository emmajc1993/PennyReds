<?php
  function renderForm($eventid, $eventname, $eventdescription, $location, $date, $time, $error)
  {
?>
<?php
  $page_title = "Edit Event";
  $page_description = "Edit event page for Penny Red's Pony Parties Riding School in Cornwall.";
  include ("../headerm.php");
?>  
 <?php
 if ($error != '')
 {
   echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">

   <div class="loginbox">

    <div class="logincontainer">

      <div id="login">

        <h2>Edit Event</h2>

        <form action="" method="POST">

          <fieldset>
            <input type="hidden" name="eventid" value="<?php echo $eventid; ?>"/>

            <p><label for="eventname">Name</label></p>
            <p><input type="text" name="eventname" value="<?php echo $eventname; ?>"/></p>

            <p><label for="eventdescription">Event Description</label></p>
            <p style="background-color: white;" ><textarea name="eventdescription" id="eventdescription" rows="4" cols="30"><?php echo $eventdescription; ?></textarea></p>

            <p><label for="location">Location</label></p>
            <p><input type="text" name="location" value="<?php echo $location; ?>"/></p>

            <p><label for="date">Date</label></p>
            <p><input type="date" name="date" value="<?php echo $date; ?>"/></p>

            <p><label for="time">Time</label></p>
            <p><input type="time" name="time" value="<?php echo $time; ?>"/></p>

            <input type="submit" name="submit" value="Edit Event">

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>

  </form>

</body>
</html> 
<?php
}



mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

 // check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{ 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['eventid']))
 {
 // get form data, making sure it is valid
   $eventid = $_POST['eventid'];
   $eventname = mysql_real_escape_string(htmlspecialchars($_POST['eventname']));
   $eventdescription = mysql_real_escape_string(htmlspecialchars($_POST['eventdescription']));
   $location = mysql_real_escape_string(htmlspecialchars($_POST['location']));
   $date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
   $time = mysql_real_escape_string(htmlspecialchars($_POST['time']));

 // check that firstname/lastname fields are both filled in
   if ($eventid == '' || $eventname == '' || $eventdescription == '' || $location == '' || $date == '' || $time == '')
   {
 // generate error message
     $error = 'ERROR: Please fill in all required fields!';

 //error, display form
     renderForm($eventid, $eventname, $eventdescription, $location, $date, $time);
   }
   else
   {
 // save the data to the database
     mysql_query("UPDATE events SET eventid='$eventid',eventname='$eventname',eventdescription='$eventdescription',location='$location',date='$date',time='$time' WHERE eventid='$eventid'")
     or die(mysql_error()); 

 // once saved, redirect back to the view page
     header("Location: events.php"); 
   }
 }
 else
 {
 // if the 'id' isn't valid, display an error
   echo 'Error!';
 }
}
else
 // if the form hasn't been submitted, get the data from the db and display the form
{

 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['eventid']) && is_numeric($_GET['eventid']) && $_GET['eventid'] > 0)
 {
 // query db
   $eventid = $_GET['eventid'];
   $result = mysql_query("SELECT * FROM events WHERE eventid='$eventid'")
   or die(mysql_error()); 
   $row = mysql_fetch_array($result);

 // check that the 'id' matches up with a row in the databse
   if($row)
   {

 // get data from db
     $eventid = $row['eventid'];
     $eventname = $row['eventname'];
     $eventdescription = $row['eventdescription'];
     $location = $row['location'];
     $date = $row['date'];
     $time = $row['time'];

 // show form
     renderForm($eventid, $eventname, $eventdescription, $location, $date, $time, '');
   }
   else
 // if no match, display result
   {
     echo "No results!";
   }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
   echo 'Error!';
 }
}
?>
</body>
<?php
include ("footer.php");
?>
</html>