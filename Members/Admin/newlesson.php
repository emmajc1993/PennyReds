<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
    echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "New Lessons";
$page_description = "Add a new lesson at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>

<?php
function renderForm($horsename, $height, $weight, $error)
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

        <h2>New Horse</h2>

        <form action="" method="POST">

          <fieldset>
          	<input type="hidden" name="eventid"/>

            <p><label for="horsename">Horse Name</label></p>
            <p><input type="text" name="horsename"/></p>

            <p><label for="height">Height (hh)</label></p>
            <p><input type="text" name="height"/></p>

            <p><label for="weight">Weight</label></p>
            <p><input type="text" name="weight"/></p>

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
}



mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");


 // check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit']))
{ 
 // get form data, making sure it is valid
   $horsename = mysql_real_escape_string(htmlspecialchars($_POST['horsename']));
   $height = mysql_real_escape_string(htmlspecialchars($_POST['height']));
   $weight = mysql_real_escape_string(htmlspecialchars($_POST['weight']));
   
 // check to make sure both fields are entered
   if ($horsename == '' || $height == '' || $weight == '')
   {
 // generate error message
       $error = 'ERROR: Please fill in all required fields!';
       
 // if either field is blank, display the form again
       renderForm($horsename, $height, $weight, $error);
   }
   else
   {
 // save the data to the database
       mysql_query("INSERT INTO horses SET horsename='$horsename', height='$height', weight='$weight'")
       or die(mysql_error()); 
       
       echo "Your horse has been registered. Click <a href=horses.php>here</a> to return to the horse page"; }
   }
   else
   {
       renderForm('','','','','');
   }
   ?>