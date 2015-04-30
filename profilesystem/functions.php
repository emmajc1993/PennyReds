<?php

mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find the database");

function db_connect() {
	$link = mysqli_connect('localhost','root','root','PennyReds');
	if(!$link) {
		die('Connect Error: ' . mysqli_connect_errno());
	}
	return $link;
}

function loggedin() {
	if (isset($_SESSION['userid'])&&!empty($_SESSION['userid'])) {
		return true;
	} else {
		return false;
	}
}

function getUsersData($userid)
{
	$array = array();
	$q = mysql_query("SELECT * FROM `users` WHERE `userid`=".$userid);
	while($r = mysql_fetch_assoc($q))
	{
		$array['userid'] = $r['userid'];
		$array['username'] = $r['username'];
		$array['password'] = $r['password'];
		$array['fname'] = $r['fname'];
		$array['lname'] = $r['lname'];
		$array['contactno'] = $r['contactno'];
		$array['email_address'] = $r['email_address'];
		$array['profileext'] = $r['profileext'];
		$array['bio'] = $r['bio'];
		$array['dob'] = $r['dob'];
		$array['height'] = $r['height'];
		$array['weight'] = $r['weight'];
		$array['account_type'] = $r['account_type'];
	}
	return $array;
}

function getId($username)
{
	$q = mysql_query("SELECT `userid` FROM `users` WHERE `username`='".$username."'");
	while($r = mysql_fetch_assoc($q))
	{
		return $r['userid'];
	}
}

function userExists($userid)
{
	$numrows = mysql_num_rows(mysql_query("SELECT `userid` FROM `users` WHERE `userid`=".$userid));
	if($numrows==1)
		return true;
	else
		return false;
}

function updatefnamelname($userid,$fname,$lname)
{
	if(mysql_query("UPDATE `users` SET `fname`='".$fname."', `lname`='".$lname."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updatebio($userid,$bio)
{
	if(mysql_query("UPDATE `users` SET `bio`='".$bio."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updatecontactno($userid,$contactno)
{
	if(mysql_query("UPDATE `users` SET `contactno`='".$contactno."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updateheight($userid,$height)
{
	if(mysql_query("UPDATE `users` SET `height`='".$height."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updateweight($userid,$weight)
{
	if(mysql_query("UPDATE `users` SET `weight`='".$weight."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updatedob($userid,$dob)
{
	if(mysql_query("UPDATE `users` SET `dob`=".$dob." WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updateemail_address($userid,$email_address)
{
	if(mysql_query("UPDATE `users` SET `email_address`=".$email_address." WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updateProfilePicture($userid,$tmpName,$ext)
{
	if(move_uploaded_file($tmpName,"images/userimages/".$userid.".".$ext) && mysql_query("UPDATE `users` SET `profileext`='".$ext."' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function resetProfilePicture($userid,$ext)
{
	if(unlink("images/userimages/".$userid.".".$ext) && mysql_query("UPDATE `users` SET `profileext`='n/a' WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

?>