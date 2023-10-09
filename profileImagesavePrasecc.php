<?php

require "connection.php";
session_start();
$user = $_SESSION["u"];
$email = $user["email"];

$allowed_image_extentions = array("image/jpeg", "image/png", "image/svg", "image/jpg");

$user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
$user_details = $user_r->fetch_assoc();

$user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");

if ($user_data->num_rows == 0) {
    echo "user Profile Update First";
} else {
    $ud = $user_data->fetch_assoc();

    if (isset($_FILES["u"])) {
        $imageFile = $_FILES["u"];
        $file_extention = $imageFile["type"];
        $newimgextention;
        if ($file_extention = "image/jpeg") {
            $newimgextention = ".jpeg";
        } else if ($file_extention = "image/jpg") {
            $newimgextention = ".jpg";
        } else if ($file_extention = "image/png") {
            $newimgextention = ".png";
        } else if ($file_extention = "image/svg") {
            $newimgextention = ".svg";
        }

        $fileName = "";

        if (!in_array($file_extention, $allowed_image_extentions)) {
            echo "This File Type Note allowed";
        } else {

            $fileName = "resources//profileImage//" . uniqid() . $newimgextention;

            move_uploaded_file($imageFile["tmp_name"], $fileName);
        }

        $profileImage = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`='" . $ud["id"] . "'");
        $profileImage_num = $profileImage->num_rows;

        if ($profileImage_num == 1) {

            Database::iud("UPDATE `profile_image` SET `url`='" . $fileName . "' WHERE `user_details_id` ='" . $ud["id"] . "' ");
        } else {
            Database::iud("INSERT INTO `profile_image`(`url`,`user_details_id`) VALUES('" . $fileName . "','" . $ud["id"] . "')");
        }

        // Database::iud("INSERT INTO `gig_image`(`url1`,`url2`,`url3`) VALUES('" . $fileName . "','" . $fileName1 . "' ,'" . $fileName2 . "')");
        // $imageId = Database::$connection->insert_id;

        // Database::iud("INSERT INTO `gig`(`user_details_id`,`title`,`brand_id`,`price`,`description`,`gig_image_id`,`date_time`)VALUES ('" . $ud["id"] . "','" . $title . "','" . $brandselect . "','" . $price . "','" . $descriptionarea . "','" . $imageId . "','" . $date . "')");
        echo "sucsess";
    } else {
        echo "No Image Found";
    }
}
