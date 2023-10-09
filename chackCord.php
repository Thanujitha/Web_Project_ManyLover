<?php

require "connection.php";

$email = $_POST["e"];
$vcode = $_POST["v"];

if (empty($email)) {
    echo "Enter Email";
}else if (empty($vcode)) {
    echo "Enter Verification cord";
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `verification_code`='" . $vcode . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        echo "sucsess";
    }else{
        echo "Invalid Verification cord";
    }
}
