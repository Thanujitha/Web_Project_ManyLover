<!DOCTYPE html>

<html>

<head>
    <title>Freelance</title>

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

            $gigId = $_GET["id"];

            if (isset($_SESSION["u"])) {

                $userId = $_SESSION["u"]["id"];

                $gig = Database::search("SELECT * FROM `gig` WHERE `id`='" . $gigId . "'");
                $gignum = $gig->num_rows;

                if ($gignum == 1) {

                    $gig_data = $gig->fetch_assoc();

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


                            <div class="col-12 col-lg-7 shadow_div_box container-fluid mt-4">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row text-center">
                                            <span class="h3 text-dark fw-bold m-3">Add Your Resources</span>

                                        </div>
                                    </div>
                                    <hr class="hr_break_1" />

                                    <div class="col-md-10 m-3">

                                        <label class="form-label fw-bold ">Youer Massage : </label>

                                        <textarea type="text" class="form-control border-1 bg-white ms-5 " style="height: 200px;" id="msa"></textarea>

                                    </div>

                                    <div class="col-8 ">
                                        <div class="row text-start mb-3">

                                            <label class="form-label col-3 offset-1 fw-bold">Resources File :</label>

                                            <input type="file" accept="zip/*" id="file1" class="col-5 btn" />
                                            <p class="form-label col-8 offset-4">Allowed only zip File</p>

                                        </div>
                                    </div>

                                    <div class="col-8 ">
                                        <div class="row text-start mb-3">

                                            <label class="form-label col-3 offset-1 fw-bold">Deliver Date :</label>
                                            <div class="col-6">
                                                <input type="date" class="form-control " id="todate">
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-11">
                                        <div class="row">

                                            <div class="col-1"> </div>

                                            <div class="col-12 text-end m-3">
                                                <button class=" btn btn-success fw-bold" onclick="PlashOrder(<?php echo $gigId; ?>);">Plash Order</button>

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
                        window.location = "home.php";
                    </script>
                <?php
                }
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