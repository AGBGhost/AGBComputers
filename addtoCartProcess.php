<?php

include "connection.php";

session_start();
$user = $_SESSION["u"];

$stockId = $_POST["s"];
$qty = $_POST["q"];

//echo($stockId);
$rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $stockId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    //echo("In Stock");

    $d = $rs->fetch_assoc();
    $stockQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_email` ='" . $user["email"] . "' AND `product_id` ='" . $stockId . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        //echo ("Update");
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];

        if ($stockQty >= $newQty) {
              //    Update Query
              Database::iud("UPDATE `cart` SET `cart_qty` = '".$newQty."' WHERE  `cart_id` = '".$d2["cart_id"]."'");
              echo("Cart Item Updated Successfully");
        } else {
            echo("Product Quantity has been exceeded!");
            
        }
        
    } else {
        //echo ("Insert");
        if ($stockQty >= $qty) {
            // insert query
            Database::iud("INSERT INTO  `cart` (`cart_qty`,`user_email`,`product_id`) VALUES ('".$qty."','".$user["email"]."','".$stockId."')");
            echo("Cart Item Added Successfully");
        } else {
            echo("Product Quantity has been exceeded!");
        }
    }
    
} else {
    echo ("You Product is Not Found");
}


?>