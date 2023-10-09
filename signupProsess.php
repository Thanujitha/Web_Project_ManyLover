<?php

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$repassword = $_POST["rp"];


if (empty($email)) {
    // echo "Please enter your Email Address.";
    echo "e1";

} else if (strlen($email) > 100) {
    // echo "Email Address should contain less than 100 characters.";
    echo "e2";

} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // echo "Invalid Email Address.";
    echo "e3";

} else if (empty($password)) {
    // echo "Please enter your Password";
    echo "p1";

} else if (strlen($password) < 5 || strlen($password) > 20) {
    // echo "length 6-20";
    echo "p2";

} else if (empty($repassword)) {
    // echo "Please enter your RePassword";
    echo "pr1";

} else if ($password != $repassword) {
    // echo "Invalid RePassword";
    echo "pr2";

} else {

    $r =  Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $rs = $r->num_rows;

    if ($rs > 0) {
        // echo "User with the same Email Address already exists.";
        echo "ae";
    }else{
        $d=new DateTime();
        $tz=new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`(`email`,`password`,`joined_date`)VALUES('".$email."','".$password."','".$date."')");

        echo "success";

    }
}
