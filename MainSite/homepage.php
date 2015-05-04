<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$page_title = "Homepage";
$page_description = "Homepage for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>  
<img class="placeholder" src="../images/placeholder2.jpg" alt="Placeholder">
<p>
	<?
		$about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '1'");
		$get_result = mysql_fetch_assoc($about_query);
		$about_the_user = $get_result['textfield'];
		echo $about_the_user;
	?>
</p>
</body>
<?php
include ("../footer.html");
?>
</html>