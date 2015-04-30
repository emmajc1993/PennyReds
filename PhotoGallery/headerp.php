<?php
session_start();
include "functions.php";
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../PR.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</head>
<body>

        <div class="mashmenu">
            <div id="menuWrapper">   

            <?
            if (($_SESSION["account_type"])=="Member") {
            echo '
            
            <div class="fnav">
                <a href="../MainSite/homepage.php" class="flink" >Home</a>
                <a href="../MainSite/about.php" class="flink" >About</a>
                <a href="../PhotoGallery/index.php" class="flink" >Gallery</a>
                <a href="../MainSite/events.php" class="flink" >Upcoming Events</a>
                <a href="../MainSite/prices.php" class="flink" >Prices</a>
                <a href="../Members/Users/fun.php" class="flink" >Members</a>
                <a href="../MainSite/logout.php" class="flink" >Logout</a>

            </div><!-- end fnav -->
            
            ';
            }
            elseif (($_SESSION["account_type"])=="Staff") {
            echo '
                <div class="fnav">
                <a href="../MainSite/homepage.php" class="flink" >Home</a>
                <a href="../MainSite/about.php" class="flink" >About</a>
                <a href="../PhotoGallery/index.php" class="flink" >Gallery</a>
                <a href="../MainSite/events.php" class="flink" >Upcoming Events</a>
                <a href="../MainSite/prices.php" class="flink" >Prices</a>
                <a href="../Members/Users/fun.php" class="flink" >Members</a>
                <a href="../Members/Staff/staff.php" class="flink" >Staff</a>
                <a href="../MainSite/logout.php" class="flink" >Logout</a>

            </div><!-- end fnav -->

            ';
            }
            elseif (($_SESSION["account_type"])=="Admin") {
                 echo '
                
                <div class="fnav">
                <a href="../MainSite/homepage.php" class="flink" >Home</a>
                <a href="../MainSite/about.php" class="flink" >About</a>
                <a href="../PhotoGallery/index.php" class="flink" >Gallery</a>
                <a href="../MainSite/events.php" class="flink" >Upcoming Events</a>
                <a href="../MainSite/prices.php" class="flink" >Prices</a>
                <a href="../Members/Users/fun.php" class="flink" >Members</a>
                <a href="../Members/Staff/staff.php" class="flink" >Staff</a>
                <a href="../Members/Admin/adminsection.php" class="flink" >Admin</a>
                <a href="../MainSite/logout.php" class="flink" >Logout</a>

            </div><!-- end fnav -->
                
                ';
            }
            else  {
                echo '
                
                <div class="fnav">
                <a href="../MainSite/homepage.php" class="flink" >Home</a>
                <a href="../MainSite/about.php" class="flink" >About</a>
                <a href="../PhotoGallery/index.php" class="flink" >Gallery</a>
                <a href="../MainSite/events.php" class="flink" >Upcoming Events</a>
                <a href="../MainSite/prices.php" class="flink" >Prices</a>
                <a href="../Login/login.php" class="flink" >Login</a>

            </div><!-- end fnav -->
                
                ';
            }
            ?>

        <p class="title"> Penny Red's Pony Parties</p>
            
            