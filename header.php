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

                        <div class="col-3 align-self-start">
                            <a class="h2 fw-bold logo_link" href="home.php"><?php echo $ti["name"]; ?></a>
                        </div>

                        <div class="col-9  align-self-end" style="text-align: center;">
                            <div class="row">

                                <div class="col-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" id="Search" aria-describedby="button-addon2">
                                        <span class="input-group-text" type="button" id="button-addon2" onclick="search();"><i class="bi bi-search"></i></span>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <ul class="nav ">
                                        <li class="nav-item">
                                            <a class="nav-link link-2 text-black" aria-current="page" href="Message.php">Message</a>
                                        </li>

                                        <li class="dropdown-center">
                                            <a class="btn dropdown-toggle link-2 nav-link text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Category
                                            </a>
                                            <ul class="dropdown-menu" style="width: 60%;">
                                                <li>
                                                    <div class="col-12">
                                                        <div class="row m-3">

                                                            <?php

                                                            $c = Database::search("SELECT * FROM `category`");
                                                            while ($srow = $c->fetch_assoc()) {

                                                            ?>
                                                                <div class="col-4">
                                                                    <span class="fs-4 fw-bold mt-3"><?php echo $srow["name"]; ?></span>

                                                                    <?php
                                                                    $b = Database::search("SELECT * FROM `brand` WHERE `category_id`='" . $srow["id"] . "'");

                                                                    while ($bd = $b->fetch_assoc()) {
                                                                    ?>

                                                                        <a class="dropdown-item" href="AllBrandGig.php?id=<?php echo $bd["id"] ?>"><?php echo $bd["name"]; ?></a>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-3">

                                    <ul class="nav ">
                                        <li class="nav-item">
                                            <a href="MyFavorite.php" class="btn nav-link link-2"><i class="bi bi-heart"></i></a>
                                        </li>

                                        <li class="btn position-relative link-2"> <i class="bi bi-envelope fs-5"></i>
                                            <span class="position-absolute translate-middle p-2 top-0 text-success">
                                                <h1>.</h1>
                                            </span>
                                        </li>
                                        <li class="nav-item ms-2">
                                            <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php
                                                if ($userdnum <= 0) {

                                                ?>
                                                    <img src="resources/logo/user_icon.png" class="rounded-circle" width="45px" height="45px">
                                                    <?php
                                                } else {

                                                    $ud = $userD->fetch_assoc();

                                                    $pi = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $ud["id"] . "'");
                                                    $pi_num = $pi->num_rows;

                                                    if ($pi_num == 0) {
                                                    ?>
                                                        <img src="resources/logo/user_icon.png" class="rounded-circle" width="45px" height="45px">



                                                    <?php
                                                    } else {
                                                        $piurl = $pi->fetch_assoc();
                                                    ?>
                                                        <img src="<?php echo $piurl["url"] ?>" class="rounded-circle" width="45px" height="45px">


                                                <?php
                                                    }
                                                }
                                                ?>

                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="userProfile.php"><i class="bi bi-person mb-3 mx-3 h4"></i>User Profile</a></li>
                                                <li><a class="dropdown-item" href="Gig.php"><i class="bi bi-pencil-square mb-3 mx-3 h4"></i>GIG</a></li>
                                                <li><a class="dropdown-item" href="RequestedOrder.php"><i class="bi bi-border-width mb-3 mx-3 h4"></i>Requested Order</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="signOut();"><i class="bi bi-box-arrow-left mb-3 mx-3 h4"></i>Sign out</a></li>
                                            </ul>
                                        </li>
                                    </ul>



                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 d-lg-none">

                    <div class="row">
                        <div class="col-12 mt-2 mb-2">

                            <a class="navbar-brand m-3" href="home.php"><?php echo $ti["name"]; ?></a>

                            <div class="bi bi-justify btn float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"> </div>

                        </div>
                    </div>

                    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                    </div>

                </div>
            </header>


        </div>
    </div>

</body>

</html>