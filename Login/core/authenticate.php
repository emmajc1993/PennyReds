<?php

require("../../connect.php");

if(!empty($_POST['username'])&&!empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$query = mysql_query("SELECT * FROM users WHERE `username`='$username'");
	$numrow = mysql_num_rows($query);
	
	if($numrow!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_userid = $row['userid'];
			$db_accounttype = $row['account_type'];
		}
		
		$enc_password = md5($password);
		if($username==$db_username&&$enc_password==$db_password)
		{
			session_start();
			$_SESSION['userid']=$db_userid;
			$_SESSION['username']=$db_username;
			$_SESSION['account_type']=$db_accounttype;
			header("location: ../../Members/Users/fun.php");

		}
		else
		{
			header("location: ../login.php?feedback1=Incorrect Password");
		}
	}
	else
	{
		header("location: ../login.php?feedback1=User Doesnt Exist");
	}
}
else
{
	header("location: ../login.php?feedback1=All Fields Are Required");
}

?>