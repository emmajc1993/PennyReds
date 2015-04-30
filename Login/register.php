<?php
  $page_title = "Register";
  $page_description = "Register page for Penny Red's Pony Parties Riding School in Cornwall.";
  include ("headerl.php");
?>

<div class="loginbox">
    <div id="login">
        <h2>Register</h2>
        <form action="core/reg-check.php" method="POST">
            <fieldset>
                <?php if(isset($_GET["feedback1"])){echo $_GET["feedback1"];} ?>
                <p><label for="fname">First Name</label></p>
                <p><input type="text" name="fname" id="fname" placeholder="First Name"></p>

                <p><label for="lname">Last Name</label></p>
                <p><input type="text" name="lname" id="lname" placeholder="Last Name"></p>

                <p><label for="dob">Date of Birth</label></p>
                <p><input type="date" name="dob" id="dob" placeholder="Date of Birth"></p>

                <p><label for="contactno">Contact Number</label></p>
                <p><input type="text" name="contactno" id="contactno" placeholder="Contact Number"></p>

                <p><label for="email_address">Email Address</label></p>
                <p><input type="text" name="email_address" id="email_address" placeholder="Email Address"></p>

                <p><label for="username">Username</label></p>
                <p><input type="text" name="username" id="username" placeholder="Username"></p>

                <p><label for="password">Password</label></p>
                <p><input type="password" name="password" id="password" placeholder="Password"></p>

                <p><label for="confirm">Confirm Password</p>
                <p><input type="password" name="password1" id="password1" placeholder="Re-Enter Password"></p>

                <input type="submit" value="Register">
            </fieldset>
        </form>
    </div> <!-- end login -->
</div><!-- end loginbox -->
   </body>
<?php
include ("footer.php");
?>
</html>