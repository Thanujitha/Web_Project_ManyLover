<!DOCTYPE html>

<html>

<head>
    <title>Freelance | My Favorite</title>

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

                        <div class="col-12 shadow_div_box container-fluid mt-4">
                            <div class="row">

                                <div class="col-12 m-3">
                                    <span class="h4 fw-bold">My Favorite <i class="bi bi-heart"></i></span>
                                </div>

                                <hr class="hr_break_1" />

                                <div class="col-12 align-content-center">
                                    <div class="row container-fluid text-center">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $uid = $_SESSION["u"]["email"];

                                        $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $uid . "'");
                                        $user_d = $user_r->fetch_assoc();

                                        $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_d["id"] . "'");
                                        $ud = $user_data->fetch_assoc();

                                        if ($user_data->num_rows == 0) {
                                            echo "user Profile Update First";
                                        } else {

                                            $m = Database::search("SELECT * FROM `myfavorite` WHERE `user_id`='" . $user_d["id"] . "'");
                                            $d = $m->num_rows;
                                            $result_per_page = 8;
                                            $number_of_pages = ceil($d / $result_per_page);
                                            $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                            $myfavorite = Database::search("SELECT * FROM `myfavorite` WHERE `user_id`='" . $user_d["id"] . "' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                            $myfavorite_num = $myfavorite->num_rows;

                                            if ($myfavorite_num >= 1) {

                                                for ($m = 0; $myfavorite_num > $m; $m++) {
                                                    $myfavorite_data = $myfavorite->fetch_assoc();

                                                    $gig_id = $myfavorite_data["gig_id"];

                                                    $gig = Database::search("SELECT * FROM `gig` WHERE `id`='" . $gig_id . "'");
                                                    $gig_num = $gig->num_rows;

                                                    for ($y = 0; $gig_num > $y; $y++) {
                                                        $gig_data = $gig->fetch_assoc();

                                                        $gig_img = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gig_data["gig_image_id"] . "'");
                                                        $gig_code = $gig_img->fetch_assoc();

                                        ?>

                                                        <div class="card mb-3 m-3" style="width: 18rem;">
                                                            <img src="<?php echo $gig_code["url1"]; ?>" class="card-img-top" style="height: 200px; ">

                                                            <div class="card-body">
                                                                <a href="SingleGigView.php?id=<?php echo $gig_data["id"]; ?>" class="link-2">
                                                                    <h5 class="card-title h4 fw-bold text-capitalize"><?php echo $gig_data["title"] ?></h5>
                                                                </a>
                                                                <span class="text-black-50">seller name</span><br>
                                                                <a href="#" class="link-2"> <span class="mx-3"><?php echo $ud["name"]; ?></span></a>

                                                            </div>

                                                            <div class="card-body">

                                                                <a href="#" class="link-2 float-start"><i class="bi bi-heart"></i></a>
                                                                <span class="float-end fw-bold text-success">$<?php echo $gig_data["price"]; ?></span>
                                                            </div>
                                                        </div>

                                                    <?php

                                                    }
                                                }

                                                if ($number_of_pages != 1) {

                                                    ?>
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
                                                                    <a href="<?php echo "?page=" . ($pageno - 1); ?>" class="page-link">Previous</a>
                                                                </li>
                                                                <?php
                                                            }

                                                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                                                if ($page == $pageno) {
                                                                ?>
                                                                    <li class="page-item active"><a class="page-link" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a></li>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <li class="page-item"><a class="page-link" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a></li>

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
                                                                    <a class="page-link" href="<?php echo "?page=" . ($pageno + 1); ?>">Next</a>
                                                                </li>
                                                            <?php

                                                            }
                                                            ?>
                                                            </li>
                                                        </ul>
                                                    </nav>

                                                <?php
                                                }
                                            } else {
                                                ?>

                                                <div class="col-12 m-5">
                                                    <div class="row">
                                                        <div class="col-12 emtyview "></div>
                                                        <div class="col-12 text-center">
                                                            <label class="form-label fs-1 mb-2 fw-bolder">You have no items in your Favorite</label>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <a href="home.php" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Go</a>
                                                        </div>
                                                    </div>
                                                </div>

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