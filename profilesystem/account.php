<?php 
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include ("headerp.php");
$page_title = "Profile Page";
$page_description = "Profile page for users of Penny Red's Pony Parties Riding School in Cornwall.";

if(!isset($_GET['userid'])&&isset($_SESSION['username'])) header("Location: ?userid=".getId($_SESSION['username']));

?>   

<div id="container">
	<div id="menu">
		<a href="index.php">Profile</a>&nbsp;&nbsp;&nbsp;
        <a href="account.php">Account</a>&nbsp;&nbsp;&nbsp;
        <a href="changepassword.php">Change Password</a><br /><br />
	</div>
    <?php $usersData = getUsersData(getId($_SESSION['username'])); ?>
    <strong><u>Update Your Name</u></strong><br /><br />
    <form action="account.php?update=name" method="POST">
    	First Name: <input type="text" maxlength="15" name="fname" value="<?php if(isset($_POST['fname'])) echo trim(mysql_real_escape_string($_POST['fname'])); else echo $usersData['fname']; ?>" /><br />
        Last Name: <input type="text" maxlength="15" name="lname" value="<?php if(isset($_POST['lname'])) echo trim(mysql_real_escape_string($_POST['lname'])); else echo $usersData['lname']; ?>" /><br />
        <input type="submit" name="nameSubmit" value="Update" />
    </form>
	<?php
		if(isset($_GET['update']) && $_GET['update']=="name")
		{
			$fname = trim(mysql_real_escape_string($_POST['fname']));
			$lname = trim(mysql_real_escape_string($_POST['lname']));
			
			$errors = array();
			if(strlen($fname)>30)
				$errors[] = "Your first name is too long";
			if(strlen($lname)>40)
				$errors[] = "Your last name is too long";
				
			if(empty($errors))
			{
				if(updatefnamelname($usersData['userid'],$fname,$lname))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
	
    <br />
    <strong><u>Bio</u></strong>
    <form action="account.php?update=bio" method="POST">
    	<textarea name="bio" maxlength="100" rows="5" cols="30"><?php if(isset($_POST['bio'])) echo trim(mysql_real_escape_string($_POST['bio'])); else echo $usersData['bio']; ?></textarea><br />
        <input type="submit" name="bioSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="bio")
		{
			$bio = trim(mysql_real_escape_string($_POST['bio']));
			
			$errors = array();
			if(strlen($bio)>200)
				$errors[] = "Your bio is too long";
				
			if(empty($errors))
			{
				if(updatebio($usersData['userid'],$bio))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <br />
    <strong><u>Height</u></strong>
    <form action="account.php?update=height" method="POST">
    	<textarea name="height" maxlength="100" rows="1" cols="4"><?php if(isset($_POST['height'])) echo trim(mysql_real_escape_string($_POST['height'])); else echo $usersData['height']; ?></textarea><br />
        <input type="submit" name="heightSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="height")
		{
			$height = trim(mysql_real_escape_string($_POST['height']));
			
			$errors = array();
			if(strlen($height)>4)
				$errors[] = "Your height is too long";
				
			if(empty($errors))
			{
				if(updateheight($usersData['userid'],$height))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <br />
    <strong><u>Weight</u></strong>
    <form action="account.php?update=weight" method="POST">
    	<textarea name="weight" maxlength="100" rows="1" cols="5"><?php if(isset($_POST['weight'])) echo trim(mysql_real_escape_string($_POST['weight'])); else echo $usersData['weight']; ?></textarea><br />
        <input type="submit" name="weightSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="weight")
		{
			$weight = trim(mysql_real_escape_string($_POST['weight']));
			
			$errors = array();
			if(strlen($weight)>4)
				$errors[] = "Your weight is too long";
				
			if(empty($errors))
			{
				if(updateweight($usersData['userid'],$weight))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
    <br />
     <strong><u>Contact Number</u></strong>
    <form action="account.php?update=contactno" method="POST">
    	<textarea name="contactno" maxlength="100" rows="1" cols="11"><?php if(isset($_POST['contactno'])) echo trim(mysql_real_escape_string($_POST['contactno'])); else echo $usersData['contactno']; ?></textarea><br />
        <input type="submit" name="contactnoSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="contactno")
		{
			$contactno = trim(mysql_real_escape_string($_POST['contactno']));
			
			$errors = array();
			if(strlen($contactno)>12)
				$errors[] = "Your contact number is too long";
				
			if(empty($errors))
			{
				if(updatecontactno($usersData['userid'],$contactno))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
	<br />
	<strong><u>Email Address</u></strong>
    <form action="account.php?update=email_address" method="POST">
    	<textarea name="email_address" maxlength="100" rows="5" cols="30"><?php if(isset($_POST['email_address'])) echo trim(mysql_real_escape_string($_POST['email_address'])); else echo $usersData['email_address']; ?></textarea><br />
        <input type="submit" name="email_addressSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="email_address")
		{
			$email_address = trim(mysql_real_escape_string($_POST['email_address']));
			
			$errors = array();
			if(strlen($email_address)>100)
				$errors[] = "Your email address is too long";
				
			if(empty($errors))
			{
				if(updateemail_address($usersData['userid'],$email_address))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
			}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
	?>
	<br />
    <strong><u>Birthday</u></strong>
    <form action="account.php?update=dob" method="POST">
		Day: <select name="day">
				<option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
				<option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
        	</select>
			Month: <select name="month">
				<option value="01">Jan</option>
				<option value="02">Feb</option>
				<option value="03">Mar</option>
				<option value="04">Apr</option>
				<option value="05">May</option>
				<option value="06">Jun</option>
				<option value="07">Jul</option>
				<option value="08">Aug</option>
				<option value="09">Sept</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
            	</select>
			Year: <select name="year">
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
			</select><br />
        <input type="submit" name="dobSubmit" value="Update" />
    </form>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="dob")
		{
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			$birthday = mktime(0,0,0,$month,$day,$year);
			
			if(updatedob($usersData['userid'],$dob))
				echo "Updated!";
			else
				echo "An Error Has Occurred!";
		}
	?>
    <br />
    <strong><u>Update Profile Picture</u></strong><br />
    <i>Allowed Extensions: *.jpg *.jpeg *.png</i>
    <form action="account.php?update=profilePicture" method="POST" enctype="multipart/form-data">
    	<input type="file" name="profilePicture" /> <input type="submit" name="profilePictureSubmit" value="Update">
    </form>
    <?php if($usersData['profileext']!="n/a"){ ?>
    	<form action="account.php?update=resetProfilePictureStep1" method="POST" >
    		<input type="submit" name="profilePictureStep1Submit" value="Reset">
    	</form>
    <?php } ?>
    <?php if(isset($_GET['update']) && $_GET['update']=="resetProfilePictureStep1"){ ?>
    	<form action="account.php?update=resetProfilePictureStep2" method="POST" >
        	<input type="hidden" name="resetProfilePictureID" value="<?php echo $usersData['userid']; ?>">
            This will permanently delete the image from the server. Please confirm.
    		<input type="submit" name="profilePictureStep2Submit" value="Confirm Reset">
    	</form>
    <?php } ?>
    <?php
		if(isset($_GET['update']) && $_GET['update']=="profilePicture")
		{
			$type = $_FILES["profilePicture"]["type"];
			$size = $_FILES["profilePicture"]["size"];
			
			$errors = array();
			if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png")
			{
				$explode = explode(".",$_FILES["profilePicture"]["name"]);
				$ext = end($explode);
			}
			else
				$errors[] = "File Format Not Allowed!";
			if($size > 1048576)
				$errors[] = "File Size Too Big! 1MB Limit";
			
			if(empty($errors))
			{
				if(updateProfilePicture($usersData['userid'],$_FILES["profilePicture"]["tmp_name"],$ext))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";}
			else
				foreach($errors as $e)
					echo $e."<br />";
		}
		
		if(isset($_GET['update']) && $_GET['update']=="resetProfilePictureStep2")
		{
			$userid = mysql_real_escape_string($_POST['resetProfilePictureID']);
			if(resetProfilePicture($usersData['userid'],$usersData['profileext']))
					echo "Updated!";
				else
					echo "An Error Has Occurred!";
		}
	?>
</div>

</body>
<?php
include ("../footer.html");
?>
</html>