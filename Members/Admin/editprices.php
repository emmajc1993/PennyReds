<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
  echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Edit Prices";
$page_description = "Edit the prices for lessons at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");

?>

<?
$updateinfo = @$_POST['updateinfo2'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='5'");
$get_row = mysql_fetch_assoc($get_info);
$db_textfieldid = $get_row['textfieldid'];
$db_textfield = $get_row['textfield'];

  //Submit what the user types into the database
if ($updateinfo) {
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
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='5', textfield='$textfield' WHERE textfieldid='5'");
  echo "<div id='echotext'>Your profile info has been updated!</div>";
}
}
else
{
   //Do nothing
}

?>
<div id="priceleft">
  <form action="editprices.php" method="post">
    <p><strong>Private Lesson:</strong></p>
    <textarea name="textfield" id="textfield" rows="6" cols="20"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo" id="updateinfo2" value="Update">
  </form>
</div>

<?
$updateinfo2 = @$_POST['updateinfo2'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='6'");
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
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='6', textfield='$textfield' WHERE textfieldid='6'");
  echo "<div id='echotext'>Your profile info has been updated!</div>";
}
}
else
{
   //Do nothing
}

?>
<div id="pricemiddle1">
  <form action="editprices.php" method="post">
    <p><strong>Private Lesson:</strong></p>
    <textarea name="textfield" id="textfield" rows="6" cols="20"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo2" id="updateinfo2" value="Update">
  </form>
</div>

<?
$updateinfo3 = @$_POST['updateinfo3'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='7'");
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
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='7', textfield='$textfield' WHERE textfieldid='7'");
  echo "<div id='echotext'>Your profile info has been updated!</div>";
}
}
else
{
   //Do nothing
}

?>
<div id="pricemiddle2">
  <form action="editprices.php" method="post">
    <p><strong>Hacks:</strong></p> 
    <textarea name="textfield" id="textfield" rows="6" cols="20"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo3" id="updateinfo3" value="Update">
  </form>
</div>

<?
$updateinfo4 = @$_POST['updateinfo4'];

  //First Name, Last Name and About the user query
$get_info = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='8'");
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
  $info_submit_query = mysql_query("UPDATE editinfo SET textfieldid='8', textfield='$textfield' WHERE textfieldid='8'");
  echo "<div id='echotext'>Your profile info has been updated!</div>";
}
}
else
{
   //Do nothing
}

?>
<div id="priceright">
  <form action="editprices.php" method="post">
    <p><strong>Other:</strong></p> <textarea name="textfield" id="textfield" rows="6" cols="20"><? echo $db_textfield; ?></textarea></p>
    <input type="submit" name="updateinfo4" id="updateinfo4" value="Update">
  </form>
</div>

</body>
<?php
include ("footer.html");
?>
</html>