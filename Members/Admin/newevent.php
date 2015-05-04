<?php
$page_title = "New Event";
$page_description = "Add a new event at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
	header("Location: ../Users/fun.php");
 function renderForm($eventname, $eventdescription, $location, $date, $time, $error)
 {
 ?>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
  <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 

<div class="loginbox">

    <div class="logincontainer">

      <div id="login">

        <h2>Edit Event</h2>

        <form action="" method="POST">

          <fieldset>
            <table>
              	<input type="hidden" name="eventid"/>

                <tr><td><label for="eventname">Event Name</label></td><td>
                <input type="text" name="eventname" value="<?php echo $eventname; ?>"/></td></tr>

                <tr><td><label for="eventdescription">Event Description</label></td><td>
                <p style="background-color: white;" ><textarea name="eventdescription" id="eventdescription" rows="4" cols="20"><?php echo $eventdescription; ?></textarea></td></tr>

                <tr><td><label for="location">Location</label></td><td>
                <input type="text" name="location" value="<?php echo $location; ?>"/></td></tr>

                <tr><td><label for="date">Date</label></td><td>
                <input type="date" name="date" value="<?php echo $date; ?>"/></td></tr>

                <tr><td><label for="time">Time</label></td><td>
                <input type="time" name="time" value="<?php echo $time; ?>"/></td></tr>

                <tr><td><input type="submit" name="submit" value="New Event"></td></tr>
            </table>
          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>
 
 </form> 
 <?php 
 }
 


mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $eventname = mysql_real_escape_string(htmlspecialchars($_POST['eventname']));
 $eventdescription = mysql_real_escape_string(htmlspecialchars($_POST['eventdescription']));
 $location = mysql_real_escape_string(htmlspecialchars($_POST['location']));
 $date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
 $time = mysql_real_escape_string(htmlspecialchars($_POST['time']));
 
 // check to make sure both fields are entered
 if ($eventname == '' || $eventdescription == '' || $location == '' || $date == '' || $time == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($eventname, $eventdescription, $location, $date, $time, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT INTO events SET eventname='$eventname', eventdescription='$eventdescription', location='$location', date='$date', time='$time'")
 or die(mysql_error()); 
 
 echo "Your event has been registered. Click <a href=events.php>here</a> to return to the events page"; }
 }
 else
 {
 renderForm('','','','','');
 }
?>
</body>
<?php
include ("footer.html");
?>
</html>
