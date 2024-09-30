<?php

include "connection.php";
include "header.php";
session_start();
$user = $_SESSION["u"];


if (isset($user)) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width= , initial-scale=1.0">
        <title>Cart</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="cart.css">
        <link rel="icon" href="IMAGES/agb logo.png">


    </head>

    <body onload="loadcart();">

        <!--header-->

        <!--header-->

        <div class="top" id="cartBody">

            <div class="box">
                <div class="url">
                    <h5>Home / Cart</h5>
                </div>
                <div class="title1">CART</div>

                <!-- empty -->

                <!-- empty -->
                <div class="bar2"></div>
            </div>
        </div>

        <!--footer-->

  <?php include "footer.php" ?>

<!--footer-->
 


        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}


?>