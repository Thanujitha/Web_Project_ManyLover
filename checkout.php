<!DOCTYPE html>
<html lang="en">

<head>
    <title>Freelance | Payment</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo/logoh.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $order_id = $_GET["id"];
        $bayerId=$_GET["bayerId"];
        $order = Database::search("SELECT * FROM `order` WHERE `id`='" . $order_id . "'");

        if ($order->num_rows != 0) {

            $order_data = $order->fetch_assoc();

?>

            <body>

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 text-center mt-3">
                            <h3 class="form-label">Payment</h3>
                        </div>

                        <div class="col-12 col-lg-6 offset-lg-1 ">
                            <div class="row m-5">

                                <div class="border border-1 rounded-2 border-dark  bg-light">

                                    <div class="col-12 m-3">
                                        <span class=" fw-bold text-black-50">Payment Option</span>
                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-12 pt-2 pb-2 ">

                                        <input type="radio" class="m-3">
                                        <img src="resources/Card.jpeg" class="m-3" style="height: 50px;">

                                    </div>

                                </div>

                            </div>
                        </div>

                        <?php

                        $gig = Database::search("SELECT * FROM `gig` WHERE `gig`.`id`='" . $order_data["gigId"] . "'");
                        $gig_data = $gig->fetch_assoc();

                        ?>

                        <div class="col-12 col-lg-4">
                            <div class="row m-5">

                                <div class="border border-1 rounded-2 border-dark  bg-light">

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-5">
                                                <div class="row m-1 mt-3">
                                                    <?php

                                                    $gigImage = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gig_data["gig_image_id"] . "'");
                                                    $gigImage_data = $gigImage->fetch_assoc();

                                                    ?>
                                                    <img src="<?php echo $gigImage_data["url1"] ?>" style="height: 80px; width: 180px;">
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="row mt-3">
                                                    <span class="form-label fw-bold text-black-50"><?php echo $gig_data["title"]; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row m-3">
                                                    <hr class="hr_break_1" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row ">

                                            <div class="col-6">
                                                <div class="row mx-3">
                                                    <span class="fw-bold form-label text-start text-black-50">Price -</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row me-4">
                                                    <span class="form-label text-end text-black">$<?php echo $gig_data["price"]; ?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row mt-1">

                                            <div class="col-6">
                                                <div class="row mx-3">
                                                    <span class="fw-bold form-label text-start text-black-50">Transfer fee</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row me-4">

                                                    <?php
                                                    $fee = $gig_data["price"] / 100 * 2;
                                                    $total = $gig_data["price"] + $fee;
                                                    ?>
                                                    <span class="form-label text-end text-black">$<?php echo $fee ?></span>
                                                    <span class="form-label text-end text-danger">Transfer fee 2%</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row m-3">
                                            <hr class="hr_break_1" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row ">

                                            <div class="col-6">
                                                <div class="row mx-3">
                                                    <h5 class="fw-bold form-label text-start">Total</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row me-4">
                                                    <h5 class="form-label text-end text-black fw-bold" id="price">$<?php echo $total; ?></h5>
                                                </div>
                                            </div>
                                            <form autocomplete="off" action="checkout-charge.php" method="POST">
                                                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                                                <input type="hidden" name="orderid" value="<?php echo $order_id; ?>">
                                                <input type="hidden" name="bayerId" value="<?php echo $bayerId; ?>">

                                                <div class="col-12">
                                                    <div class="row m-3">


                                                        <!-- <span class="btn btn-success fw-bold"> Pay
                                            </span> -->
                                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button " data-key="pk_test_51LOXb5ABVBKcpMbMQRkpOswMeCpFWrBm7dyuqIEWcod9uJyOMaMSMH0M82AwSVe4WrJxEL0x57w6l4oXA5k9m4Xd00JNzob4pk" data-amount=<?php echo str_replace(",", "", $total) * 100 ?> data-currency="usd" data-locale="auto">
                                                        </script>

                                                    </div>
                                                </div>
                                            </form>

                                            <script>
                                                $('#ph').on('keypress', function() {
                                                    var text = $(this).val().length;
                                                    if (text > 9) {
                                                        return false;
                                                    } else {
                                                        $('#ph').text($(this).val());
                                                    }

                                                });
                                            </script>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </body>
        <?php
        } else {
        ?>
            <script>
                window.location = "CompletedOrders.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            window.location = "CompletedOrders.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "CompletedOrders.php";
    </script>
<?php
}

?>

</html>