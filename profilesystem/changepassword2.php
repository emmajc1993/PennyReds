<?php
session_start();
$dbcon = mysqli_connect('localhost', 'root', 'root', 'PennyReds') or die(mysqli_error($dbcon));

$userid = $_SESSION['userid'];
//echo $userid;
//$userid = $_GET['userid'];
$password1 = mysqli_real_escape_string($dbcon, $_POST['newpassword']);
$password2 = mysqli_real_escape_string($dbcon, $_POST['newpassword2']);
$username = mysqli_real_escape_string($dbcon, $_SESSION['username']);

if ($password1 <> $password2) { echo "Your passwords do not match.";}
//check to make sure the password is valid 

else if (mysqli_query($dbcon, "UPDATE users SET password='$password1' WHERE userid='$userid'"))
    {echo "You have successfully changed your password. Click <a href='index.php'>here</a> to return to your profile!";}

else { mysqli_error($dbcon); }

mysqli_close($dbcon);



?>