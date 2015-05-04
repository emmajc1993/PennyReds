<?php 
$page_title = "Contact Form";
$page_description = "Contact form for Penny Red's Pony Parties Riding School in Cornwall.";
include ("./headerc.php");
?>
<!-- This section checks that the required textfield does exist -->
<?
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
	$check = mysql_query("SELECT textfieldid, textfield FROM editinfo WHERE textfieldid='3'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$id = $get['textfieldid'];
	$textfield = $get['textfield'];	
	}
	else
	{
	
	exit();
	}
	}
}
?>
		</div> <!-- body_head Ends -->
		<div id="contactleft">
			<div class="pagecontent_contact_left">
				<p class="header-text">Contact Us</p>
				<p class="contact-head">Fill in the form with any questions that you have.</p>
				<p id="feedback"><?php echo $feedback; ?></p>
				<form method="post" action="contactformprocess.php">
					<div id="contactform">
						<input type="text" class="name" name="name" placeholder="Name" required>
						<input type="text" class="subject" name="subject"  placeholder="Subject" required>	
						<input type="email" class="email" name="EMAIL"  placeholder="Email Address" required>
						<textarea name="question" class="question" placeholder="Question" required></textarea>
						<input type="submit" value="Submit" name="submit" id="submit-button" class="button">
					</div> <!-- end of contactform -->
				</form>
			</div> <!-- pagecontent_contact_left end -->
		</div> <!-- contactleft Ends -->
		<div id="contactright">
			<div class="pagecontent_contact_right_top">
				<p class="header-text">Alternative Contact Infomation</p>
					<p class="contact-head">Alternatively, you can get in contact with the following information.</p>
					<p>Email: 	
					<!-- Here the textfield is echoed out onto the page -->			
						<?php
						  	$about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '3'");
							$get_result = mysql_fetch_assoc($about_query);
							$about_the_user = $get_result['textfield'];
							echo $about_the_user;
						?>
					</p>
					<p class="contact-head-2">Phone:
					<!-- Here the textfield is echoed out onto the page -->	 
						<?
						  	$about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid='4'");
							$get_result = mysql_fetch_assoc($about_query);
							$about_the_user = $get_result['textfield'];
							echo $about_the_user;
						?>
					</p>
			</div> <!-- pagecontent_contact_right_top end -->
			<div class="pagecontent_contact_right">
				<p class="header-text">Mailing List</p>
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
					<p class="contact-head">Enter your information below to be added to the mailing list. We will send out information about upcoming events and any changes of dates and time.</p>
					<form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
<!-- 					    <div id="signup-bot-prevent"><input type="text" name="b_820cc815b57eb9e4339e0cb20_8ee30da95e" value=""></div> --><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</form>
				</div>
				<!--End mc_embed_signup-->
			</div> <!-- pagecontent_contact_right end -->
		</div> <!-- contactright Ends -->
		<br />
		</body>
<?php
include ("../footer.html");
?>
</html>