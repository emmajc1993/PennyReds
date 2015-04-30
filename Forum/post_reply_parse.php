<?php
// Building A PHP MySQL Forum Tutorial Series
// Published by Tim Kipp @ www.timkipptutorials.com on February 14, 2011
// This script will parse the information from the post_reply.php page and add it to the database

session_start(); // Start your sessions to allow your page to interact with session variables

// Check to see if the person accessing this page is logged in
if ($_SESSION['userid']) {
	if (isset($_POST['reply_submit'])) {
		// Connect to the database
		include_once("connect.php");
		// Assign local variables
		$creator = $_SESSION['userid'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		// Insert query to enter the information into the posts table
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		// Execute the INSERT query
		$res = mysql_query($sql) or die(mysql_error());
		// Update query that will update the category that is associated with this topic reply
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		// Execute the category UPDATE query
		$res2 = mysql_query($sql2) or die(mysql_error());
		// Update query that will update the topic that is associated with this topic reply
		$sql3 = "UPDATE topics SET topic_reply_date=now() WHERE id='".$tid."' LIMIT 1";
		// Execute the topic UPDATE query
		$res3 = mysql_query($sql3) or die(mysql_error());
		
		//START THE email_address PROCESSING SCRIPT
		// Select query that will select the post_creators associated with the topic you are replying to
		$sql4 = "SELECT post_creator FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' GROUP BY post_creator";
		// Execute the SELECT query
		$res4 = mysql_query($sql4) or die(mysql_error());
		
		// This while loop will add each user id that was returned in the SELECT query above to an array
		while ($row4 = mysql_fetch_assoc($res4)) {
			$userids[] .= $row4['post_creator'];
		}
		// The foreach loop will run for each user id with the $userids array
		foreach ($userids as $key) {
			// Select query that selects the id and email_address from the users table depending on the array key value
			$sql5 = "SELECT userid, email_address FROM users WHERE userid='".$key."' LIMIT 1";
			// Execute the SELECT query
			$res5 = mysql_query($sql5) or die(mysql_error());
			// If the user has their forum_notification field set to 1 in the database
			if (mysql_num_rows($res5) > 0) {
				$row5 = mysql_fetch_assoc($res5);
				// Check to see if the user id being passed through the foreach loop is not the person that is posting the reply
				if ($row5['id'] != $creator) {
					// Adding all the email_address addresses to an array
					$email_address .= $row5['email_address'].", ";
				}
			}
		}
		// Taking the last 2 characters off the email_address array string so that the email_address can process
		$email_address = substr($email_address, 0, (strlen($email_address) - 2));
		// Fill in your information below. The "$to" address should be a dumby address with your domain at the end
		$to = "noreply@somewhere.com";
		$from = "YOUR_SITE_email_address_HERE";
		// $bcc is the list of email_addresss that will be sent out as blind carbon copies
		$bcc = $email_address;
		$subject = "YOUR_SUBJECT_HERE";
		
		// This message can only contain text. NO HTML tags! The HTML tags will just be printed into the email_address.
		$message = "YOU MESSAGE CONTENT HERE";
		
		$headers = "From: $from\r\nReply-To: $from";
		$headers .= "\r\nBcc: {$bcc}";
		// Send out the email_address
		mail($to, $subject, $message, $headers);
		// END THE email_address PROCESSING SCRIPT
		
		// Check to make sure all the required queries have been executed
		if (($res) && ($res2) && ($res3)) {
			echo "<p>Your reply has been successfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic.</a></p>";
		} else {
			echo "<p>There was a problem posting your reply. Try again later.</p>";
		}
		
	} else {
		exit();
	}
} else {
	exit();
}
?>