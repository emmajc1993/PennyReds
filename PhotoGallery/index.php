<?php 
	include("headerp.php"); 
?>
    <title>Photo Gallery Home</title>


<!-- start gallery header --> 
<link rel="stylesheet" type="text/css" href="folio-gallery.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css" />
<!--<link rel="stylesheet" type="text/css" href="fancybox/fancybox.css" />-->
<script type="text/javascript" src="colorbox/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {	
	
	// colorbox settings
	$(".albumpix").colorbox({rel:'albumpix'});
	
});
</script>
<!-- end gallery header -->

<p>&nbsp;</p>

<div class="gallery">  
  <?php include "folio-gallery.php"; ?>
</div>   

</body>
<?php
include ("../footer.html");
?>
</html>