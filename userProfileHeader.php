<!DOCTYPE html>



<html>

<head>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="bg-white">

    <div class="col-12">
        <div class="row">

            <header class="fixed-top bg-white">
                <?php
                $t = Database::search("SELECT * FROM `page_name`");
                $ti = $t->fetch_assoc();

                if (isset($_SESSION["u"])) {
                    $email = $_SESSION["u"]["email"];

                    $userD = Database::search("SELECT * FROM `user_details` WHERE `user_id` IN (SELECT `id` FROM `user` WHERE `email`='" . $email . "')");
                    $userdnum = $userD->num_rows;

                    if ($userdnum <= 0) {

                ?>
                        <div class="text-center mt-3">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Update Request! </strong> Your account has not been updated. Go to <a href="userProfile.php" class="link-1 text-dark fw-bold">create account </a> to update it.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                <?php

                    }
                }


                ?>
                <div class="col-12 d-none d-lg-block">
                    <div class="row m-2 mt-3 mb-3">

                        <div class="col-4 align-self-start">
                            <a class="h2 fw-bold logo_link" href="userProfile.php"><?php echo $ti["name"]; ?></a>
                        </div>

                        <div class="col-4">
                            <ul class="nav ">
                                <li class="nav-item">
                                    <a class="nav-link link-2 active text-black" aria-current="page" href="userProfile.php">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-2 active text-black" aria-current="page" href="Message.php">Massages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-2 active text-black" aria-current="page" href="Order.php">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-2 active text-black" aria-current="page" href="Earning.php">Earning</a>
                                </li>

                            </ul>
                        </div>

                        <div class="col-3 text-end">

                            <li class="nav-item ms-2">
                                <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                                    <?php
                                    $ud = $userD->fetch_assoc();

                                    $pi = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $ud["id"] . "'");
                                    $pi_num = $pi->num_rows;

                                    if ($pi_num == 0) {
                                    ?>
                                        <img src="resources/logo/user_icon.png"  class="rounded-circle" width="45px" height="45px" >



                                    <?php
                                    } else {
                                        $piurl = $pi->fetch_assoc();
                                    ?>
                                        <img src="<?php echo $piurl["url"] ?>" class="rounded-circle" width="45px" height="45px" >


                                    <?php
                                    }

                                    ?>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="home.php"><i class="bi bi-house-door-fill mb-3 mx-3 h4"></i>Home</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="signOut();"><i class="bi bi-box-arrow-left mb-3 mx-3 h4"></i>Sign out</a></li>
                                </ul>
                            </li>

                        </div>

                    </div>
                </div>

        </div>
        </header>


    </div>
    </div>

</body>

</html>