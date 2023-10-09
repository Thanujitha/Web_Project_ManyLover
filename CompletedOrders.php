<!DOCTYPE html>

<html>

<head>
    <title>Freelance | My Order</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo/logoh.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body class="bodyHome">

    <div class="container-fluid">
        <div class="row">

            <?php
            require "connection.php";
            session_start();

            if (isset($_SESSION["u"])) {
            ?>

                <div class="col-12 ">
                    <div class="row">
                        <?php
                        require "header.php";
                        ?>

                    </div>
                </div>


                <div class="col-12 justify-content-center">
                    <div class="row m-3">

                        <div class="col-12">
                            <div class="row">
                                <span class="m-3">.</span>
                            </div>
                        </div>
                        <?php
                        require "MyOrderHeder.php";
                        ?>

                        <div class="col-12 shadow_div_box container-fluid mt-5">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <span class="h3 text-dark fw-bold m-3">MY ORDER</span>

                                    </div>
                                </div>

                                <hr class="hr_break_1" />

                                <div class="border border-1 rounded-2 border-dark col-10 offset-1 mb-4">

                                    <div class="col-12 mt-3 mb-2">
                                        <div class="row text-center">

                                            <div class="col-2 col-lg-2 bg-light pt-2 pb-2 ">
                                                <span class=" fw-bold text-dark">Buyer</span>
                                            </div>

                                            <div class="col-2 col-lg-3 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <span class=" fw-bold text-dark">GIG</span>
                                            </div>

                                            <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                                <span class=" fw-bold text-dark">Order Date</span>
                                            </div>

                                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <span class="fw-bold text-dark ">Deleverd date</span>
                                            </div>

                                            <div class="col-1 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <span class="fw-bold text-dark ">Price</span>
                                            </div>

                                            <div class="col-4 col-lg-1 bg-light"></div>

                                        </div>
                                    </div>

                                    <?php
                                    $user = $_SESSION["u"];
                                    $email = $user["email"];

                                    $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                    $user_details = $user_r->fetch_assoc();

                                    $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");

                                    if (!$user_data->num_rows == 0) {
                                        $ud = $user_data->fetch_assoc();

                                        $order = Database::search("SELECT order.completOrderFile,order.gigId, gig.user_details_id, gig.title, order.date_Time, order.delever_date, gig.price, order.id  FROM gig INNER JOIN `order` ON gig.id =`order`.gigId INNER JOIN user ON user.id =`order`.user_id
                                    INNER JOIN user_details ON user_details.user_id=user.id WHERE `order`.`user_id`='" . $user_details["id"] . "' AND  `order`.`orderStatus_id`='1'");

                                        $order_num = $order->num_rows;

                                        for ($x = 0; $order_num > $x; $x++) {
                                            $order_data = $order->fetch_assoc();

                                            $byer = Database::search("SELECT * FROM `user_details` WHERE `id`='" . $order_data["user_details_id"] . "'");
                                            $byer_data = $byer->fetch_assoc();

                                            $user_data1 = Database::search("SELECT * FROM `user` WHERE `id`='" . $byer_data["user_id"] . "'");
                                            $seller_data = $user_data1->fetch_assoc();

                                    ?>
                                            <span class="d-none" id="gigid"><?php echo $order_data["gigId"]; ?></span>
                                            <div class="col-12 mt-3 mb-2">
                                                <div class="row text-center">

                                                    <div class="col-2 col-lg-2 bg-light pt-2 pb-2 ">
                                                        <span class=" fw-bold text-black-50"><?php echo   $seller_data["email"] ?></span>
                                                    </div>

                                                    <div class="col-2 col-lg-3 bg-light pt-2 pb-2 d-none d-lg-block">
                                                        <span class=" fw-bold text-black-50"><?php echo $order_data["title"] ?></span>
                                                    </div>

                                                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                                        <span class=" fw-bold text-black-50"><?php echo $order_data["date_Time"] ?></span>
                                                    </div>

                                                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                        <span class="fw-bold text-black-50"><?php echo $order_data["delever_date"] ?></span>
                                                    </div>

                                                    <div class="col-1 bg-light pt-2 pb-2 d-none d-lg-block">
                                                        <span class="fw-bold text-black-50">$<?php echo $order_data["price"] ?></span>
                                                    </div>

                                                    <div class="col-2 bg-light pt-2 pb-2">
                                                        <?php

                                                        $pay = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $order_data["id"] . "'");
                                                        $pay_num = $pay->num_rows;
                                                        if ($pay_num != 0) {
                                                        ?>
                                                            <a href="downloadzipfile.php?code=<?php echo $order_data["completOrderFile"] ?>"> <button class="fw-bold btn border border-2 btn-success">Download</button></a>
                                                            <button class="btn btn-outline-dark mt-1" onclick="openFinalProjectUploardModel()">FeedBack</button>
                                                        <?php
                                                        } else {
                                                        ?>

                                                            <a href="checkout.php?id=<?php echo $order_data['id'] ?>&bayerId=<?php echo $byer_data["user_id"] ?>">
                                                                <button class="fw-bold btn border border-2 btn-success">Pay and Download</button>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                </div>
                                            </div>


                                    <?php

                                        }
                                    }
                                    // }
                                    ?>

                                </div>

                            </div>
                        </div>

                        <div class="modal fade" id="UploadProject" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content align-items-center ">
                                    <div class="modal-header">
                                        <h5 class="modal-title">FeedBack</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="col-12">
                                            <span class="text-danger" id="msgfoget"></span>
                                        </div>
                                        <div class="row">

                                            <div class="col-12 border border-1">
                                                <textarea id="feedback" class="form-control border-0 bg-white" style="height: 100px;"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-success" onclick="sendfeedbak(<?php echo $order_data['id'] ?>);">Send feedback</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 ">
                    <div class="row">
                        <?php
                        require "footer.php";
                        ?>

                    </div>
                </div>

            <?php
            } else {
            ?>

                <script>
                    window.location = "index.php";
                </script>
            <?php
            }

            ?>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>