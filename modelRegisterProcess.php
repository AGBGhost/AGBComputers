<?php

include "connection.php";

$model = $_POST["m"];
//echo ($model);

if (empty($model)) {
    echo("Please Enter Your model");
}else if (strlen($model) > 20){
    echo ("Your model Name Should be less than 20 Characters");
}else{

    $rs = Database::search("SELECT * FROM `model` WHERE `model_name` = '".$model."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your model Name is Already Use");
    }else {
        Database::iud("INSERT INTO `model` (`model_name`) VALUE ('".$model."')");
        echo("Success");
    }
}


?>