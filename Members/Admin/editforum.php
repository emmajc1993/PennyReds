<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
  echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php

function renderForm($id, $topic_title, $approved, $error)
{
 ?>
 <?php
    $page_title = "Approve Topic";
    $page_description = "Approve forum topic for Penny Red's Pony Parties Riding School in Cornwall.";
    include ("../headerm.php");

     $sql = "SELECT approved FROM topics LIMIT 3";
     $result = mysql_query($sql);
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

      <h2>Approve Topics</h2>

      <form action="" method="POST">

        <fieldset>
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>

          <p><label for="topic_title">Topic</label></p>
          <p><input type="text" name="topic_title" value="<?php echo $topic_title; ?>" readonly="true" style="background-colour:lightgrey;"/></p>

          <p><label for="approved">Approved</label></p>
          <p style="background-color: white;"><?php echo "<select name='approved'>"; 
          echo '<option value="Waiting">Waiting</option>';
          echo '<option value="Yes">Yes</option>';
          echo '<option value="No">No</option>';
          echo "</select>";?></p>

          <input type="submit" name="submit" value="Submit">

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
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
   $id = $_POST['id'];
   $topic_title = mysql_real_escape_string(htmlspecialchars($_POST['topic_title']));
   $approved = mysql_real_escape_string(htmlspecialchars($_POST['approved']));

 // check that firstname/lastname fields are both filled in
   if ($id == '' || $topic_title == '' || $approved == '')
   {
 // generate error message
     $error = 'ERROR: Please fill in all required fields!';

 //error, display form
     renderForm($id, $topic_title, $approved, $error);
   }
   else
   {
 // save the data to the database
     mysql_query("UPDATE topics SET id='$id',topic_title='$topic_title',approved='$approved' WHERE id='$id'")
     or die(mysql_error()); 

 // once saved, redirect back to the view page
     header("Location: forumapprove.php"); 
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
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
   $id = $_GET['id'];
   $result = mysql_query("SELECT * FROM topics WHERE id=$id")
   or die(mysql_error()); 
   $row = mysql_fetch_array($result);

 // check that the 'id' matches up with a row in the databse
   if($row)
   {

 // get data from db
     $id = $row['id'];
     $topic_title = $row['topic_title'];
     $approved = $row['approved'];

 // show form
     renderForm($id, $topic_title, $approved, '');
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