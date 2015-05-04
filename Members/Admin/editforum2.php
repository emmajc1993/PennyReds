<?php
 $page_title = "Approve Posts";
 $page_description = "Approve forum post for Penny Red's Pony Parties Riding School in Cornwall.";
 include ("../headerm.php");
if(($_SESSION['account_type'])=="Admin") {
  echo "";
} else
header("Location: ../Users/fun.php");

function renderForm($id, $post_content, $approved, $error)
{

 $sql = "SELECT approved FROM posts";
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

      <h2>Approve Posts</h2>

      <form action="" method="POST">

        <fieldset>
          <table>
            <tr><td><input type="hidden" name="id" value="<?php echo $id; ?>"/></td></tr>

            <tr><td><label for="post_content">Post</label></td><td>
            <p><input type="text" name="post_content" value="<?php echo $post_content; ?>" readonly="true" style="background-colour:lightgrey;"/></td></tr>

            <tr><td><label for="approved">Approved</label></td><td>
            <p style="background-color: white;"><?php echo "<select name='approved'>"; 
            echo '<option value="Waiting">Waiting</option>';
            echo '<option value="Yes">Yes</option>';
            echo '<option value="No">No</option>';
            echo "</select>";?></td></tr>

            <tr><td><input type="submit" name="submit" value="Submit"></td></tr>
          </table>
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
   $post_content = mysql_real_escape_string(htmlspecialchars($_POST['post_content']));
   $approved = mysql_real_escape_string(htmlspecialchars($_POST['approved']));

 // check that firstname/lastname fields are both filled in
   if ($id == '' || $post_content == '' || $approved == '')
   {
 // generate error message
     $error = 'ERROR: Please fill in all required fields!';

 //error, display form
     renderForm($id, $post_content, $approved, $error);
   }
   else
   {
 // save the data to the database
     mysql_query("UPDATE posts SET id='$id',post_content='$post_content',approved='$approved' WHERE id='$id'")
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
   $result = mysql_query("SELECT * FROM posts WHERE id=$id")
   or die(mysql_error()); 
   $row = mysql_fetch_array($result);

 // check that the 'id' matches up with a row in the databse
   if($row)
   {

 // get data from db
     $id = $row['id'];
     $post_content = $row['post_content'];
     $approved = $row['approved'];

 // show form
     renderForm($id, $post_content, $approved, '');
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
include ("footer.html");
?>
</html>