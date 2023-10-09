<?Php

require "connection.php";
session_start();
$user = $_SESSION["u"];
$email = $user["email"];


$preview1 = $_POST["v1"];
$preview2 = $_POST["v2"];
$preview3 = $_POST["v3"];

$gig_id = $_POST["id"];
$title = $_POST["t"];
$brandselect = $_POST["b"];
$price = $_POST["p"];
$descriptionarea = $_POST["d"];

$state = 1;
$useremail = $email;

$allowed_image_extentions = array("image/jpeg", "image/png", "image/svg", "image/jpg");

$user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
$user_details = $user_r->fetch_assoc();

$user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");

if ($user_data->num_rows == 0) {
    echo "user Profile Update First";
} else {
    $ud = $user_data->fetch_assoc();

    $chack = Database::search("SELECT * FROM `gig` WHERE `title` ='" . $title . "' AND `user_details_id`='" . $ud["id"] . "'");

    if ($chack->num_rows == 0) {

        $fileName = $preview1;
        $fileName1 = $preview2;
        $fileName2 = $preview3;

        if (isset($_FILES["i1"])) {
            $imageFile = $_FILES["i1"];
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

            if (!in_array($file_extention, $allowed_image_extentions)) {
                echo "This File Type Note allowed";
            } else {

                $fileName = "resources//products//" . uniqid() . $newimgextention;

                move_uploaded_file($imageFile["tmp_name"], $fileName);
            }
        } 

        if (isset($_FILES["i2"])) {
            $imageFile = $_FILES["i2"];
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

            if (!in_array($file_extention, $allowed_image_extentions)) {
                echo "This File Type Note allowed";
            } else {

                $fileName1 = "resources//products//" . uniqid() . $newimgextention;

                move_uploaded_file($imageFile["tmp_name"], $fileName1);
            }
        }

        if (isset($_FILES["i3"])) {
            $imageFile = $_FILES["i3"];
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

            if (!in_array($file_extention, $allowed_image_extentions)) {
                echo "This File Type Note allowed";
            } else {

                $fileName2 = "resources//products//" . uniqid() . $newimgextention;

                move_uploaded_file($imageFile["tmp_name"], $fileName2);
            }
        }

        Database::iud("UPDATE `gig` SET `title`='" . $title . "',`price`='" . $price . "',`description`='" . $descriptionarea . "' WHERE `id`='" . $gig_id . "'");

        $r = Database::search("SELECT * FROM `gig` WHERE `id`='" . $gig_id . "'");
        $rs = $r->fetch_assoc();
        Database::iud("UPDATE `gig_image` SET `url1`='" . $fileName . "',`url2`='" . $fileName1 . "',`url3`='" . $fileName2 . "' WHERE `id`='" . $rs["gig_image_id"] . "'");

        echo "sucsess";
    } else {
        echo "Youer Gig olredy added";
    }
}
