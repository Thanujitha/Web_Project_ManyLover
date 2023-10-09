<?php

require "connection.php";
session_start();
$user = $_SESSION["u"];
$email = $user["email"];

$gigId = $_POST["gigid"];
$msg = $_POST["msa"];
$delivaryDate = $_POST["dd"];

$state = 1;

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


$user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
$user_details = $user_r->fetch_assoc();

$user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");

if ($user_data->num_rows == 0) {
    echo "user Profile Update First";
} else {
    $ud = $user_data->fetch_assoc();

    $chack = Database::search("SELECT * FROM `gig` WHERE `id`='" . $gigId . "'");

    if ($chack->num_rows == 1) {

        $allowed_image_extentions = array("file/zip", "file/rar", "file/pdf");

        if (isset($_FILES["file1"])) {
            $File1 = $_FILES["file1"];

            if (!empty($delivaryDate)) {

                $splitdate = explode(" ", $date);
                $datef = $splitdate[0];

                if ($delivaryDate >= $datef) {

                    $file_extention = $File1["type"];
                    $newimgextention;

                    if ($file_extention = "file/zip") {
                        $newimgextention = ".zip";
                    } else if ($file_extention = "file/rar") {
                        $newimgextention = ".rar";
                    } else if ($file_extention = "file/pdf") {
                        $newimgextention = ".pdf";
                    }

                    $fileName = "";

                    if (!in_array($file_extention, $allowed_image_extentions)) {
                        echo "This File Type Note allowed";
                    } else {

                        $fileName = "resources//orderFile//" . uniqid() . $newimgextention;

                        move_uploaded_file($File1["tmp_name"], $fileName);

                        Database::iud("INSERT INTO `order`(`plashOrderFile`,`message`,`gigId`,`user_id`,`date_Time`,`delivered_time`,`orderStatus_id`) VALUES('" . $fileName . "','" . $msg . "','" . $gigId . "','" . $user_details["id"] . "','" . $date . "','" . $delivaryDate . "','2')");

                        echo "sucsess";
                    }
                } else {
                    echo "Valid Delivary Date";
                }
            } else {
                echo "Select Delivary Date";
            }
        } else {
            echo "No File Found";
        }
    } else {
        echo "Gig is not Found";
    }
}
