<?php
session_start();
if(($_SESSION['account_type'])=="Admin") {
	echo "";
} else
header("Location: ../Users/fun.php");
?>
<?php
$page_title = "Admin Section";
$page_description = "Admin section/page for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>  

<div id="imageleft">
	<a href="../Booking/index.php"><img src="../../images/addnewbooking.jpg" alt=""></a>
	<h2><a href="../Booking/index.php">Add New Booking</a></h2>
	<p class="icontext">Add new booking and alter existing ones. </p>
</div> <!-- EoF galleryItem -->
<div id="imageright">
	<a href="editinfo.php"><img src="../../images/editcontent.jpg" alt=""></a>
	<h2><a href="editinfo.php">Edit Website Info</a></h2>
	<p class="icontext">Edit what users see on the website.</p></div>
</div> <!-- EoF galleryItem -->
<div id="imagecenter">
	<a href="../Staff/horses.php"><img src="../../images/addnewhorse.jpg" alt=""></a>
	<h2><a href="../Staff/horses.php">Add New Horse</a></h2>
	<p class="icontext">You can register new additions to the stables here!</p>
</div> <!-- EoF galleryItem -->
<div id="imageright1">
	<a href="forumapprove.php"><img src="../../images/approveposts.jpg" alt=""></a>
	<h2><a href="forumapprove.php">Approve Posts</a></h2>
	<p class="icontext">Here, you can approve posts for the forum.</p></div>
</div> <!-- EoF galleryItem -->
<div id="imagecenter1">
	<a href="events.php"><img src="../../images/addnewevent.jpg" alt=""></a>
	<h2><a href="events.php">Add New Event</a></h2>
	<p class="icontext">Add new events or edit current ones.</p></div>
</div> <!-- EoF galleryItem -->
<div id="imageleft1">
	<a href="members.php"><img src="../../images/viewmembers.jpg" alt=""></a>
	<h2><a href="members.php">View Members</a></h2>
	<p class="icontext">Here, you can approve posts for the forum.</p></div>
</div> <!-- EoF galleryItem -->
</body>
<?php
include ("footer.php");
?>
</html>