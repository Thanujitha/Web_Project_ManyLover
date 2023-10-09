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

                        <div class="col-12 shadow_div_box container-fluid mt-4">
                            <div class="row m-2">

                                <?php
                                $text = $_GET["s"];

                                $user = $_SESSION["u"];
                                $email = $user["email"];

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                $user_details = $user_r->fetch_assoc();

                                $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");
                                $ud = $user_data->fetch_assoc();

                                $gig;

                                if ($user_data->num_rows == 0) {
                                    $gig = Database::search("SELECT * FROM `gig` WHERE `title` LIKE '%" . $text . "%'");
                                } else {
                                    $gig = Database::search("SELECT * FROM `gig` WHERE `user_details_id` !='" . $ud["id"] . "' AND  `title` LIKE '%" . $text . "%'");
                                }

                                $d = $gig->num_rows;
                                $result_per_page = 8;
                                $number_of_pages = ceil($d / $result_per_page);
                                $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                $gig1;

                                if ($user_data->num_rows == 0) {
                                    $gig1 = Database::search("SELECT * FROM `gig` WHERE `title` LIKE '%" . $text . "%' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                    $gig_num = $gig1->num_rows;
                                } else {
                                    $gig1 = Database::search("SELECT * FROM `gig` WHERE `user_details_id` !='" . $ud["id"] . "' AND  `title` LIKE '%" . $text . "%' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                    $gig_num = $gig1->num_rows;
                                }

                                if ($gig_num >= 1) {
                                ?>
                                    <div class="col-12 m-3">
                                        <span class="h4 fw-bold">Results for "<?php echo $text ?>"</span>
                                    </div>
                                    <?php

                                    for ($y = 0; $gig_num > $y; $y++) {
                                        $gig_data = $gig1->fetch_assoc();

                                        $sella = Database::search("SELECT * FROM `user_details` WHERE `id`='" . $gig_data["user_details_id"] . "'");
                                        $sella_data = $sella->fetch_assoc();


                                        $gig_img = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gig_data["gig_image_id"] . "'");
                                        $gig_code = $gig_img->fetch_assoc();

                                    ?>

                                        <div class="card mt-3 col-12 col-lg-6">
                                            <div class="row">

                                                <div class="col-md-4 mt-4 g-3">

                                                    <img src="<?php echo $gig_code["url1"]; ?>" class="img-fluid rounded-start" />
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <a href="SingleGigView.php?id=<?php echo $gig_data["id"]; ?>" class="link-2">
                                                            <h5 class="card-title h4 fw-bold text-capitalize"><?php echo $gig_data["title"] ?></h5>
                                                        </a>

                                                        <span class="text-black-50">seller name</span><br>
                                                        <a href="user_page.php?id=<?php echo $sella_data["id"]; ?>" class="link-2"> <span class="mx-3"><?php echo $sella_data["name"]; ?></span></a>

                                                        <div class="row">
                                                            <div class="card-body">

                                                                <a href="#" class="link-2 float-start" onclick="addMyFavorite(<?php echo $gig_data['id']; ?>);"><i class="bi bi-heart "></i></a>
                                                                <span class="float-end fw-bold text-success">$<?php echo $gig_data["price"]; ?></span>

                                                            </div>
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
                                                            <a href="<?php echo "?page=" . ($pageno - 1) . "&s=" . $text; ?>" class="page-link">Previous</a>
                                                        </li>
                                                        <?php
                                                    }

                                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                                        if ($page == $pageno) {
                                                        ?>
                                                            <li class="page-item active"><a class="page-link" href="<?php echo "?page=" . ($page) . "&s=" . $text; ?>"><?php echo $page; ?></a></li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="page-item"><a class="page-link" href="<?php echo "?page=" . ($page) . "&s=" . $text; ?>"><?php echo $page; ?></a></li>

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
                                                            <a class="page-link" href="<?php echo "?page=" . ($pageno + 1) . "&s=" . $text; ?>">Next</a>
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
                                } else {
                                    ?>

                                    <div class="col-12 m-5">
                                        <div class="row">
                                            <div class="col-12 text-center" style="font-size: 200px;"><i class="bi bi-search"></i></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 mb-2 fw-bolder">No Services Found For Your Search "<?php echo $text ?>"</label>
                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="home.php" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Go Home</a>
                                            </div>

                                        </div>
                                    </div>

                                <?php
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