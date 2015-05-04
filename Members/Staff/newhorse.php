<?php 
$page_title = "New Horse";
$page_description = "Register a new horse to Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
if (($_SESSION['account_type'])=="Admin" OR ($_SESSION['account_type'])=="Staff") {
  echo "";
} else
  header("Location: ../Users/fun.php");
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
            <table>
            	<input type="hidden" name="eventid"/>

              <tr><td><label for="horsename">Horse Name</label></td><td>
              <input type="text" name="horsename"/></td></tr>

              <tr><td><label for="height">Height (hh)</label></td><td>
              <select name="height" value="<?php echo $height; ?>"/>
                    <option value="12.0">12.0</option>
                    <option value="12.1">12.1</option>
                    <option value="12.2">12.2</option>
                    <option value="12.3">12.3</option>
                    <option value="13.0">13.0</option>
                    <option value="13.1">13.1</option>
                    <option value="13.2">13.2</option>
                    <option value="13.3">13.3</option>
                    <option value="14.0">14.0</option>
                    <option value="14.1">14.1</option>
                    <option value="14.2">14.2</option>
                    <option value="14.3">14.3</option>
                    <option value="15.0">15.0</option>
                    <option value="15.1">15.1</option>
                    <option value="15.2">15.2</option>
                    <option value="15.3">15.3</option>
                    <option value="16.0">16.0</option>
                    <option value="16.1">16.1</option>
                    <option value="16.2">16.2</option>
                    <option value="16.3">16.3</option>
                    <option value="17.0">17.0</option>
                    <option value="17.1">17.1</option>
                    <option value="17.2">17.2</option>
                    <option value="17.3">17.3</option>
                    <option value="18.0">18.0</option>
                    <option value="18.1">18.1</option>
                    <option value="18.2">18.2</option>
                    <option value="18.3">18.3</option>
                    <option value="19.0">19.0</option>
                    <option value="19.1">19.1</option>
                    <option value="19.2">19.2</option>
                    <option value="19.3">19.3</option>
                    <option value="20.0">20.0</option>
                  </select></td></tr>

              <tr><td><label for="weight">Weight</label></td><td>
              <select name="weight" value="<?php echo $weight; ?>">
                  <?php for ($i = 170; $i <= 720; $i++) : ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php endfor; ?>
              </select></td></tr>



              <tr><td><input type="submit" name="submit" value="New Horse"></td></tr>
            </table>
          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>

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

</body>
<?php
include ("footer.html");
?>
</html>