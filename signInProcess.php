<?php
session_start();
include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $n = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($n == 1) {
        if ($d["status_status_id"] == 1) {

            echo ("success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {

                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {

                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo ("Inactive User.");
        }
    } else {
        echo ("Invalid Username or Password.");
    }
}
