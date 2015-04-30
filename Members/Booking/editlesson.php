<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
    echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Edit Lesson";
$page_description = "Edit a lesson for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");

$sql = "SELECT * FROM horses";
$result = mysql_query($sql);

$sql2 = "SELECT fname, lname FROM users WHERE account_type='Admin' OR account_type='Staff'";
$result2 = mysql_query($sql2);
?>
<?php

 function renderForm($booking, $fname, $lname, $height, $weight, $horsename, $additionaldetails, $staffmember, $error)
 {
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
          	<input type="hidden" name="bookingid"/>

            <p><label for="fname">First Name</label></p>
            <p><input type="text" name="fname" value="<?php echo $fname; ?>"/></p>

            <p><label for="lname">Last Name</label></p>
            <p><input type="text" name="lname" value="<?php echo $lname; ?>"/></p>

            <p><label for="height">Height</label></p>
            <p><input type="text" name="height" value="<?php echo $height; ?>"/></p>

            <p><label for="weight">Weight</label></p>
            <p><input type="text" name="weight" value="<?php echo $weight; ?>"/></p>

            <p><label for="horsename">Horse Name</label></p>
            <?php echo "<select name='horsename'>"; 
                while ($row = mysql_fetch_array($result)) {
                    echo "<option value='" . $row['horsename'] . "'>" . $row['horsename'] . "</option>";
                }
                echo "</select>";
                ?>

            <p><label for="additionaldetails">Additional Details</label></p>
            <p style="background-color: white;" ><textarea name="additionaldetails" id="additionaldetails" rows="4" cols="30"><?php echo $additionaldetails; ?></textarea></p>

            <p><label for="staffmember">Staff Member</label></p>
            <?php echo "<select name='staffmember'>"; 
                while ($row = mysql_fetch_array($result2)) {
                echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
            }
            echo "</select>";
            ?></p>

            <input type="hidden" name="bookingid" value="<?php echo $bookingid; ?>" />

            <input type="submit" name="submit" value="Edit Lesson">

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>

 <?php
 }



 // connect to the database
 mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
 mysql_select_db("PennyReds") or die("Couldnt find the database");
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['bookingid']))
 {
 // get form data, making sure it is valid
 $bookingid = $_POST['bookingid'];
 $fname = mysql_real_escape_string(htmlspecialchars($_POST['fname']));
 $lname = mysql_real_escape_string(htmlspecialchars($_POST['lname']));
 $height = mysql_real_escape_string(htmlspecialchars($_POST['height']));
 $weight = mysql_real_escape_string(htmlspecialchars($_POST['weight']));
 $horsename = mysql_real_escape_string(htmlspecialchars($_POST['horsename']));
 $additionaldetails = mysql_real_escape_string(htmlspecialchars($_POST['additionaldetails']));
 $staffmember = mysql_real_escape_string(htmlspecialchars($_POST['staffmember']));

 // check that firstname/lastname fields are both filled in
 if ($bookingid == '' || $fname == '' || $lname == '' || $height == '' || $weight == '' || $horsename == '' || $additionaldetails == '' || $staffmember == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($bookingid, $fname, $lname, $height, $weight, $horsename, $additionaldetails, $staffmember, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE bookings SET bookingid='$bookingid',fname='$fname',lname='$lname',height='$height',weight='$weight',horsename='$horsename',additionaldetails='$additionaldetails',staffmember='$staffmember' WHERE lessonid='$lessonid'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view_lessons.php?lessonid=".$lessonid.""); 
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
 if (isset($_GET['bookingid']) && is_numeric($_GET['bookingid']) && $_GET['bookingid'] > 0)
 {
 // query db
 $bookingid = $_GET['bookingid'];
 $result = mysql_query("SELECT * FROM bookings WHERE bookingid=$bookingid")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $bookingid = $row['bookingid'];
 $fname = $row['fname'];
 $lname = $row['lname'];
 $height = $row['height'];
 $weight = $row['weight'];
 $horsename = $row['horsename'];
 $additionaldetails = $row['additionaldetails'];
 $staffmember = $row['staffmember'];
 
 // show form
 renderForm($bookingid, $fname, $lname, $height, $weight, $horsename, $additionaldetails, $staffmember, '');
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