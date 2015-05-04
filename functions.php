<?php

mysql_connect("localhost","root","root") or die("Couldnt connect to the server");
mysql_select_db("PennyReds") or die("Couldnt find database");




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

function protect($string){
	$string = mysql_real_escape_string($string);
	$string = strip_tags($string);
	$string = addslashes($string);
	
	return $string;
}

function getUsersData($userid)
{
	$array = array();
	$q = mysql_query("SELECT * FROM `users` WHERE `userid`=".$userid);
	while($r = mysql_fetch_assoc($q))
	{
		$array['userid'] = $r['userid'];
		$array['fname'] = $r['fname'];
		$array['lname'] = $r['lname'];
		$array['dob'] = $r['dob'];
		$array['contactno'] = $r['contactno'];
		$array['email_address'] = $r['email_address'];
		$array['height'] = $r['height'];
		$array['weight'] = $r['weight'];
		// $array['username'] = $r['username'];
		// $array['password'] = $r['password'];
		$array['bio'] = $r['bio'];
		// $array['profile_pic'] = $r['profile_pic'];
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

function updateFirstLastName($userid,$fname,$lname)
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

function updateBirthday($userid,$birthday)
{
	if(mysql_query("UPDATE `users` SET `dob`=".$dob." WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updatecontactno($userid,$contactno)
{
	if(mysql_query("UPDATE `users` SET `contactno`=".$contactno." WHERE `userid`=".$userid))
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

function updateheight($userid,$height)
{
	if(mysql_query("UPDATE `users` SET `height`=".$height." WHERE `userid`=".$userid))
		return true;
	else
		return false;
}

function updateweight($userid,$weight)
{
	if(mysql_query("UPDATE `users` SET `weight`=".$weight." WHERE `userid`=".$userid))
		return true;
	else
		return false;
}
function updateProfilePicture($id,$tmpName,$ext)
{
	if(move_uploaded_file($tmpName,"images/userimages/".$id.".".$ext) && mysql_query("UPDATE `users` SET `profileext`='".$ext."' WHERE `id`=".$id))
		return true;
	else
		return false;
}

function resetProfilePicture($id,$ext)
{
	if(unlink("images/userimages/".$id.".".$ext) && mysql_query("UPDATE `users` SET `profileext`='n/a' WHERE `id`=".$id))
		return true;
	else
		return false;
}

?>