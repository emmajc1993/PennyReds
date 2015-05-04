<?php
session_start();
if(isset($_SESSION['username'])) {
	echo "";
} else
header('Location: ../Mainsite/register.php');
?>
<?php
	include ("headerq.php")
?>
		<form method="link" action="index.php">
			<input type="submit" class="quizbuttonleft" value="Start Quiz">
		</form>
		<form method="link" action="addQuestions.php">
			<input type="submit" class="quizbuttonright" value="Add Questions">
		</form>
	</body>
<?php
include ("../footer.html");
?>
</html>