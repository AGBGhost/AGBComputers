<?php

include "connection.php";

session_start();
$user = $_SESSION["u"];

$stockList = array();
$qtyList = array();

if (isset($_POST["cart"]) && $_POST["cart"] == "true" ) {
    //From Cart
    $rs = Database::search("SELECT * FROM `cart` WHERE `user_email` ='".$user["email"]."'");
    $num = $rs->num_rows;

    for ($i=0; $i < $num; $i++) { 
        $d = $rs->fetch_assoc();

        $stockList[] = $d["product_id"];
        $qtyList[] = $d["cart_qty"];
    }
} else {
    //From Buy now
    $stockList[] = $_POST["stockId"];
    $qtyList[] = $_POST["qty"];
}

$merchanId = "1226863";
$merchanSecret = "MTQ0NDEwMTE3MDI1ODgzOTA1Njk3Mjg3MjgyNjcyMTY4Nzc3MjQy";
$items ="";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($i=0; $i < sizeof($stockList); $i++) { 
   
    $rs2 = Database::search("SELECT * FROM `product` WHERE `product`.`id` = '".$stockList[$i]."'");

    $d2 = $rs2->fetch_assoc();
    $stockQty = $d2["qty"];

    if ($stockQty >= $qtyList[$i]) {
        //Stock avilable
            $items .= $d2["title"];

            if ($i != sizeof($stockList) - 1) {
                $items .= ", ";
            }

            $netTotal += (intval($d2["price"]) * intval($qtyList[$i]));


    } else {
       echo("Product has no available Stock");
    }
    

}

//Delevery Fee
$netTotal += 500;

$hash = strtoupper(
    md5(
        $merchanId . 
        $orderId . 
        number_format($netTotal, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchanSecret)) 
    ) 
);

$payment = array();
$payment["sandbox"] = true;
$payment["merchant_id "] = $merchanId;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user["email"];
$payment["phone"] = $user["mobile"];
$payment["address"] = $user["line_1"];
$payment["city"] = $user["line_2"];
$payment["country"] = "Sri Lanka";
$payment["order_id"] = $orderId;
$payment["items"] = $items;
$payment["currency "] = $currency;
$payment["amount"] = number_format($netTotal, 2, '.', '');
$payment["hash"] = $hash;
$payment["return_url"] = "";
$payment["cancel_url"] = "";
$payment["notify_url"] = "";

echo json_encode($payment);

?>