<?php

require "connection.php";
session_start();
if (isset($_SESSION["admin"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Freelance | Manage Users</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo/logoh.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php
                require "AdminPageHader.php";

                ?>

                <div class="col-12 col-lg-10">
                    <div class="row">

                        <div class="col-12 mt-3 mb-3 text-dark">
                            <h2 class="fw-bold">Users</h2>
                        </div>

                        <div class="col-12">
                            <div class="row g-1 m-2">

                                <div class="col-12 mt-3 mb-2">
                                    <div class="row text-center">

                                        <div class="col-1 bg-light pt-2 pb-2 ">
                                            <span class=" fw-bold text-dark">ID</span>
                                        </div>

                                        <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                            <span class=" fw-bold text-dark">Profile</span>
                                        </div>

                                        <div class="col-4 col-lg-3 bg-light pt-2 pb-2 ">
                                            <span class=" fw-bold text-dark">Name/Email</span>
                                        </div>

                                        <div class="col-4 col-lg-2 bg-light pt-2 pb-2">
                                            <span class="fw-bold text-dark ">Join Date</span>
                                        </div>

                                        <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                            <span class="fw-bold text-dark ">Order</span>
                                        </div>

                                        <div class="col-3 col-lg-2 bg-light pt-2 pb-2">

                                        </div>

                                    </div>
                                </div>

                                <?php

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $m = Database::search("SELECT * FROM `user_details` ORDER BY `id` DESC");
                                $d = $m->num_rows;
                                $result_per_page = 6;
                                $number_of_pages = ceil($d / $result_per_page);
                                $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                $user_details = Database::search("SELECT * FROM `user_details` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                $user_detailsnum = $user_details->num_rows;

                                for ($x = 1; $user_detailsnum >= $x; $x++) {
                                    $user_details_data = $user_details->fetch_assoc();

                                    $profile_image = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`='" . $user_details_data["id"] . "'");
                                    $profile_image_data = $profile_image->fetch_assoc();

                                    $user = Database::search("SELECT * FROM `user` WHERE `id`='" . $user_details_data["user_id"] . "'");
                                    $user_data = $user->fetch_assoc();

                                    $order = Database::search("SELECT * FROM `order` INNER JOIN `gig` ON `gig`.`id`=`order`.`gigId` WHERE `gig`.`user_details_id`='" . $user_details_data["id"] . "'");
                                    $order_num = $order->num_rows;

                                ?>

                                    <div class="col-12 mt-3 mb-2">
                                        <div class="row text-center">

                                            <div class="col-1 bg-light pt-2 pb-2 ">
                                                <span class=" fw-bold text-black-50"><?php echo $user_details_data["id"]; ?></span>
                                            </div>

                                            <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <?php
                                                if ($profile_image->num_rows == 0) {
                                                ?>
                                                    <img src="resources/logo/user_icon.png" class="rounded-circle" width="45px" height="45px">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="<?php echo $profile_image_data["url"] ?>" class="rounded-circle" width="45px" height="45px">
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <div class="col-4 col-lg-3 bg-light pt-2 pb-2 ">
                                                <span class=" fw-bold text-black-50"><?php echo $user_details_data["name"] . "/" . $user_data["email"]; ?></span>
                                            </div>

                                            <div class="col-4 col-lg-2 bg-light pt-2 pb-2">
                                                <span class="fw-bold text-black-50"><?php echo $user_data["joined_date"]; ?></span>
                                            </div>

                                            <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <span class="fw-bold text-black-50"><?php echo $order_num; ?></span>
                                            </div>

                                            <div class="col-3 col-lg-2 bg-light pt-2 pb-2">

                                            </div>

                                        </div>
                                    </div>

                                <?php
                                }

                                ?>

                            </div>
                        </div>

                        <?php


                        if ($number_of_pages != 1) {

                        ?>

                            <div class="row">
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
                                                <a href="<?php echo "?page=" . ($pageno - 1) . ""; ?>" class="page-link">Previous</a>
                                            </li>
                                            <?php
                                        }

                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                            if ($page == $pageno) {
                                            ?>
                                                <li class="page-item active"><a class="page-link" href="<?php echo "?page=" . ($page) . ""; ?>"><?php echo $page; ?></a></li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item"><a class="page-link" href="<?php echo "?page=" . ($page) . ""; ?>"><?php echo $page; ?></a></li>

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
                                                <a class="page-link" href="<?php echo "?page=" . ($pageno + 1) . ""; ?>">Next</a>
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
                        ?>

                    </div>
                </div>

                <?php
                require "AdminFooter.php";
                ?>

            </div>
        </div>
    </body>

    </html>

<?php

} else {
?>

    <script>
        window.location = "AdminSignIn.php";
    </script>
<?php
}

?>