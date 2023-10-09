<?php

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rePassword = $_POST["rp"];
$vcode = $_POST["vc"];


if (empty($email)) {
    echo "Send the Verification cord";
} else if (empty($password)) {
    echo "Enter new password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "length 6-20";
} else if (empty($rePassword)) {
    echo "Enter your RePassword";
} else if ($password != $rePassword) {
    echo "Invalid RePassword";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `verification_code`='" . $vcode . "'");
    $n = $rs->num_rows;

    if ($n == 1) {

        Database::iud("UPDATE `user` SET `password`='" . $password . "' WHERE `email`='" . $email . "'");
        echo "success";
    } else {
        echo "Invalid email or verification code";
    }
}
