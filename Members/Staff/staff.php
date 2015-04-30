<?php
session_start();
if(isset($_SESSION['username'])) {
	echo "";
} else
header('Location: ../Mainsite/register.php');
?>
<?php 
include ("../headerm.php");
?>
				<div id="imageleft">
					<a href="../Booking/index.php"><img src="../../images/viewlessons.jpg" alt=""></a>
					<h2><a href="../Booking/index.php">View Lessons</a></h2>
					<p class="icontext">View your lesson for today and the future!</p>
				</div> <!-- EoF galleryItem -->
					<div id="imagecenter">
						<a href="horses.php"><img src="../../images/addnewhorse.jpg" alt=""></a>
						<h2><a href="horses.php">View Horses</a></h2>
						<p class="icontext">You can register new additions to the stables here!</p>
					</div> <!-- EoF galleryItem -->
					<div id="imageright">
						<a href="../../profilesystem/index.php"><img src="../../images/myprofile.jpg" alt=""></a>
						<h2><a href="../../profilesystem/index.php">My Profile</h2>
						<p class="icontext">Change your own information.</p></div>
				</div> <!-- EoF galleryItem -->
			</body>
<?php
include ("footer.php");
?>
</html>