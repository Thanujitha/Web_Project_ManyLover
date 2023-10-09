<?php
session_start();
require "connection.php";

$code = $_POST["code"];
$email = $_POST["email"];

if (empty($email)) {
    echo "Enter Email";
} else if (empty($code)) {
    echo "Enter Verification code";
} else {

    $vcode = Database::search("SELECT * FROM `admin_account` WHERE `email`= '" . $email . "' AND `verification_code`='" . $code . "'");

    if ($vcode->num_rows != 0) {
     
        $fc = $vcode->fetch_assoc();
        $_SESSION["admin"] = $fc;
 
    } else {
        echo "verification code not valide";
    }
}
