<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $uid = $_SESSION["u"]["email"];
    $id = $_GET["id"];

    $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $uid . "'");
    $user_d = $user_r->fetch_assoc();

    $watchlist = Database::search("SELECT * FROM `myfavorite` WHERE `gig_id`='" . $id . "' AND `user_id`='" . $user_d["id"] . "'");
    $n = $watchlist->num_rows;

    if ($n == 1) {
        echo "You have recently added this product to the watchlist";
    } else {
        Database::iud("INSERT INTO `myfavorite` (`gig_id`,`user_id`) VALUES('" . $id . "','" .  $user_d["id"] . "')");
        echo "success";
    }
}
