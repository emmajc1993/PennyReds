<?php
$page_title = "Post Reply";
$page_description = "Post a reply for the forum on Penny Red's Pony Parties Riding School in Cornwall.";
include ('headerf.php');


if ((!isset($_SESSION['username'])) || ($_GET['cid'] == "")) {
	header("Location: start.php");
	exit();
}

// Assign local variables found in the url
$cid = $_GET['cid'];
$tid = $_GET['tid'];
?>

<div id="wrapper">

<div id="content">
<form action="post_reply_parse.php" method="post">
<p>Reply Content</p>
<textarea name="reply_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
<input type="submit" name="reply_submit" value="Post Your Reply" />
</form>
</div>
</div>
</body>
<?php
include ("footer.html");
?>
</html>