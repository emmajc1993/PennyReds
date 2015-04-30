<?php
session_start();
if (($_SESSION['account_type'])=="Admin"){
    echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Bookings";
$page_description = "The lesson bookings for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");

$sql2 = "SELECT fname, lname FROM users WHERE account_type='Admin' OR account_type='Staff'";
$result2 = mysql_query($sql2);

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

        <h2>New Lesson</h2>

        <form action="" method="POST">

          <fieldset>
            <input type="hidden" name="lessonid"/>

            <p><label for="name">Name</label></p>
            <p><input type="text" name="name"/></p>

            <p><label for="description">Description</label></p>
            <p><input type="text" name="description"/></p>

            <p><label for="type">Type</label></p>
            <p><select name="type">
                <option value="Group">Group</option>
                <option value="Private">Private</option>
                <option value="Hack">Hack</option>
                <option value="Pony Day">Pony Day</option>
                <option value="Other">Other</option>
            </select>

            <p><label for="time">Time</label></p>
            <p><input type="time" name="time"/></p>

            <p><label for="date">Date</label></p>
            <p><input type="date" name="date"/></p>

            <p><label for="location">Location</label></p>
            <p><input type="text" name="location"/></p>

            <p><label for="spaces">Spaces</label></p>
            <p><input type="text" name="spaces"/></p>

            <p><label for="staffmember">Staff Member</label></p>
            <?php echo "<select name='staffmember'>"; 
                while ($row = mysql_fetch_array($result2)) {
                echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
                }
                echo "</select>";
            ?></p>

            <input type="submit" name="submit" value="New Lesson">

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>
 
 </form> 
 </body>
 
<div id="footer">
                <ul>
                    <li><a href="./AiW-Help.html">Help</a></li>
                    <li><a href="./AiW-PrivacyCookies.html">Privacy &amp; Cookies</a></li>
                    <li><a href="./AiW-Accessibility.html">Accessibility</a></li>
                    <li><a href="./AiW-TermsOUse.html">Terms of Use</a></li>
                </ul>
            </div> <!-- End of footer -->
    </body>
</html>
 <?php 

mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $lessonid = mysql_real_escape_string(htmlspecialchars($_POST['lessonid']));
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
 $type = mysql_real_escape_string(htmlspecialchars($_POST['type']));
 $time = mysql_real_escape_string(htmlspecialchars($_POST['time']));
 $date = mysql_real_escape_string(htmlspecialchars($_POST['date']));
 $location = mysql_real_escape_string(htmlspecialchars($_POST['location']));
 $spaces = mysql_real_escape_string(htmlspecialchars($_POST['spaces']));
 $staffmember = mysql_real_escape_string(htmlspecialchars($_POST['staffmember']));
 
 // check to make sure both fields are entered
 if ($name == '' || $description == '' || $type == '' || $time == '' || $date == '' || $location == '' || $spaces == '' || $staffmember == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($name, $description, $type, $time, $date, $location, $spaces, $staffmember);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT INTO lessons SET lessonid='$lessonid', name='$name', description='$description', type='$type', time='$time', date='$date', location='$location', spaces='$spaces', staffmember='$staffmember'")
 or die(mysql_error()); 
 
 echo "Your lesson has been registered. Click <a href=index.php>here</a> to return to the lessons page"; }
 }
 else
 {
 renderForm('','','','','');
 }
?>
</body>
<?php
include ("footer.php");
?>
</html>