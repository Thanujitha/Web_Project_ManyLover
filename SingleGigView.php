<!DOCTYPE html>

<html>

<head>
    <title>Freelance | GIG</title>

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

                    <div class="col-12 justify-content-center" id="main">
                        <div class="row m-3">

                            <div class="col-12">
                                <div class="row">
                                    <span class="m-3">.</span>
                                </div>
                            </div>

                            <div class="col-12 g-3">
                                <div class="row">

                                    <div class="col-12 col-lg-7 shadow_div_box container-fluid mt-4">
                                        <div class="row">

                                            <div class="col-12 m-3">
                                                <div class="col-12">
                                                    <h2 class="col-12"><?php echo $gig_data["title"]; ?></h2>
                                                </div>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <?php

                                            $image = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gig_data["gig_image_id"] . "'");
                                            $image_data = $image->fetch_assoc();

                                            ?>

                                            <div class="col-12 text-center">
                                                <div class="row">

                                                    <div class="col-10 offset-1">
                                                        <div style="background-image: url('<?php echo $image_data["url1"]; ?>'); height: 330px; background-repeat: no-repeat; background-size: contain;" id="mainimage" class="mt-1 mb-1 col-10 offset-1"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-10 offset-1 text-center mt-3">
                                                <div class="row">

                                                    <?php $url1 = $image_data["url1"]; ?>

                                                    <div class="col-3 m-3 d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <a href="#" onclick="loadminimg('url1');">
                                                            <img src="<?php echo $image_data["url1"]; ?>" height="100px" class="mt-1 mb-2" id="url1" />
                                                        </a>
                                                    </div>

                                                    <div class="col-3 m-3 d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <a href="#" onclick="loadminimg('url2');">
                                                            <img src="<?php echo $image_data["url2"]; ?>" height="100px" class="mt-1 mb-2" id="url2" />
                                                        </a>
                                                    </div>
                                                    <div class="col-3 m-3 d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <a href="#" onclick="loadminimg('url3');">
                                                            <img src="<?php echo $image_data["url3"]; ?>" height="100px" class="mt-1 mb-2" id="url3" />
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="col-12">
                                                <h3 class="mt-1 text-black-50 fw-bold">About This Gig</h3>
                                            </div>

                                            <div class="col-12 my-1">
                                                <div class="col-12">
                                                    <textarea class="col-12 form-control border-0 bg-white" disabled style="height: 350px;"><?php echo $gig_data["description"]; ?></textarea>
                                                </div>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <?php
                                            $category = Database::search("SELECT * FROM `brand` INNER JOIN `category` ON `brand`.`category_id`=`category`.`id` WHERE `brand`.`id`='" . $gig_data["brand_id"] . "'");
                                            $category_data = $category->fetch_assoc();
                                            ?>

                                            <div class="col-6 mt-1 mx-3">
                                                <div class="col-12">
                                                    <span class="h4 text-black-50">Category</span>
                                                    <p class="fw-bold mx-3"><?php echo $category_data["name"]; ?></p>
                                                </div>
                                            </div>

                                            <div class="col-10 offset-1 my-2">

                                                
                                                    <a href="uploadResorses.php?id=<?php echo $gig_data["id"]; ?>" class="link-2">
                                                        <button class="btn btn-success col-12">Pachers Order $<?php echo $gig_data["price"]; ?></button>
                                                    </a>
                                              




                                            </div>
                                            <div class="col-1 mt-2">
                                                <a href="#" class="link-2" onclick="addMyFavorite(<?php echo $gig_data['id']; ?>);"><i class="bi bi-heart h3"></i></a>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 shadow_div_box mt-4">
                                        <div class="row text-center">

                                            <div class="col-12">
                                                <h3 class="mt-3">About The Seller</h3>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <?php

                                            $user_details = Database::search("SELECT * FROM `user_details` WHERE `id`='" .  $gig_data["user_details_id"] . "' ");
                                            $user_details_data = $user_details->fetch_assoc();

                                            $profileImage = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`='" . $user_details_data["id"] . "'");
                                            $profileImage_num = $profileImage->num_rows;

                                            if ($profileImage_num == 1) {
                                                $profileImage_data = $profileImage->fetch_assoc();
                                            ?>
                                                <div class="col-4">

                                                    <label for="profileimg">
                                                        <img src="<?php echo $profileImage_data["url"] ?>" class="rounded-circle single_Gig_Seller_Image ms-4" />
                                                    </label>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-4">
                                                    <label for="profileimg">
                                                        <img src="resources/logo/user_icon.png" class="rounded-circle single_Gig_Seller_Image ms-4" />
                                                    </label>
                                                </div>

                                            <?php
                                            }

                                            ?>

                                            <div class="col-8 text-start mt-4">
                                                <div class="col-12">
                                                    <h4>
                                                        <a href="user_page.php?id=<?php echo $user_details_data["id"]; ?>" class="link-2 h4"> <span class="mx-3"><?php echo $user_details_data["name"]; ?></span></a>
                                                    </h4>

                                                    <?php

                                                    $o = Database::search("SELECT * FROM `order` WHERE `gigId` = '" . $gigId . "'");
                                                    $onum = $o->num_rows;
                                                    ?>
                                                    <p class="mx-4"><?php echo $onum ?> Order</p>
                                                </div>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="col-6 mt-1">
                                                <div class="col-12">
                                                    <span class="h4 text-black-50">From</span>
                                                    <p class="fw-bold">Kegalla</p>
                                                </div>
                                            </div>

                                            <?php

                                            $user = Database::search("SELECT * FROM `user` WHERE `id`='" .  $user_details_data["user_id"] . "' ");
                                            $user_data = $user->fetch_assoc();

                                            ?>

                                            <div class="col-6 mt-1">
                                                <div class="col-12">
                                                    <span class="h4 text-black-50">Member since</span>
                                                    <p class="fw-bold"><?php echo $user_data["joined_date"]; ?></p>
                                                </div>
                                            </div>

                                            <hr class="hr_break_1" />

                                            <div class="col-12 mt-1">
                                                <div class="col-12">
                                                    <span class="col-12 form-control border-0 bg-white"><?php echo $user_details_data["about"]; ?></span>
                                                </div>
                                            </div>

                                            <?php
                                            $me = $_SESSION["u"]["id"];
                                            ?>

                                            <div class="col-12 mt-3">
                                                <div class="col-12">
                                                    <span class="h5 text-black-50">Message Seller</span>
                                                    <textarea type="text" id="m" class="form-control border-1" style="height: 100px;" placeholder="Type a Message....."></textarea>
                                                    <button class="btn btn-outline-success m-3 float-end" onclick="sendmessage(<?php echo $user_data['id'] ?>,<?php echo $me ?>);">Send <i class="bi bi-send"></i></button>
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