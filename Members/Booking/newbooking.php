<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$page_title = "New Booking";
$page_description = "A new booking for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if (isset($_SESSION['account_type'])=="Admin" OR (isset($_SESSION['account_type'])=="Staff")) {
  echo "";
} else
header("Location: ../Users/fun.php");

$sql = "SELECT * FROM horses";
$result = mysqli_query($sql);

$sql2 = "SELECT fname, lname FROM users WHERE account_type='Admin' OR account_type='Staff'";
$result2 = mysqli_query($sql2);

?>
 <div class="loginbox">

    <div class="logincontainer">

      <div id="login">

        <h2>New Booking</h2>

        <form action="" method="POST">

          <fieldset>
            <table id="bookingform">
              <tr><td><label for="fname">First Name</label></td><td>
              <input type="text" name="fname" value="<?php echo $fname; ?>"/></td></tr>
              <br />
              <br/>
              <tr><td><label for="lname">Last Name</label></td><td>
              <input type="text" name="lname" value="<?php echo $lname; ?>"/></td></tr>
              <br />
              <br/>
  			      <tr><td><label for="height">Height</label></td><td>
              <input type="text" name="height" value="<?php echo $height; ?>"/></td></tr>
              <br/>
              <br/>
              <tr><td><label for="weight">Weight</label></td><td>
              <input type="text" name="weight" value="<?php echo $weight; ?>"/></td></tr>
              <br/>
              <br/>
              <tr><td><label for="horsename">Horse Name</label></td><td>
              <?php echo "<select name='horsename'>"; 
        				while ($row = mysqli_fetch_array($result)) {
        					echo "<option value='" . $row['horsename'] . "'>" . $row['horsename'] . "</option>";
        				}
        				echo "</select>";
        			?></td></tr>
              <br/>
              <br/>
              <tr><td><label for="additionaldetails">Additional Details</label></td><td>
              <textarea name="additionaldetails" id="additionaldetails" rows="4" cols="20"><?php echo $additionaldetails; ?></textarea></td></tr>
              <br/>
              <br/>
              <tr><td><label for="staffmember">Staff Member</label></td><td>
              <?php echo "<select name='staffmember'>"; 
        				while ($row = mysqli_fetch_array($result2)) {
        				echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
          			}
          			echo "</select>";
        			?></td></tr>
              <br/>
              <br/>
  			       <input type="hidden" name="lessonid" value="<?php echo $lessonid; ?>" />
              <tr><td><input type="submit" name="submit" value="New Booking"></td></tr>
            </fieldset>
          </table>
        </form>
      </div> <!-- end login -->

    </div>
 
 </form>

<?php

mysqli_connect("localhost","root","root") or die("Couldnt connect to the server");
mysqli_select_db("PennyReds") or die("Couldnt find the database");

 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $lessonid = mysqli_real_escape_string(htmlspecialchars($_POST['lessonid']));
 $fname = mysqli_real_escape_string(htmlspecialchars($_POST['fname']));
 $lname = mysqli_real_escape_string(htmlspecialchars($_POST['lname']));
 $height = mysqli_real_escape_string(htmlspecialchars($_POST['height']));
 $weight = mysqli_real_escape_string(htmlspecialchars($_POST['weight']));
 $horsename = mysqli_real_escape_string(htmlspecialchars($_POST['horsename']));
 $additionaldetails = mysqli_real_escape_string(htmlspecialchars($_POST['additionaldetails']));
 $staffmember = mysqli_real_escape_string(htmlspecialchars($_POST['staffmember']));
 
 // check to make sure both fields are entered
 if ($lessonid == '' || $fname == '' || $lname == '' || $height == '' || $weight == '' || $horsename == '' || $additionaldetails == '' || $staffmember == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($lessonid, $fname, $lname, $height, $weight, $horsename, $additionaldetails, $staffmember, $error);
 }
 else
 {
 // save the data to the database
 mysqli_query("INSERT INTO bookings SET lessonid='$lessonid', fname='$fname', lname='$lname', height='$height', weight='$weight', horsename='$horsename', additionaldetails='$additionaldetails', staffmember='$staffmember'")
 or die(mysqli_error()); 
 mysqli_query("UPDATE lessons SET spaces = spaces-1 WHERE lessonid=".$lessonid."")
 or die(mysqli_error());

 echo "Your booking has been registered. Click <a href=view_lessons.php>here</a> to return to the lessons page"; }
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

