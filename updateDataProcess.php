<?php

include "connection.php";

session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if(empty($fname)){
    echo ("Please Enter Your First Name.");
}else if(strlen($fname) > 50){
    echo ("First Name Must Contain LOWER THAN 50 characters.");
}else if(empty($lname)){
    echo ("Please Enter Your Last Name.");
}else if(strlen($lname) > 50){
    echo ("Last Name Must Contain LOWER THAN 50 characters.");
}else if(empty($mobile)){
    echo ("Please Enter Your Mobile Number.");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number Must Contain 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo ("Invalid Mobile Number.");
}else if(empty($line1)){
    echo ("Please Enter Your Address Line 01.");
}else if(strlen($line1) > 50){
    echo ("Your Address Not Should be less than 50 characters.");
}else if(empty($line2)){
    echo ("Please Enter Your Address Line 02.");
}else if(strlen($line2) > 50){
    echo ("Your Address Not Should be less than 50 characters.");
}else{
    
    Database::iud("UPDATE `user` SET `fname` ='".$fname."',`lname` ='".$lname."',`mobile` ='".$mobile."',`line_1` ='".$line1."',`line_2` ='".$line2."'
    WHERE `email` = '".$user["email"]."'");

   $rs =  Database::search("SELECT * FROM `user` WHERE `email` = '".$user["email"]."'");
    $d =$rs->fetch_assoc();
    $_SESSION["u"]= $d;

    echo("Update Successfully");
}
?>