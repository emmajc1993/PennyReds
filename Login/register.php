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
                <table>
                    <?php if(isset($_GET["feedback1"])){echo $_GET["feedback1"];} ?>
                    <tr><td><label for="fname">First Name</label></td><td>
                    <input type="text" name="fname" id="fname" placeholder="First Name"><br /></td></tr>

                    <tr><td><label for="lname">Last Name</label></td><td>
                    <input type="text" name="lname" id="lname" placeholder="Last Name"><br /></td></tr>

                    <tr><td><label for="dob">Date of Birth</label></td><td>
                    <input type="date" name="dob" id="dob" placeholder="Date of Birth"><br /></td></tr>

                    <tr><td><label for="contactno">Contact Number</label></td><td>
                    <input type="text" name="contactno" id="contactno" placeholder="Contact Number"><br /></td></tr>

                    <tr><td><label for="email_address">Email Address</label></td><td>
                    <input type="text" name="email_address" id="email_address" placeholder="Email Address"><br /></td></tr>

                    <tr><td><label for="username">Username</label></td><td>
                    <input type="text" name="username" id="username" placeholder="Username"><br /></td></tr>

                    <tr><td><label for="password">Password</label></td><td>
                    <input type="password" name="password" id="password" placeholder="Password"></p></td></tr>

                    <tr><td><label for="confirm">Confirm Password</label></td><td>
                    <input type="password" name="password1" id="password1" placeholder="Re-Enter Password"><br /></td></tr>

                    <tr><td><input type="submit" value="Register"></td></tr>
                </table>
            </fieldset>
        </form>
    </div> <!-- end login -->
</div><!-- end loginbox -->
   </body>
<?php
include ("../footer.html");
?>
</html>