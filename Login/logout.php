<?php
	session_start();
	session_destroy();
	header("location: ../MainSite/homepage.php");
?>