<?php

include ('headerf.php');

if ((!isset($_SESSION['username'])) || ($_GET['cid'] == "")) {
	header("Location: start.php");
	exit();
}

$cid = $_GET['cid'];
?>

<div id="wrapper">
<div id="reply_content">
<form action="create_topic_parse.php" method="post">
<p>Topic Title</p>
<input type="text" name="topic_title" size="50" maxlength="100" />
<p>Topic Content</p>
<textarea name="topic_content" rows="5" cols="65"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="submit" name="topic_submit" value="Create Your Topic" />
</form>
</div>
</div>
</body>
<?php
include ("footer.html");
?>
</html>