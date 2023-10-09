<!DOCTYPE html>

<html>

<head>
    <title>Freelance | User Gig</title>

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
                        require "ProfileHeader.php";
                        ?>


                        <div class="col-12 shadow_div_box container-fluid mt-5">
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <span class="h3 text-dark fw-bold m-3">Gigs</span>

                                    </div>
                                </div>

                                <hr class="hr_break_1" />

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2">

                                        <?php
                                        $user = $_SESSION["u"];
                                        $email = $user["email"];

                                        $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                                        $user_details = $user_r->fetch_assoc();

                                        $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");

                                        ?>
                                        <div class="card m-3 align-items-center" style="width: 18rem;">
                                            <a href="AddNewGig.php" class="link-2">
                                                <img src="resources/logo/add gig icon.svg" class="card-img-top " style="width:200px ;">
                                            </a>
                                            <div class="card-body">
                                                <a href="AddNewGig.php" class="card-title h4 link-2">Create a New Gig</a>
                                            </div>
                                        </div>

                                        <?php
                                        if (!$user_data->num_rows == 0) {
                                            $ud = $user_data->fetch_assoc();

                                            $gig_data = Database::search("SELECT * FROM `gig` WHERE `user_details_id`='" . $ud["id"] . "'");
                                            $gig_num = $gig_data->num_rows;

                                            for ($x = 0; $gig_num > $x; $x++) {
                                                $gd = $gig_data->fetch_assoc();

                                                $gig_img = Database::search("SELECT * FROM `gig_image` WHERE `id`='" . $gd["gig_image_id"] . "'");
                                                $gig_code = $gig_img->fetch_assoc();
                                        ?>

                                                <div class="card m-3" style="width: 18rem;">
                                                    <img src="<?php echo $gig_code["url1"]; ?>" class="card-img-top" style="height: 200px; ">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-capitalize fw-bold"><a href="" class="link-2 h4"><?php echo $gd["title"]; ?></a></h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="row">
                                                            <a href="EditGig.php?id=<?php echo $gd["id"]; ?>" class="offset-1 col-8 fw-bold link-1"><i class="bi bi-pen-fill"></i> Edit</a>
                                                            <span class="col-3 fw-bold text-success">$<?php echo $gd["price"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php
                                            }

                                            ?>

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