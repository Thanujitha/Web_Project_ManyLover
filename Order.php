<!DOCTYPE html>

<html>

<head>
    <title>Freelance | ACTIVE ORDERS</title>

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
                        require "userProfileHeader.php";
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
                        require "OrderHeder.php";
                        ?>

                        <div class="col-12 shadow_div_box container-fluid mt-5">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <span class="h3 text-dark fw-bold m-3">ACTIVE ORDERS</span>

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

                                            <div class="col-2 bg-light pt-2 pb-2">
                                                <span class="fw-bold text-dark">Document</span>
                                            </div>

                                            <div class="col-3 col-lg-3 bg-light pt-2 pb-2">
                                                <span class=" fw-bold text-dark">Note</span>
                                            </div>

                                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block text-start">
                                                <span class="fw-bold text-dark ">Delivary Date</span>
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

                                        $order = Database::search("SELECT * FROM gig INNER JOIN `order` ON gig.id =`order`.gigId INNER JOIN user ON user.id =`order`.user_id
                                    INNER JOIN user_details ON user_details.user_id=user.id WHERE gig.user_details_id='" . $ud["id"] . "' AND `orderStatus_id`='2'");

                                        $order_num = $order->num_rows;

                                        for ($x = 0; $order_num > $x; $x++) {
                                            $order_data = $order->fetch_assoc();

                                            //     $order = Database::search("SELECT * FROM `order` WHERE  `orderStatus_id`='2' ");
                                            //     $order_num = $order->num_rows;

                                            //     for ($y = 0; $order_num > $y; $y++) {
                                            //         $order_data = $order->fetch_assoc();

                                            //         $gig_data = Database::search("SELECT * FROM `gig` WHERE `user_details_id`='".$ud["id"]."' ");
                                            //         $gig_num = $gig_data->num_rows;


                                            //         for ($x = 0; $gig_num > $x; $x++) {
                                            //             $gd = $gig_data->fetch_assoc();


                                            $byer = Database::search("SELECT * FROM `user` WHERE `id`='" . $order_data["user_id"] . "'");
                                            $byer_data = $byer->fetch_assoc();

                                            $d = new DateTime($order_data["delivered_time"]);
                                            $date = $d->format("Y-m-d");

                                            $nd = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $nd->setTimezone($tz);
                                            $today = $nd->format("Y-m-d");

                                            if ($date >= $today) {
                                    ?>

                                                <div class="col-12 mt-3 mb-2">
                                                    <div class="row text-center">

                                                        <div class="col-2 col-lg-2 bg-light pt-2 pb-2 ">
                                                            <span class=" fw-bold text-black-50"><?php echo $byer_data["email"] ?></span>
                                                        </div>

                                                        <div class="col-2 col-lg-3 bg-light pt-2 pb-2 d-none d-lg-block">
                                                            <span class=" fw-bold text-black-50"><?php echo $order_data["title"] ?></span>
                                                        </div>

                                                        <div class="col-2 bg-light pt-2 pb-2">
                                                            <a href="downloadzipfile.php?code=<?php echo $order_data["plashOrderFile"] ?>"> <button class="fw-bold text-black-50 btn border border-2 ">Download Zip file</button></a>
                                                        </div>

                                                        <div class="col-6 col-lg-3 bg-light pt-2 pb-2">
                                                            <span class=" fw-bold text-black-50"><?php echo $order_data["message"] ?></span>
                                                        </div>

                                                        <div class="col-1 bg-light pt-2 pb-2 d-none d-lg-block">
                                                            <span class="fw-bold text-black-50"><?php echo $order_data["delivered_time"] ?></span>
                                                        </div>

                                                        <div class="col-1 bg-light pt-2 pb-2">

                                                            <button class="fw-bold text-white btn bg-success" onclick="openFinalProjectUploardModel();">Upload</button>

                                                        </div>

                                                    </div>
                                                </div>
                                    <?php
                                            } else {
                                                if ($order_data["orderStatus_id"] == 2) {

                                                    Database::iud("UPDATE `order` SET `orderStatus_id`='3' WHERE `gigId`='" . $order_data["gigId"] . "' AND `user_id` = '" . $order_data["user_id"] . "'");
                                                }
                                            }
                                        }
                                    }
                                    // }
                                    ?>

                                    <div class="modal fade" id="UploadProject" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content align-items-center ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Upload Project File</h5>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <span class="text-danger" id="msgfoget"></span>
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <div class="col-12">
                                                            <input type="file" accept="zip/*" id="file1" class="col-12 btn" />
                                                            <p class="form-label col-8 offset-4">Upload only zip File</p>
                                                        </div>

                                                        <div class="col-12 mt-1">
                                                            <span id="msgchak" class="text-success"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" onclick="finishOrder(<?php echo $order_data['gigId'] ?>,<?php echo $order_data['user_id'] ?>);">Finish</button>
                                                </div>
                                            </div>
                                        </div>
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