<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
  echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Edit Information";
$page_description = "Edit the website information for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");

?>

<?
$updateinfo = @$_POST['updateinfo'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='1'");
$get_row = mysql_fetch_assoc($get_info);
$db_textfieldid = $get_row['textfieldid'];
$db_textfield = $get_row['textfield'];

  //Submit what the user types into the database
if ($updateinfo) {
 $textfield = @$_POST['textfield'];

 if (strlen($textfield) < 3) {
  echo "You must write more than 3 characters.";
} else
{
    //Submit the form to the database
  $info_submit_query = mysql_query("UPDATE editinfo SET textfield='$textfield' WHERE textfieldid='1'");
  echo "Your profile info has been updated!";
}
}
else
{
   //Do nothing
}

?>
<div id="textboxleft">
  <form action="editinfo.php" method="post">
    <p><strong>Homepage:</strong></p> <textarea name="textfield" id="textfield" rows="8" cols="40"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo" id="updateinfo" value="Update">
  </form>
</div>

<?
$updateinfo2 = @$_POST['updateinfo2'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='2'");
$get_row = mysql_fetch_assoc($get_info);
$db_textfieldid = $get_row['textfieldid'];
$db_textfield = $get_row['textfield'];

  //Submit what the user types into the database
if ($updateinfo2) {
 $textfield = @$_POST['textfield'];

 if (strlen($textfield) < 3) {
  echo "Your first name must be 3 more more characters long.";
}
else
 if (strlen($textfield) < 5) {
  echo "Your last name must be 5 more more characters long.";
}
else
{
    //Submit the form to the database
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='2', textfield='$textfield' WHERE textfieldid='2'");
  echo "Your profile info has been updated!";
}
}
else
{
   //Do nothing
}

?>
<div id="textboxright">
  <form action="editinfo.php" method="post">
    <p><strong>About Us:</strong></p>
    <textarea name="textfield" id="textfield" rows="8" cols="40"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo2" id="updateinfo2" value="Update">
  </form>
</div>

<?
$updateinfo3 = @$_POST['updateinfo3'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='3'");
$get_row = mysql_fetch_assoc($get_info);
$db_textfieldid = $get_row['textfieldid'];
$db_textfield = $get_row['textfield'];

  //Submit what the user types into the database
if ($updateinfo3) {
 $textfield = @$_POST['textfield'];

 if (strlen($textfield) < 3) {
  echo "Your first name must be 3 more more characters long.";
}
else
 if (strlen($textfield) < 5) {
  echo "Your last name must be 5 more more characters long.";
}
else
{
    //Submit the form to the database
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='3', textfield='$textfield' WHERE textfieldid='3'");
  echo "Your profile info has been updated!";
}
}
else
{
   //Do nothing
}

?>
<div id="textboxleft1">
  <form action="editinfo.php" method="post">
    <p><strong>Email:</strong></p> 
    <textarea name="textfield" id="textfield" rows="8" cols="40"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo3" id="updateinfo3" value="Update">
  </form>
</div>

<?
$updateinfo4 = @$_POST['updateinfo4'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='4'");
$get_row = mysql_fetch_assoc($get_info);
$db_textfieldid = $get_row['textfieldid'];
$db_textfield = $get_row['textfield'];

  //Submit what the user types into the database
if ($updateinfo4) {
 $textfield = @$_POST['textfield'];

 if (strlen($textfield) < 3) {
  echo "Your first name must be 3 more more characters long.";
}
else
 if (strlen($textfield) < 5) {
  echo "Your last name must be 5 more more characters long.";
}
else
{
    //Submit the form to the database
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='4', textfield='$textfield' WHERE textfieldid='4'");
  echo "Your profile info has been updated!";
}
}
else
{
   //Do nothing
}

?>
<div id="textboxright1">
  <form action="editinfo.php" method="post">
    <p><strong>Phone Number:</strong></p> <textarea name="textfield" id="textfield" rows="8" cols="40"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo4" id="updateinfo4" value="Update">
  </form>
</div>

</body>
<?php
include ("footer.php");
?>
</html>