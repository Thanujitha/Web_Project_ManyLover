<!DOCTYPE html>

<html>

<head>
    <title>Freelance | User Profile</title>

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


                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="alart">
                                <strong>Profile Updated </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>

                        <div class="col-7 offset-5 mt-4 mb-4">

                            <?php
                            $user_r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                            $user_details = $user_r->fetch_assoc();

                            $user_data = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $user_details["id"] . "'");
                            $user_num = $user_data->num_rows;

                            if ($user_num == 1) {

                                $ud = $user_data->fetch_assoc();

                                $profileImage = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`='" . $ud["id"] . "'");
                                $profileImage_num = $profileImage->num_rows;

                                if ($profileImage_num == 1) {
                                    $profileImage_data = $profileImage->fetch_assoc();
                            ?>
                                    <input class="d-none" type="file" accept="img/*" id="profileimg" />
                                    <label for="profileimg" onclick="changeImage();">
                                        <img src="<?php echo $profileImage_data["url"] ?>" class="rounded-circle profile-image1 position-absolute ms-4" id="viewimg" />
                                    </label>

                                <?php
                                } else {
                                ?>
                                    <input class="d-none" type="file" accept="img/*" id="profileimg" />
                                    <label for="profileimg" onclick="changeImage();">
                                        <img src="resources/logo/user_icon.png" class="rounded-circle profile-image1 position-absolute ms-4" id="viewimg" />
                                    </label>

                                <?php
                                }
                            } else {
                                ?>
                                <input class="d-none" type="file" accept="img/*" id="profileimg" />
                                <label for="profileimg" onclick="changeImage();">
                                    <img src="resources/logo/user_icon.png" class="rounded-circle profile-image1 position-absolute ms-4" id="viewimg" />
                                </label>
                            <?php
                            }

                            ?>



                        </div>

                        <div class="col-12 shadow_div_box container-fluid mt-5">
                            <div class="row">

                                <div class="col-12">
                                    <div class="profile-user-name">
                                        <span class="h3 text-dark fw-bold m-3">Profile</span>
                                        <div class="float-end">
                                            <a href="#" class="link-2" onclick="edit();" id="edit"><i class="bi bi-pen-fill"></i> Edit</a>
                                            <a href="#" class="btn btn-success m-3 d-none" id="save" onclick="updateProfile();"> Save</a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr_break_1" />

                                <?php

                                $email1 = $_SESSION["u"]["email"];

                                $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $email1 . "'");
                                $userNum = $user->num_rows;

                                if ($userNum == 1) {

                                    $userfech = $user->fetch_assoc();
                                    $userid = $userfech["id"];

                                    $userDetals = Database::search("SELECT * FROM `user_details` WHERE `user_id`='" . $userid . "'");
                                    $userDetailsnum = $userDetals->num_rows;

                                    if ($userDetailsnum == 1) {
                                        $details = $userDetals->fetch_assoc();
                                ?>
                                        <div class="col-12">
                                            <div class="row m-3">

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Full Name : </label>
                                                    <label class="form-label " id="fn1"><?php echo $details["name"] ?></label>

                                                    <input type="text" id="fn" class="form-control border-1 rounded-pill d-none" value="<?php echo $details["name"] ?>" />
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Contact number : </label>
                                                    <label class="form-label" id="cn1"><?php echo $details["contact"] ?></label>

                                                    <input type="text" id="cn" class="form-control border-1 rounded-pill d-none" value="<?php echo $details["contact"] ?>" />
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Email : </label>
                                                    <label class="form-label" id="em"><?php echo $userfech["email"] ?></label>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Password : </label>
                                                    <label class="form-label" id="ps1"><input type="password" value="<?php echo $userfech["password"] ?>" class="form-control border-0 rounded-pill bg-white" disabled /></label>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">About you : </label>
                                                    <textarea value="123456" id="ay1" class="form-control border-0 bg-white" disabled style="height: 200px;"><?php echo $details["about"] ?></textarea>


                                                    <textarea type="text" id="ay" class="form-control border-1 d-none bg-white" style="height: 200px;"><?php echo $details["about"] ?></textarea>
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Linked Accounts : </label><br>

                                                    <?php

                                                    $link = Database::search("SELECT * FROM `account_link` WHERE `user_details_id` ='" . $details["id"] . "'");
                                                    $linkd = $link->fetch_assoc();

                                                    ?>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-facebook"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="fb1"><i class="bi bi-link"></i> Add Facebook link</a>
                                                            <input type="text" id="fb" class="form-control border-1 rounded-pill d-none" value="<?php echo $linkd["facebook"] ?>" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-twitter text-info"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="twit1"><i class="bi bi-link"></i> Add Twitter link</a>
                                                            <input type="text" id="twit" class="form-control border-1 rounded-pill d-none" value="<?php echo $linkd["twitter"] ?>" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-linkedin"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="linkedin1"><i class="bi bi-link"></i> Add Linkedin link</a>
                                                            <input type="text" id="linkedin" class="form-control border-1 rounded-pill d-none" value="<?php echo $linkd["linkedin"] ?>" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-youtube text-danger"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark " id="ytube1"><i class="bi bi-link"></i> Add YouTude link</a>
                                                            <input type="text" id="ytube" class="form-control border-1 rounded-pill d-none" value="<?php echo $linkd["youtube"] ?>" />
                                                        </label> <br>
                                                    </div>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Education : </label>
                                                    <textarea value="123456" id="ed1" class="form-control border-0 bg-white" disabled style="height: 100px;"><?php echo $details["education"] ?></textarea>

                                                    <textarea type="text" id="ed" class="form-control border-1 d-none" style="height: 100px;"><?php echo $details["education"] ?></textarea>
                                                </div>

                                            </div>
                                        </div>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-12">
                                            <div class="row m-3">

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Full Name : </label>
                                                    <label class="form-label " id="fn1">None</label>

                                                    <input type="text" id="fn" class="form-control border-1 rounded-pill d-none" />
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Contact number : </label>
                                                    <label class="form-label" id="cn1">None</label>

                                                    <input type="text" id="cn" class="form-control border-1 rounded-pill d-none" />
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Email : </label>
                                                    <label class="form-label" id="em"><?php echo $userfech["email"] ?></label>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Password : </label>
                                                    <label class="form-label" id="ps1"><input type="password" value="<?php echo $userfech["password"] ?>" class="form-control border-0 rounded-pill bg-white" disabled /></label>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">About you : </label>
                                                    <textarea value="123456" id="ay1" class="form-control border-0 bg-white" disabled style="height: 200px;"></textarea>


                                                    <textarea type="text" id="ay" class="form-control border-1 d-none bg-white" style="height: 200px;"></textarea>
                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Linked Accounts : </label><br>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-facebook"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="fb1"><i class="bi bi-link"></i> Add Facebook link</a>
                                                            <input type="text" id="fb" class="form-control border-1 rounded-pill d-none" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-twitter text-info"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="twit1"><i class="bi bi-link"></i> Add Twitter link</a>
                                                            <input type="text" id="twit" class="form-control border-1 rounded-pill d-none" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-linkedin"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark" id="linkedin1"><i class="bi bi-link"></i> Add Linkedin link</a>
                                                            <input type="text" id="linkedin" class="form-control border-1 rounded-pill d-none" />
                                                        </label> <br>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label> <a href="#" class="form-label m-3 h3"><i class="bi bi-youtube text-danger"></i></a></label>
                                                        <label>
                                                            <a href="#" class="link-1 text-dark " id="ytube1"><i class="bi bi-link"></i> Add YouTude link</a>
                                                            <input type="text" id="ytube" class="form-control border-1 rounded-pill d-none" />
                                                        </label> <br>
                                                    </div>

                                                </div>

                                                <div class="col-md-5 m-3">
                                                    <label class="form-label">Education : </label>
                                                    <textarea value="123456" id="ed1" class="form-control border-0 bg-white" disabled style="height: 100px;"></textarea>

                                                    <textarea type="text" id="ed" class="form-control border-1 d-none" style="height: 100px;"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                <?php

                                    }
                                }

                                ?>



                            </div>
                        </div>


                        <div class="col-12 shadow_div_box container-fluid mt-4">
                            <div class="row">

                                <div class="col-12">
                                    <div>
                                        <span class="h3 text-dark fw-bold m-3">Payment</span>
                                        <a href="#" class="link-2 float-end" onclick="edit1();"><i class="bi bi-pen-fill"></i> Edit</a>
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