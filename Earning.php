<!DOCTYPE html>

<html>

<head>
    <title>Freelance | User Profile</title>

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

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d");
            $monthd = $d->format("Y-m");


            if (isset($_SESSION["u"])) {
                $user_id = $_SESSION["u"]["id"];
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
                        $today = date("Y-m-d");
                        $thismonth = date("m");
                        $thisyear = date("Y");
                        $a = "0";
                        $b = "0";
                        $c = "0";

                        $invoicers = Database::search("SELECT * FROM `invoice` WHERE `bayerId`='" . $user_id . "'");
                        $in = $invoicers->num_rows;
                        for ($x = 0; $x < $in; $x++) {
                            $ir = $invoicers->fetch_assoc();
                            $d = $ir["date"];
                            $splitdate = explode(" ", $d);
                            $pdate = $splitdate[0];

                            if ($pdate == $today) {
                                $a = $a + $ir["Price"];
                            }

                            $splitmonth = explode("-", $pdate);
                            $pyear = $splitmonth[0];
                            $pmonth = $splitmonth[1];
                            if ($pyear == $thisyear) {
                                $c = $c + $ir["Price"];
                                if ($pmonth == $thismonth) {
                                    $b = $b + $ir["Price"];
                                }
                            }
                        }
                        ?>

                        <div class="col-12 shadow_div_box container-fluid mt-5">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <span class="h3 text-dark fw-bold m-3">Earning</span>

                                    </div>
                                </div>

                                <hr class="hr_break_1" />

                                <div class="col-12">
                                    <div class="row m-3">

                                        <div class="col-12 col-lg-4 border border-1 border-secondary m-1">

                                            <div class="row m-3">
                                                <h3 class="form-label mt-4">Total Earning</h3>
                                            </div>

                                            <div class="row m-5">
                                                <h2 class="form-label fw-bold ">$<?php echo $b; ?></h2>
                                            </div>

                                        </div>


                                        <div class="col-12 col-lg-4 border border-1 border-secondary m-1">

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Earnings to date</h4>
                                            </div>

                                            <div class="row m-2">
                                                <h3 class="form-label fw-bold mx-4">$<?php echo $a; ?></h3>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Par Year Earning</h4>
                                            </div>

                                            <div class="row m-2">
                                                <h3 class="form-label fw-bold mx-4">$<?php echo $c; ?></h3>
                                            </div>

                                        </div>

                                        <div class="col-12 col-lg-3 border border-1 border-secondary m-1 mx-lg-5">

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Date range</h4>
                                            </div>

                                            <div class="row m-1">
                                                <div class="col-6">
                                                    <label class="form-label text-dark">From Date</label>
                                                    <input type="date" class="form-control" id="todate" onchange="serchearning(<?php echo $user_id; ?>)">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label text-dark ">To Date</label>
                                                    <input type="date" class="form-control" id="fromdate" onchange="serchearning(<?php echo $user_id; ?>)">
                                                </div>

                                            </div>

                                            <hr class="hr_break_1" />

                                            <div id="v">
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="col-12">
                                    <div class="row m-3">

                                        <?php

                                        $order = Database::search("SELECT * FROM `order` WHERE `user_id`='" . $user_id . "'");

                                        $dayorder = "0";
                                        $monthorder = "0";

                                        $order_num = $order->num_rows;
                                        for ($y = 0; $order_num > $y; $y++) {
                                            $earnorder_data = $order->fetch_assoc();

                                            $d1 = new DateTime($earnorder_data["date_Time"]);
                                            $paydate = $d1->format("Y-m-d");

                                            if ($date == $paydate) {
                                                $dayorder = $dayorder + $earnorder_data["id"];
                                            }
                                            $m1 = new DateTime($earnorder_data["date_Time"]);
                                            $paymonth = $m1->format("Y-m");

                                            if ($monthd == $paymonth) {
                                            }
                                        }

                                        ?>
                                        //
                                        <?php
                                        $today = date("Y-m-d");
                                        $thismonth = date("m");
                                        $thisyear = date("Y");
                                        $t = "0";
                                        $y = "0";
                                        $da = "0";

                                        $invoicers = Database::search("SELECT * FROM `order` WHERE `user_id`='" . $user_id . "'");
                                        $in = $invoicers->num_rows;
                                        for ($x = 0; $x < $in; $x++) {
                                            $ir = $invoicers->fetch_assoc();
                                            $d = $ir["date_Time"];
                                            $splitdate = explode(" ", $d);
                                            $pdate = $splitdate[0];

                                            if ($pdate == $today) {
                                                $t = ["COUNT(id)"];
                                            }

                                            $splitmonth = explode("-", $pdate);
                                            $pyear = $splitmonth[0];
                                            $pmonth = $splitmonth[1];
                                            if ($pyear == $thisyear) {
                                                $y = ["COUNT(id)"];
                                                if ($pmonth == $thismonth) {
                                                    $da = ["COUNT(id)"];
                                                }
                                            }
                                        }
                                        ?>
//
                                        <div class="col-12 col-lg-4 border border-1 border-secondary m-1">

                                            <div class="row m-3">
                                                <h3 class="form-label mt-4">Total Order</h3>
                                            </div>

                                            <div class="row m-5">
                                                <h2 class="form-label fw-bold "><?php echo $t; ?></h2>
                                            </div>

                                        </div>


                                        <div class="col-12 col-lg-4 border border-1 border-secondary m-1">

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Order to date</h4>
                                            </div>

                                            <div class="row m-2">
                                                <h3 class="form-label fw-bold mx-4"><?php echo $da; ?></h3>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Par Month Order</h4>
                                            </div>

                                            <div class="row m-2">
                                                <h3 class="form-label fw-bold mx-4"><?php echo $y; ?></h3>
                                            </div>

                                        </div>

                                        <div class="col-12 col-lg-3 border border-1 border-secondary m-1 mx-lg-5">

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Order range</h4>
                                            </div>

                                            <div class="row m-1">
                                                <div class="col-6">
                                                    <label class="form-label text-dark">From Date</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label text-dark ">To Date</label>
                                                    <input type="date" class="form-control" id="todate">
                                                </div>

                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="row m-3">
                                                <h4 class="form-label text-black-50">Order</h4>
                                            </div>

                                            <div class="row m-2">
                                                <h3 class="form-label fw-bold mx-4">0</h3>
                                            </div>

                                        </div>

                                    </div>
                                </div> -->

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