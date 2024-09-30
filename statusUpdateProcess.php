<?php

include "connection.php";

$uemail = $_POST["u"];

//echo($uemail);

if (empty($uemail)) {
    echo ("Please Enter Your User Email");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $uemail . "' AND `user_type_id` = '2'");
    $num = $rs->num_rows;
    //echo ($num);

    if ($num == 1) {
     $d = $rs->fetch_assoc();

            if ($d["status_status_id"] == 1){
                Database::iud("UPDATE `user` SET `status_status_id` = '2' WHERE `email` ='".$uemail."'");
                echo("Deactivate");
            }

            if ($d["status_status_id"] == 2){
                Database::iud("UPDATE `user` SET `status_status_id` = '1' WHERE `email` ='".$uemail."'");
                echo("Active");
            }

    } else{
        echo("Invalid User Email");
    }
}