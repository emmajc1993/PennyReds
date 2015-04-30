<?php
  $page_title = "About Us";
  $page_description = "About Us page for Penny Red's Pony Parties Riding School in Cornwall.";
  include ("../headerm.php");
?>
	<script>
		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script> <!-- script to embed Facebook feed -->
	<div class="fb-like-box" data-href="https://www.facebook.com/pages/Penny-Reds-Pony-Parties/294343604002849?fref=ts" data-width="300" data-height="500" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true">
	</div> <!-- end fb-like-box -->
	<p><img class="aboutus" src="../images/Banner4.jpg" alt="Placeholder"></p>
	<p class="aboutustext">
		<?
			$about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid='2'");
			$get_result = mysql_fetch_assoc($about_query);
			$about_the_user = $get_result['textfield'];
			echo $about_the_user;
		?>
		</body>
<?php
include ("../footer.html");
?>
</html>