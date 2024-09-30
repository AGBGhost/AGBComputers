<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

//echo($productId);



    $rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $productId . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        
        
        Database::iud("UPDATE `product` SET `qty` = '".$qty."'  WHERE `id` = '".$d["id"]."' ");
       

    } 
    
    if ($num == 1) {
        
        
        Database::iud("UPDATE `product` SET `price` = '".$price."'  WHERE `id` = '".$d["id"]."' ");
        echo("Product Updated Successfully");
    } 

    
       
     
    


?>