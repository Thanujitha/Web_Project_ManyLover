<?php 

$orderid=$_GET["id"];
require "connection.php";

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$cancel=Database::iud("UPDATE `order` SET `orderStatus_id` ='4' , `delever_date`='".$date."' WHERE `order`.`id`='".$orderid."'");
 
echo "sucsess";