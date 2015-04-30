<?php

require("../../connect.php");

if(isset($_POST['postusername']))
{
	$username = mysql_real_escape_string($_POST['postusername']);
	if(!empty($username))
	{
		$query = mysql_query("SELECT * FROM users WHERE username='$username'");
		$result = mysql_num_rows($query);
		if($result==0)
		{
			
		}
		else if($result==1)
		{
			
		}
	}
}



?>