<?php
session_start();
if(isset($_SESSION['username'])) {
	echo "";
} else
header('Location: ../../Login/register.php');
?>
<?php
	include ("../headerm.php")
?>
				<div id="imageleft">
					<a href="quiz/start.php"><img src="../../images/quiz.jpg" alt=""></a>
					<h2><a href="newhorse.php">Quiz</a></h2>
					<p class="icontext">Take the Penny Red's Quiz!</p>
				</div> <!-- EoF galleryItem -->
					<div id="imagecenter">
						<a href="../../Forum/view_category.php?cid=1"><img src="../../images/forumicon.jpg" alt=""></a>
						<h2><a href="../../Forum/view_category.php?cid=1">Forum</a></h2>
						<p class="icontext">You can register new additions to the stables here!</p>
					</div> <!-- EoF galleryItem -->
					<div id="imageright">
						<a href="../../profilesystem/index.php?userid=<? echo $_SESSION['userid'] ?> "><img src="../../images/myprofile.jpg" alt=""></a>
						<h2><a href="../../MainSite/register.php">My Profile</h2>
						<p class="icontext">Create and update your own area here!</p></div>
				</div> <!-- EoF galleryItem -->
	</body>
	<?php
include ("../../footer.html");
?>
</html>