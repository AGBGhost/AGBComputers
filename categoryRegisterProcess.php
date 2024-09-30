<?php

include "connection.php";

$cat = $_POST["c"];
//echo ($cat);

if (empty($cat)) {
    echo("Please Enter Your Category");
}else if (strlen($cat) > 20){
    echo ("Your category Name Should be less than 20 Characters");
}else{

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '".$cat."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Category Name is Already Use");
    }else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUE ('".$cat."')");
        echo("Success");
    }
}


?>