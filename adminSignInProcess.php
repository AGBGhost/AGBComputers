<?php

session_start();
include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];

// echo($username);

if(empty($email)) {
    echo("Please Enter Your Email");
}else if(empty($password)){
    echo("Please Enter Your Password");
}else {
    
  $rs =  Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '".$password."' ");
   $num = $rs->num_rows;

   if ($num == 1) {

   $d = $rs->fetch_assoc();

if ($d["user_type_id"] == 1){
    echo("success");

    $_SESSION["a"] = $d;
}else{
    echo("You Don't have an Admin Account");
}

}else {
    
    echo ("Invalid Email & Password");
   }
}


?>