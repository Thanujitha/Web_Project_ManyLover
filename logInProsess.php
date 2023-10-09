<?php

session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];


if (empty($email)) {
    echo "e1";
} else if (empty($password)) {
    echo "p1";
} else {

    $r = Database::search("SELECT * FROM `user` WHERE `email` ='" . $email . "' AND `password`='" . $password . "'");
    $rs = $r->num_rows;

    if ($rs == 1) {

        echo "success";

        $fc = $r->fetch_assoc();
        $_SESSION["u"] = $fc;

        if ($rememberme == "true") {

            $code = uniqid();
            $code = $code .= $fc["id"];

            Database::iud("UPDATE `user` SET `cookie_id`='" . $code . "' WHERE `email`='" . $email . "'");

            setcookie("cookieId", $code, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("cookieId", "", -1);
        }
    } else {
        echo "in";
    }
}
