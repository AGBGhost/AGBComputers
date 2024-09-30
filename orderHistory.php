<?php

include "connection.php";
include "header.php" ;
session_start();
$user = $_SESSION["u"];


if (isset($user)) {
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order History</title>
    </head>
    <body>
        
<h2>hello</h2>

    </body>
    </html>
    
    
    
    <?php
} else {
    header("location: index.php");
}


?>