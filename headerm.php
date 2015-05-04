<?php
    session_start();
    include "functions.php";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $page_title; ?></title>
        <meta http-equiv="description" content="<?php echo $page_description; ?>" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../PR.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>

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
                        <a href="../Login/logout.php" class="flink" >Logout</a>
                    </div>
                '; # end fnav
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
                        <a href="../Login/logout.php" class="flink" >Logout</a>
                    </div>
                '; # end fnav
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
                        <a href="../Login/logout.php" class="flink" >Logout</a>
                    </div>
                    '; # end fnav
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
                    </div>
                    
                    '; # end fnav
                }
            ?>
        <p class="title"> Penny Red's Pony Parties</p>

            
            