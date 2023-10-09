<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51LOXb5ABVBKcpMbMqYB0FZRezAm2Qj528KvxeG2A789l7XrQABf3smJ6rBOLCQmShIEcYWMeSw2JYiLmGh483ToF00vJCGhDHC","publishableKey" => "pk_test_51LOXb5ABVBKcpMbMQRkpOswMeCpFWrBm7dyuqIEWcod9uJyOMaMSMH0M82AwSVe4WrJxEL0x57w6l4oXA5k9m4Xd00JNzob4pk"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>