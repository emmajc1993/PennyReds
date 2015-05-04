<?php
$page_title = "Edit Horse";
$page_description = "Edit a horse registered at Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
 function renderForm($horseid, $horsename, $height, $weight, $error)
 {
 ?>

<?php
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">

 	 <div class="loginbox">

    <div class="logincontainer">

      <div id="login">

        <h2>Edit Horse</h2>

        <form action="" method="POST">

          <fieldset>
            <table>
              <input type="hidden" name="horseid" value="<?php echo $horseid; ?>"/>

              <tr><td><label for="horsename">Name</label></td><td>
              <input type="text" name="horsename" value="<?php echo $horsename; ?>"/></td></tr>

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
              <select name="weight" >
                <option selected="selected" value="<?php echo $weight; ?>" > <?php echo $weight; ?> </option>
                  <?php for ($i = 170; $i <= 720; $i++) : ?>
                      <option value="<?php echo $weight; ?>"><?php echo $i; ?></option>
                  <?php endfor; ?>
              </select></td></tr>

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



mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['horseid']))
 {
 // get form data, making sure it is valid
 $horseid = $_POST['horseid'];
 $horsename = mysql_real_escape_string(htmlspecialchars($_POST['horsename']));
 $height = mysql_real_escape_string(htmlspecialchars($_POST['height']));
 $weight = mysql_real_escape_string(htmlspecialchars($_POST['weight']));
 
 // check that firstname/lastname fields are both filled in
 if ($horseid == '' || $horsename == '' || $height == '' || $weight == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($horseid, $horsename, $height, $weight);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE horses SET horseid='$horseid',horsename='$horsename',height='$height',weight='$weight' WHERE horseid='$horseid'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: horses.php"); 
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
 if (isset($_GET['horseid']) && is_numeric($_GET['horseid']) && $_GET['horseid'] > 0)
 {
 // query db
 $horseid = $_GET['horseid'];
 $result = mysql_query("SELECT * FROM horses WHERE horseid='$horseid'")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $horseid = $row['horseid'];
 $horsename = $row['horsename'];
 $height = $row['height'];
 $weight = $row['weight'];
 
 // show form
 renderForm($horseid, $horsename, $height, $weight, '');
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