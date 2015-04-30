<?php
session_start();
require ("functions.php");

if(!isset($_GET['userid'])&&isset($_SESSION['username'])) header("Location: ?userid=".getId($_SESSION['username']));

error_reporting(E_ALL);
ini_set('display_errors', '1');

?>
<?php
include ("headerp.php");
?>

<div id="container">
    <?php 
    if(isset($_SESSION['username']))
    {
         $profileUsersData = getUsersData(mysql_real_escape_string($_GET['userid']));
        ?>
        <div id="menu">
            <a href="index.php">Profile</a>&nbsp;&nbsp;&nbsp;
            <a href="account.php">Account</a>&nbsp;&nbsp;&nbsp;
            <a href="changepassword.php">Change Password</a>&nbsp;&nbsp;&nbsp;
            <a href="closeaccount.php">Close Account</a><br /><br />
        </div>
        <?php if(userExists(mysql_real_escape_string($_GET['userid']))){ ?>
        <div id="header">
            <b><?php echo $profileUsersData['fname']." ".$profileUsersData['lname']."'s Profile"; ?></b>
        </div>
        <div id="wrapper">
            <div id="profilePicture">
                <?php
                    if($profileUsersData['profileext']=="")
                        echo '<img src="images/profile.png" />';
                    else
                        echo '<img src="images/userimages/'.$profileUsersData['userid'].'.'.$profileUsersData['profileext'].'" width="200" height="200" />';
                ?>
            </div>
            <div id="bio">
                <strong><u>About Me</u></strong><br />
                <?php 
                    if($profileUsersData['bio']=="")
                        echo 'Edit your account to write something about yourself!';
                    else
                        echo $profileUsersData['bio'];
                ?>
            </div>
            <div id="email_address">
                <strong><u>Email Address</u></strong><br />
                <?php echo $profileUsersData['email_address']; ?>
            </div>
            <div id="account_type">
                <strong><u>Account Type</u></strong><br />
                <?php echo $profileUsersData['account_type']; ?>
            </div>
        </div>
        <div id="userDetails">
            <strong><u>Date of Birth</u></strong><br />
            <?php echo $profileUsersData['dob']; ?>
        </div>
        <?php } else echo "Invalid ID"; ?>
        <?php 
    } 
    ?>
</div>

</body>
<?php
include ("../footer.html");
?>
</html>