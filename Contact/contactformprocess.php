<?php

if(isset($_POST['submit'])) {
	$emailBody = 'Name: '.$_POST['name']."\n"
	.'Subject: '.$_POST['subject']."\n"
	.'Email: '.$_POST['EMAIL']."\n"
	.'Question: '.$_POST['question']; 

	mail('emma.cheney@ymail.com', 'User Email', $emailBody);
	header('location: thankyou.php');
} else {
	header('location: notsent.php');
}
?>