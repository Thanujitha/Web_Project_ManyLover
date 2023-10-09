<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];

    if (!empty($email)) {
        $resultset = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $n = $resultset->num_rows;

        if ($n == 1) {
            $code = uniqid();

            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

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
            $mail->Subject = 'Reset Your Password';
            $bodyContent = '<h1>Reset Your Password</h1> <p>Hi,</p> <p> To set a new password for your account, use the verification code below: </P> <h3>code : ' . $code . '</h3>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }
        } else {
            echo "Email address not found.";
        }
    }else {

        echo "Please Enter your Email Address.";
    }
    
} 