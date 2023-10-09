<?php

require "connection.php";

$order_id = $_GET["oid"];
$Price = $_GET["amount"];
$bayerId = $_GET["bayerId"];

session_start();
$user = $_SESSION["u"];
$id = $user["id"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `invoice`(`order_id`,`Price`,`bayerId`,`supplyerId`,`date`)VALUES ('" . $order_id . "','" . $Price . "','" . $bayerId . "','".$id."','".$date."')");

header("Location:invoice.php?amount=$Price&oid=$order_id&bayerId=$bayerId");