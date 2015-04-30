<?php
session_start();
include ("headerp.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');  

if(!isset($_SESSION['userid'])&&isset($_SESSION['username'])) header("Location: ?userid=".getId($_SESSION['username']));
//echo $_SESSION['userid'];
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>



  <div class="loginbox">

    <div class="logincontainer">

      <div id="login">
        <form action="changepassword2.php?userid=<? echo $_SESSION['userid'] ?>" method="post">
        <h2>Change Password</h2>

          <fieldset>
            <input type="hidden" name="userid"/>

            <p><label for="oldpassword">Old Password</label></p>
            <p><input type="text" name="oldpassword"/></p>

            <p><label for="newpassword">New Password</label></p>
            <p><input type="text" name="newpassword"/></p>

            <p><label for="newpassword2">Confirm New Password</label></p>
            <p><input type="text" name="newpassword2"/></p>

            <p><input type="submit" name="submit" value="Update"></p>

          </fieldset>

        </form>

      </div> <!-- end login -->

    </div>
  </body>
<?php
include ("footer.html");
?>

</html>

