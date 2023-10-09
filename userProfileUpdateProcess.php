<?php
require "connection.php";
session_start();
$email1 = $_SESSION["u"]["email"];

$name = $_POST["n"];
$contact = $_POST["c"];
$about = $_POST["a"];
$fb = $_POST["f"];
$twit = $_POST["t"];
$linkedin = $_POST["l"];
$ytube = $_POST["y"];
$education = $_POST["ed"];

$user = Database::search("SELECT * FROM `user` WHERE `email`='" . $email1 . "'");
$userNum = $user->num_rows;

if ($userNum == 1) {

    $userfech = $user->fetch_assoc();
    $userid = $userfech["id"];

    $userDetals = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $userid . "'");
    $userDetailsnum = $userDetals->num_rows;

    if ($userDetailsnum == 1) {

        Database::iud("UPDATE `user_details` SET `name`='" . $name . "',`contact`='" . $contact . "', `about`='" . $about . "',`education`='" . $education . "' WHERE `user_id`='" . $userid . "' ");

        $r = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $userid . "'");
        $rs=$r->fetch_assoc();

        Database::iud("UPDATE `account_link` SET `facebook`='" . $fb . "',`twitter`='" . $twit . "',`linkedin`='" . $linkedin . "',`youtube`='" . $ytube . "' WHERE `user_details_id` ='".$rs["id"]."'");

        echo "sucsess";
    } else {

        Database::iud("INSERT INTO `user_details`(`user_id`,`name`,`contact`,`about`,`education`)VALUES('" . $userid . "','" . $name . "','" . $contact . "','" . $about . "','" . $education . "') ");

        $userDetailsId =  Database::$connection->insert_id;

        Database::iud("INSERT INTO `account_link`(`facebook`,`twitter`,`linkedin`,`youtube`,`user_details_id`)VALUES('" . $fb . "','" . $twit . "','" . $linkedin . "','" . $ytube . "','" . $userDetailsId . "')");
        echo "sucsess";
    }
} 