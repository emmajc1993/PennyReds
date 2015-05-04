<?php
$page_title = "Login";
$page_description = "Login page for Penny Red's Pony Parties Riding School in Cornwall.";
include ("headerl.php");
?>
<!-- Make the login box pop up -->
    <script type="text/javascript">
      <!--
          function toggle_visibility(id) {
             var e = document.getElementById(id);
             if(e.style.display == 'block')
                e.style.display = 'none';
             else
                e.style.display = 'block';
          }
      //-->
    </script>
<!-- Style the login box -->
    <style type="text/css">

      #popupBoxOnePosition{
        top: 0; left: 0; position: fixed; width: 100%; height: 120%;
        background-color: rgba(0,0,0,0.7); display: none;
      }
      .popupBoxWrapper{
        width: 550px; margin: 50px auto; text-align: left;
      }
      .popupBoxContent{
        background-color: #fee2b5; padding: 15px;
      }

    </style>

  </head>

  <body>

    <div id="popupBoxOnePosition">
      <div class="popupBoxWrapper">
        <div class="popupBoxContent">
          <h2>Sign In</h2>
          <form action="core/authenticate.php" method="POST">
            <fieldset>
              <?php if(isset($_GET["feedback1"])){echo $_GET["feedback1"];} ?>

              <p><label for="username" style="background-color: #fee2b5">Username</label></p>
              <p><input type="text" name="username" id="username" placeholder="Username"></p>

              <p><label for="password" style="background-color: #fee2b5">Password</label></p>
              <p><input type="password" name="password" id="password" placeholder="Password"></p>

              <input type="submit" value="Sign In">

              <p>Click <a href="register.php">here</a> to register!</p>
              <p>Forgotten password? Click <a href="register.php">here</a>!</p>

            </fieldset>
          </form>
          <p><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Cancel</a></p>
        </div>
      </div>
    </div>

    <div id="wrapper">

      <p>Click <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">here</a> to login.</p>
  
    </div><!-- wrapper end -->

  </body>
<?php
include ("../footer.html");
?>
</html>