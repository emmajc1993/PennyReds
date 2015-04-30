<?php
$page_title = "Prices";
$page_description = "Prices page for Penny Red's Pony Parties Riding School in Cornwall.";
include ("../headerm.php");
?>  

<!-- PayPal Logo --><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works"
onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;">
<img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_now_accepting_pp_2line_w.png" border="0" alt="Now Accepting PayPal"></a><!-- PayPal Logo --></br>
<div id="priceleft">
  <h2>Group Lesson<h2>
    <p>
      <?
        $about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '5'");
        $get_result = mysql_fetch_assoc($about_query);
        $about_the_user = $get_result['textfield'];
        echo $about_the_user;
      ?>
    </p>
  </div>
  <div id="pricemiddle1">
    <h2>Private Lesson</h2>
    <p>
      <?
        $about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '6'");
        $get_result = mysql_fetch_assoc($about_query);
        $about_the_user = $get_result['textfield'];
        echo $about_the_user;
      ?>
    </p>
  </div>
  <div id="pricemiddle2">
    <h2>Hacks</h2>
    <p>
      <?
        $about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '7'");
        $get_result = mysql_fetch_assoc($about_query);
        $about_the_user = $get_result['textfield'];
        echo $about_the_user;
      ?>
    </p>
  </div>
  <div id="priceright">
    <h2>Extra</h2>
    <p>
      <?
        $about_query = mysql_query("SELECT textfield FROM editinfo WHERE textfieldid = '8'");
        $get_result = mysql_fetch_assoc($about_query);
        $about_the_user = $get_result['textfield'];
        echo $about_the_user;
      ?>
    </p>
  </div>
</body>
<?php
include ("../footer.html");
?>
</html>