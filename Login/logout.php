<?php
	$page_title = "Logout";
	$page_description = "Logout page for Penny Red's Pony Parties Riding School in Cornwall.";
	include ("headerl.php");
	session_destroy();
	header("location: ../MainSite/homepage.php");
?>