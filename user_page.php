<!DOCTYPE html>

<?php
require "connection.php";
session_start();
?>

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

            if (isset($_SESSION["u"])) {
                if (isset($_GET["id"])) {
                    $sellerId = $_GET["id"];
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
                                    <span class="mt-5 mb-5">.</span>

                                </div>
                            </div>

                            <?php

                            $user_details = Database::search("SELECT * FROM `user_details` WHERE `id`='" .  $sellerId . "' ");
                            $user_details_data = $user_details->fetch_assoc();

                            $profileImage = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`='" . $user_details_data["id"] . "'");
                            $profileImage_num = $profileImage->num_rows;

                            $user = Database::search("SELECT * FROM `user` WHERE `id`='" .  $user_details_data["user_id"] . "' ");
                            $userdata = $user->fetch_assoc();
                            ?>

                            <div class="col-12 shadow_div_box container-fluid mt-4">
                                <div class="row">

                                    <div class="col-lg-4 col-12 mt-3 mb-4">
                                        <div class="row text-center">

                                            <?php

                                            if ($profileImage_num == 1) {
                                                $profileImage_data = $profileImage->fetch_assoc();
                                            ?>

                                                <label for="profileimg">
                                                    <img src="<?php echo $profileImage_data["url"] ?>" class="rounded-circle single_Gig_Seller_Image ms-4" />
                                                </label>

                                            <?php
                                            } else {
                                            ?>

                                                <label for="profileimg">
                                                    <img src="resources/logo/user_icon.png" class="rounded-circle single_Gig_Seller_Image ms-4" />
                                                </label>

                                            <?php
                                            }

                                            ?>

                                            <div class="offset-1 col-10">
                                                <div class="row">
                                                    <div class="rating">
                                                        <span class="rating-num">4.0</span>
                                                        <div class="rating-stars">
                                                            <span class="bi bi-star text-warning"></span>
                                                            <span class="bi bi-star text-warning"></span>
                                                            <span class="bi bi-star text-warning"></span>
                                                            <span class="bi bi-star text-warning"></span>
                                                            <span class="bi bi-star text-black-50"></span>
                                                        </div>
                                                        <div class="rating-users">
                                                            <i class="icon-user"></i> 14 total
                                                        </div>
                                                    </div>

                                                    <div class="histo">
                                                        <div class="five histo-rate">
                                                            <span class="histo-star">
                                                                <i class="bi bi-star"></i> 5 </span>
                                                            <span class="bar-block">
                                                                <span id="bar-five" class="bar">
                                                                    <span>5</span>&nbsp;
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <div class="four histo-rate">
                                                            <span class="histo-star">
                                                                <i class="bi bi-star"></i> 4 </span>
                                                            <span class="bar-block">
                                                                <span id="bar-four" class="bar">
                                                                    <span>3</span>&nbsp;
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <div class="three histo-rate">
                                                            <span class="histo-star">
                                                                <i class="bi bi-star"></i> 3 </span>
                                                            <span class="bar-block">
                                                                <span id="bar-three" class="bar">
                                                                    <span>2</span>&nbsp;
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <div class="two histo-rate">
                                                            <span class="histo-star">
                                                                <i class="bi bi-star"></i> 2 </span>
                                                            <span class="bar-block">
                                                                <span id="bar-two" class="bar">
                                                                    <span>1</span>&nbsp;
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <div class="one histo-rate">
                                                            <span class="histo-star">
                                                                <i class="bi bi-star"></i> 1 </span>
                                                            <span class="bar-block">
                                                                <span id="bar-one" class="bar">
                                                                    <span>4</span>&nbsp;
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <div class="col-12">
                                                    <span class="col-12 form-control border-0 bg-white"><?php echo $user_details_data["about"]; ?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-lg-8 col-12 mt-3 mb-4">
                                        <div class="row">

                                            <div class="col-6">

                                                <span class="h4 text-dark mt-2"><?php echo $user_details_data["name"]; ?></span><br>
                                                <span class="h5 text-black-50"><?php echo $userdata["email"]; ?></span>

                                            </div>

                                            <div class="col-5 text-end">

                                                <span class="h4 text-black-50 mx-4">Member since</span>
                                                <p class="fw-bold "><?php echo $userdata["joined_date"]; ?></p>

                                            </div>

                                            <div class="col-12 mt-5">
                                                <div class="row">

                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#" onclick="change(1)" id="gigb">Gig</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#" onclick="change(2)" id="feedbackb">feedback</a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-4" id="gig">
                                                <div class="row">

                                                    <?php
                                                    if (!$user_details->num_rows == 0) {

                                                        if (isset($_GET["page"])) {
                                                            $pageno = $_GET["page"];
                                                        } else {
                                                            $pageno = 1;
                                                        }

                                                        $gig = Database::search("SELECT * FROM `gig` WHERE `user_details_id`='" . $user_details_data["id"] . "'");

                                                        $d = $gig->num_rows;
                                                        $result_per_page = 6;
                                                        $number_of_pages = ceil($d / $result_per_page);
                                                        $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                                        $gig_data = Database::search("SELECT * FROM `gig` WHERE `user_details_id`='" . $user_details_data["id"] . "' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . "");
                                                        $gig_num = $gig_data->num_rows;

                                                        for ($x = 0; $gig_num > $x; $x++) {
                                                            $gd = $gig_data->fetch_assoc();

                                                            $gig_img = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gd["gig_image_id"] . "'");
                                                            $gig_code = $gig_img->fetch_assoc();
                                                    ?>

                                                            <div class="col-6 col-xl-4 ">
                                                                <div class="row m-1">
                                                                    <div class="card">

                                                                        <img src="<?php echo $gig_code["url1"]; ?>" class="card-img-top" style="height: 200px; ">
                                                                        <div class="card-body">
                                                                            <a href="SingleGigView.php?id=<?php echo $gd["id"]; ?>" class="link-2">
                                                                                <h5 class="card-title h4 fw-bold text-capitalize"><?php echo $gd["title"]; ?></h5>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-12 mb-3">
                                                                            <div class="row">
                                                                                <span class="col-6 fw-bold text-success">$<?php echo $gd["price"]; ?></span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php
                                                        }
                                                        if ($number_of_pages != 1) {

                                                        ?>
                                                            <div class="m-3">
                                                                <nav aria-label="Page navigation example">
                                                                    <ul class="pagination justify-content-center">

                                                                        <?php if ($pageno <= 1) {
                                                                        ?>
                                                                            <li class="page-item disabled">
                                                                                <a class="page-link">Previous</a>
                                                                            </li>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <li class="page-item">
                                                                                <a href="<?php echo "?page=" . ($pageno - 1) . "&id=" . $sellerId; ?>" class="page-link">Previous</a>
                                                                            </li>
                                                                            <?php
                                                                        }

                                                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                                                            if ($page == $pageno) {
                                                                            ?>
                                                                                <li class="page-item active"><a class="page-link" href="<?php echo "?page=" . ($page) . "&id=" . $sellerId; ?>"><?php echo $page; ?></a></li>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <li class="page-item"><a class="page-link" href="<?php echo "?page=" . ($page) . "&id=" . $sellerId; ?>"><?php echo $page; ?></a></li>

                                                                            <?php
                                                                            }
                                                                        }

                                                                        if ($pageno >= $number_of_pages) {
                                                                            ?>
                                                                            <li class="page-item disabled">
                                                                                <a class="page-link" href="#">Next</a>
                                                                            </li>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="<?php echo "?page=" . ($pageno + 1) . "&id=" . $sellerId; ?>">Next</a>
                                                                            </li>
                                                                        <?php

                                                                        }
                                                                        ?>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="col-12 mt-3 d-none" id="feedback">
                                                <div class="row">

                                                    <?php

                                                    $gig = Database::search("SELECT * FROM `gig` WHERE `user_details_id`='" .  $user_details_data["id"] . "'");

                                                    for ($x = 0; $gig->num_rows > $x; $x++) {
                                                        $gig_data = $gig->fetch_assoc();

                                                        $feedback = Database::search("SELECT * FROM `feedback` WHERE `gigid`='" .  $gig_data["id"] . "'");

                                                        for ($y = 0; $feedback->num_rows > $y; $y++) {
                                                            $feedback_data = $feedback->fetch_assoc();

                                                            $client = Database::search("SELECT * FROM `user` WHERE `id`='" . $feedback_data["userid"] . "'");
                                                            $client_data = $client->fetch_assoc();

                                                            $client_Details = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $client_data["id"] . "'");
                                                            $client_Details_data = $client_Details->fetch_assoc();

                                                            $profileimage2 = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $client_Details_data["id"] . "'")

                                                    ?>

                                                            <div class="col-10 offset-1 mt-2">
                                                                <div class="row">

                                                                    <div class="pb-4 mt-3">
                                                                        <div>
                                                                            <?php

                                                                            if ($profileimage2->num_rows == 1) {
                                                                                $profileImage_data2 = $profileimage2->fetch_assoc();
                                                                            ?>

                                                                                <img src="<?php echo $profileImage_data2["url"] ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40" />

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <img src="resources/logo/user_icon.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                            <?php
                                                                            }

                                                                            ?>

                                                                            <a href="user_page.php?id=<?php echo $client_Details_data["id"]; ?>" class="link-2"> <span class="mx-3"><?php echo $client_Details_data["name"]; ?></span></a>
                                                                            <div class="text-muted small text-nowrap mt-2"><?php echo $feedback_data["date"]; ?></div>

                                                                            <hr class="hr_break_1">

                                                                            <div class="col-12 border border-1">
                                                                                <textarea value="123456" id="ay1" class="form-control border-0 bg-white" disabled style="height: 100px;"><?php echo $feedback_data["feedback"] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <hr class="hr_break_1">

                                                    <?php
                                                        }
                                                    }

                                                    ?>


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