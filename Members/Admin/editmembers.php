<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
    echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php

function renderForm($userid, $fname, $lname, $dob, $contactno, $email_address, $height, $weight, $account_type, $error)
{
   ?>
   <?php
   $page_title = "Edit Members";
   $page_description = "Edit members that have registered for Penny Red's Pony Parties Riding School in Cornwall.";
   include ("../headerm.php");

   ?>

   <?php 
 // if there are any errors, display them
   if ($error != '')
   {
       echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
   }
   ?> 
   
   <form action="" method="post">

       <div class="loginbox">

        <div class="logincontainer">

          <div id="login">

            <h2>Edit Members</h2>

            <form action="" method="POST">

              <fieldset>
                <input type="hidden" name="userid" value="<?php echo $userid; ?>"/>

                <p><label for="fname">First Name</label></p>
                <p><input type="text" name="fname" value="<?php echo $fname; ?>"/></p>

                <p><label for="lname">Last Name</label></p>
                <p><input type="text" name="lname" value="<?php echo $lname; ?>"/></p>

                <p><label for="dob">DOB</label></p>
                <p><input type="date" name="dob" value="<?php echo $dob; ?>"/></p>

                <p><label for="contactno">Contact Number</label></p>
                <p><input type="text" name="contactno" value="<?php echo $contactno; ?>"/></p>

                <p><label for="email_address">Email Address</label></p>
                <p><input type="text" name="email_address" value="<?php echo $email_address; ?>"/></p>

                <p><label for="height">Height</label></p>
                <p><input type="text" name="height" value="<?php echo $height; ?>"/></p>

                <p><label for="weight">Weight</label></p>
                <p><input type="text" name="weight" value="<?php echo $weight; ?>"/></p>

                <p><label for="account_type">Account Type</label></p> 
                <p style="background-color: white;"><?php echo "<select name='account_type'>"; 
                echo '<option value="Member">Member</option>';
                echo '<option value="Admin">Admin</option>';
                echo '<option value="Staff">Staff</option>';
                echo "</select>";?></p>

                <input type="submit" name="submit" value="Edit Member">

            </fieldset>

        </form>

    </div> <!-- end login -->

</div>

</form>
</body>
</html> 
<?php
}



 // connect to the database
mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

 // check if the form has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit']))
{ 
 // confirm that the 'id' value is a valid integer before getting the form data
   if (is_numeric($_POST['userid']))
   {
 // get form data, making sure it is valid
       $userid = $_POST['userid'];
       $fname = mysql_real_escape_string(htmlspecialchars($_POST['fname']));
       $lname = mysql_real_escape_string(htmlspecialchars($_POST['lname']));
       $dob = mysql_real_escape_string(htmlspecialchars($_POST['dob']));
       $contactno = mysql_real_escape_string(htmlspecialchars($_POST['contactno']));
       $email_address = mysql_real_escape_string(htmlspecialchars($_POST['email_address']));
       $height = mysql_real_escape_string(htmlspecialchars($_POST['height']));
       $weight = mysql_real_escape_string(htmlspecialchars($_POST['weight']));
       $account_type = mysql_real_escape_string(htmlspecialchars($_POST['account_type']));
       
 // check that firstname/lastname fields are both filled in
       if ($userid == '' || $fname == '' || $lname == '' || $dob == '' || $contactno == '' || $email_address == '' || $height == '' || $weight == '' || $account_type == '')
       {
 // generate error message
           $error = 'ERROR: Please fill in all required fields!';
           
 //error, display form
           renderForm($userid, $fname, $lname, $dob, $contactno, $email_address, $height, $weight, $account_type, $error);
       }
       else
       {
 // save the data to the database
           mysql_query("UPDATE users SET userid='$userid',fname='$fname',lname='$lname',dob='$dob',contactno='$contactno',email_address='$email_address',height='$height',weight='$weight',account_type='$account_type' WHERE userid='$userid'")
           or die(mysql_error()); 
           
 // once saved, redirect back to the view page
           header("Location: members.php"); 
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
   if (isset($_GET['userid']) && is_numeric($_GET['userid']) && $_GET['userid'] > 0)
   {
 // query db
       $userid = $_GET['userid'];
       $result = mysql_query("SELECT * FROM users WHERE userid=$userid")
       or die(mysql_error()); 
       $row = mysql_fetch_array($result);
       
 // check that the 'id' matches up with a row in the databse
       if($row)
       {
           
 // get data from db
           $userid = $row['userid'];
           $fname = $row['fname'];
           $lname = $row['lname'];
           $dob = $row['dob'];
           $contactno = $row['contactno'];
           $email_address = $row['email_address'];
           $height = $row['height'];
           $weight = $row['weight'];
           $account_type = $row['account_type']; 
           
 // show form
           renderForm($userid, $fname, $lname, $dob, $contactno, $email_address, $height, $weight, $account_type, '');
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