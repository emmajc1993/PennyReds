<?php

require("../../connect.php");

if(!empty($_POST['fname'])&&!empty($_POST['lname'])&&!empty($_POST['dob'])&&!empty($_POST['contactno'])&&!empty($_POST['email_address'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['password1']))
{
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$dob = mysql_real_escape_string($_POST['dob']);
	$contactno = mysql_real_escape_string($_POST['contactno']);
	$email_address = mysql_real_escape_string($_POST['email_address']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password1 = mysql_real_escape_string($_POST['password1']);
	
	$query = mysql_query("SELECT * FROM `users` WHERE `username`='$username'");
	$numrow = mysql_num_rows($query);
	
	if($numrow == 0)
	{
		if(strlen($username)<=25)
		{
			if($password == $password1)
			{
				$password = md5($password);
				mysql_query("INSERT INTO users (fname,lname,dob,contactno,email_address,username,password) VALUES('$fname','$lname','$dob','$contactno','$email_address','$username','$password')");
				header("location: ../register.php?feedback1=Registration Complete. You May Now Login");
			}
			else
			{
				header("location: ../register.php?feedback1=Your Passwords Must Match");
			}
		}
		else
		{
			header("location: ../register.php?feedback1=Username Must Not Be More Than 25 Characters Long");
		}
	}
	else
	{
		header("location: ../register.php?feedback1=Username Already Exists");
	}
	
}
else
{
	header("location: ../register.php?feedback1=All Fields Are Required");
}

?>