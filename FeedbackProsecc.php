<?php

require "connection.php";
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d hh:MM:ss");


if (isset($_POST["id"])) {
    $oid = $_POST["id"];
    $feedback = $_POST["feedback"];

    $order = Database::search("SELECT * FROM `order` WHERE `id` ='" . $oid . "'");

    if($order->num_rows !=0){
        $order_data=$order->fetch_assoc();

        if(!empty($feedback)){

            Database::iud("INSERT INTO `feedback`(`gigid`,`userid`,`feedback`,`date`) VALUES('".$order_data["gigId"]."','".$order_data["user_id"]."','".$feedback."','".$date."')");
            echo "sucsess";
        }else{
            echo "Enter Feedback";
        }
    }

}
