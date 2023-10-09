<?php
    include("./config.php");

    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];

    $email           = $_POST["stripeEmail"];
    $amount          = $_POST["amount"]; 
    $orderid =$_POST["orderid"];
$bayerId = $_POST["bayerId"];
 
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'inr',

      "source"=> $token,
    ]);

    if($charge){
      header("Location:success.php?amount=$amount&oid=$orderid&bayerId=$bayerId");
    }
