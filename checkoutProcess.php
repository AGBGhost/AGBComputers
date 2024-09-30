<?php

include "connection.php";

session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])){

$payment = json_decode($_POST["payment"],true);

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Colombo"));
$time = $date->format("Y-m-d H-i-s");

Database::iud("INSERT INTO `order_history` (`order_id`,`order_date`,`amount`,`user_email`)
VALUES ('".$payment["order_id"]."','".$time."','".$payment["amount"]."','".$user["email"]."',)");

$orderHistoryId = Database::$connection->insert_id;

$rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$user["email"]."'");
$num = $rs->$num_rows;

for ($i=0; $i < $num; $i++) { 
   //order Item Insert
   $d = $rs->fetch_assoc();


   Database::iud("INSERT INTO `order_item` (`oi_qty`,`order_history_ohid`,`product_id`)
   VALUES ('".$d["cart_qty"]."','".$orderHistoryId."','".$d["product_id"]."')");

   $rs2 =  Database::search("SELECT * FROM `product` WHERE `id` = '".$d["product_id"]."'");
   $d2 = $rs2->fetch_assoc();

   $newQty = $d2["qty"] - $d["cart_qty"];
   Database::iud("UPDATE `product` SET `qty` = '".$newQty."' WHERE `id` = '".$d["product_id"]."'");

}

Database::iud("DELETE FROM `cart` WHERE `user_email` = '".$user["email"]."'");
echo("Success");

}

?>