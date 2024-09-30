<?php

include "connection.php";


$email = $_POST["e"];
$newPassword = $_POST["n"];
$retypePassword = $_POST["r"];
$vcode = $_POST["v"];

if ($newPassword != $retypePassword){
echo("Password does not match.");
}else{

   $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='".$vcode."'");
   $num = $rs->num_rows;


   if($num == 1){

    Database::iud("UPDATE `user` SET `password`='".$retypePassword."' WHERE `email`='".$email."'");
    echo ("success");

}else{
    echo ("Invalid Email Address or Verification Code");
}


}


?>