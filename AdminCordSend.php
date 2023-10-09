<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_GET["email"];

if (empty($email)) {
    echo "Enter Youer email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Enter valid Email";
} else {

    $Admin = Database::search("SELECT * FROM `admin_account` WHERE `email`='" . $email . "'");

    if ($Admin->num_rows > 0) {

        $code = uniqid();

        Database::iud("UPDATE `admin_account` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thanujithad@gmail.com';
        $mail->Password = 'hrtsxyywkvneqgwm';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('thanujithad@gmail.com', 'MoneyLover');
        $mail->addReplyTo('thanujithad@gmail.com', 'MoneyLover');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Admin code';
        $bodyContent = '<h2>Admin verification code</h2> <h4>code : ' . $code . '</h4>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }
    } else {
        echo "Email address not found";
    }
}
