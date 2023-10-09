<?php

require "connection.php";

$message = $_POST["m"];
$seller = $_POST["to"];
$me = $_POST["me"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$u = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $me . "'");
$unum = $u->num_rows;
if ($unum != 0) {
    if (!empty($message)) {
        Database::iud("INSERT INTO `massage`(`sender_id`,`to_id`,`message`,`dateTime`)VALUES('" . $me . "','" . $seller . "','" . $message . "','" . $date . "')");

        echo "sucsess";
    } else {
        echo "Enter Message";
    }
}else{
    echo "Youer profile Update First";
}
