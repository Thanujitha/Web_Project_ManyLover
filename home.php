<!DOCTYPE html>

<html>

<head>
    <title>Freelance | Home</title>

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

                <div class="col-12 justify-content-center" id="main">
                    <div class="row m-3">

                        <div class="col-12">
                            <div class="row">
                                <span class="m-3">.</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row m-4">

                                <div class="col-12 d-none d-lg-block justify-content-center">
                                    <div>

                                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="resources/logo/carousel/1.jpg" class="d-block w-100 poster-img-1 " alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resources/logo/carousel/2.jpg" class="d-block w-100 poster-img-1 " alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="resources/logo/carousel/4.jpg" class="d-block w-100 poster-img-1 " alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php

                        $category = Database::search("SELECT * FROM `category`");
                        $category_num = $category->num_rows;
                        for ($x = 0; $category_num > $x; $x++) {
                            $category_data = $category->fetch_assoc();

                        ?>

                            <div class="col-12 shadow_div_box container-fluid mt-4">
                                <div class="row">

                                    <div class="col-12 m-3">
                                        <span class="h4 fw-bold"><?php echo $category_data["name"] ?></span>
                                        <a href="AllCatagoryGigs.php?id=<?php echo $category_data["id"] ?>" class="h3"><i class="bi bi-arrow-right fw-bold text-dark m-2"></i></a>
                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-12">
                                        <div class="row container-fluid">

                                            <div id="wrapper">
                                                <div id="carousel">
                                                    <div id="content">

                                                        <?php
                                                        $user = $_SESSION["u"];
                                                        $email = $user["email"];

                                                        $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                                        $user_details = $user_r->fetch_assoc();

                                                        $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");
                                                        $ud = $user_data->fetch_assoc();

                                                        $gig;

                                                        if ($user_data->num_rows == 0) {
                                                            $gig = Database::search("SELECT * FROM `gig` ");
                                                            $gig_num = $gig->num_rows;
                                                        } else {
                                                            $gig = Database::search("SELECT * FROM `gig` WHERE `user_details_id` !='" . $ud["id"] . "'");
                                                            $gig_num = $gig->num_rows;
                                                        }


                                                        for ($y = 0; $gig_num > $y; $y++) {
                                                            $gig_data = $gig->fetch_assoc();

                                                            $brand = Database::search("SELECT * FROM `brand` WHERE `id`='" . $gig_data["brand_id"] . "' AND `category_id`='" . $category_data["id"] . "'");
                                                            if ($brand->num_rows == 1) {

                                                                $sella = Database::search("SELECT * FROM `user_details` WHERE `id`='" . $gig_data["user_details_id"] . "'");
                                                                $sella_data = $sella->fetch_assoc();


                                                                $gig_img = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gig_data["gig_image_id"] . "'");
                                                                $gig_code = $gig_img->fetch_assoc();

                                                                $user = $_SESSION["u"];
                                                                $userid = $user["id"];

                                                                $order = Database::search("SELECT * FROM `order` WHERE `gigId`='" . $gig_data['id'] . "' AND `user_id`= '" . $userid . "' AND `orderStatus_id`='2'");

                                                                if ($order->num_rows == 0) {
                                                        ?>
                                                                    <div class="card mb-3" style="width: 18rem;">
                                                                        <img src="<?php echo $gig_code["url1"]; ?>" class="card-img-top" style="height: 200px; ">

                                                                        <div class="card-body">
                                                                            <a href="SingleGigView.php?id=<?php echo $gig_data["id"]; ?>" class="link-2">
                                                                                <h5 class="card-title h4 fw-bold text-capitalize"><?php echo $gig_data["title"] ?></h5>
                                                                            </a>
                                                                            <span class="text-black-50">seller name</span><br>
                                                                            <a href="user_page.php?id=<?php echo $sella_data["id"]; ?>" class="link-2"> <span class="mx-3"><?php echo $sella_data["name"]; ?></span></a>

                                                                        </div>

                                                                        <div class="card-body">

                                                                            <a href="#" class="link-2" onclick="addMyFavorite(<?php echo $gig_data['id']; ?>);"><i class="bi bi-heart"></i></a>
                                                                            <span class="float-end fw-bold text-success">$<?php echo $gig_data["price"]; ?></span>
                                                                        </div>
                                                                    </div>


                                                        <?php
                                                                }
                                                            }
                                                        }

                                                        ?>


                                                    </div>
                                                </div>

                                                <button id="prev">

                                                    <span><i class="bi bi-arrow-left-circle h2"></i></span>

                                                </button>
                                                <button id="next">

                                                    <span><i class="bi bi-arrow-right-circle h2"></i></span>

                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php

                        }

                        ?>

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