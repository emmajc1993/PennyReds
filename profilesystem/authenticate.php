<?php

require("dbc.php");

if(!empty($_POST['username'])&&!empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$query = mysql_query("SELECT * FROM `users` WHERE `username`='$username'");
	$numrow = mysql_num_rows($query);
	
	if($numrow!=0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
		}
		
		$enc_password = md5($password);
		if($username==$db_username&&$enc_password==$db_password)
		{
			session_start();
			$_SESSION['username']=$db_username;
			header("location: index.php");
		}
		else
		{
			header("location: index.php?feedback=Incorrect Password");
		}
	}
	else
	{
		header("location: index.php?feedback=User Doesnt Exist");
	}
}
else
{
	header("location: index.php?feedback=All Fields Are Required");
}

?>