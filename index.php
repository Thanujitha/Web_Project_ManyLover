<!DOCTYPE html>

<html>

<head>

    <title>Freelance.com</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo/logoh.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body class="body1 bg-dark">

    <?php
    require "connection.php";
    session_start();
    if (!isset($_SESSION["u"])) {
    ?>


        <div class="container-fluid">
            <div class="row">

                <div class="col-12 ">
                    <div class="row align-content-center d-flex justify-content-center">

                        <div class="col-12 ">
                            <div class="row">


                                <nav class="navbar navbar-light navbar-expand-md ">
                                    <div class="container-fluid">
                                        <?php

                                        $t = Database::search("SELECT * FROM `page_name`");
                                        $ti = $t->fetch_assoc();

                                        ?>
                                        <a class="navbar-brand text-white h4" href="index.php"><?php echo $ti["name"]; ?></a>

                                        <div class="text-end mt-3">
                                            <span class="navbar-text">
                                                <a class="text-white fw-bold login" href="#" onclick="loginChange(1);">Log In</a>
                                            </span>
                                            <a class="btn btn-success action-button fw-bold" role="button" href="#" onclick="loginChange(2);">Signup</a>
                                        </div>

                                    </div>
                                </nav>

                            </div>
                        </div>


                        <div class="col-lg-11 col-12 text1 ">
                            <div class="row">


                                <div class="col-lg-6 col-12 text-lg-start text-center">
                                    <div class="row">

                                        <div id="title">
                                            <div class="col-12 ">
                                                <h1 class="text_size text-white">Hire the best</br>
                                                    freelancers for any job,</br>
                                                    online.</h1>
                                            </div>

                                            <div class="col-12 col-lg-8">
                                                <button class="col-6 col-lg-3 btn btn-success join_button fw-bold" onclick="loginChange(2);">Join</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="offset-1 col-10 col-lg-3 ">
                                    <div class="row">

                                        <div class="login_div">
                                            <div class="row">

                                                <div class="d-none" id="joinDiv">

                                                    <div class="col-12 text-center">
                                                        <p class="title02 mt-3 fw-bold">Join Freelance.com</p>
                                                        <span class="text-danger" id="msg"></span>
                                                    </div>

                                                    <hr class="hr_break_1" />

                                                    <div class="col-12 mt-3">
                                                        <input class="form-control" type="email" id="email" placeholder="Email ex:-example@abc.com" />
                                                        <div class="col-12">
                                                            <span class="text-danger" id="msgemail"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">

                                                        <div class="input-group ">
                                                            <input type="password" class="form-control" placeholder="Password" id="pwtxt" aria-describedby="button-addon2">
                                                            <span class="input-group-text" type="button" id="button-addon2" onclick="changpaswordIcon();"><i class="bi bi-eye-slash-fill"></i></i></span>
                                                            <div class="col-12">
                                                                <span class="text-danger" id="msgpassword"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="input-group ">
                                                            <input type="password" class="form-control" placeholder="Re-Password" id="pwtxt1" aria-describedby="button-addon1">
                                                            <span class="input-group-text" type="button" id="button-addon1" onclick="changpaswordIcon1();"><i class="bi bi-eye-slash-fill"></i></i></span>
                                                            <div class="col-12">
                                                                <span class="text-danger " id="msgrePassword"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3 mb-3 d-grid">
                                                        <button class="btn btn-success" onclick="signUp();">Continue</button>
                                                    </div>

                                                    <hr class="hr_break_1" />

                                                    <div class="col-12 mb-3 text-center">
                                                        <span class="form-label">Already a member?<a href="#" class="link-1" onclick="loginChange(1);"> Sign In</a></span>
                                                    </div>

                                                </div>

                                                <div class="d-none" id="loginDiv">

                                                    <div class="col-12 text-center">
                                                        <p class="title02 mt-3 fw-bold">Welcome Back</p>
                                                        <span class="text-danger" id="msg1"></span>
                                                    </div>

                                                    <hr class="hr_break_1" />

                                                    <?php

                                                    $email = "";
                                                    $password = "";

                                                    if (isset($_COOKIE["cookieId"])) {
                                                        $cookieId = $_COOKIE["cookieId"];

                                                        $r = Database::search("SELECT * FROM `user` WHERE `cookie_id` ='" . $cookieId . "'");
                                                        $rs = $r->num_rows;

                                                        if ($rs == 1) {

                                                            $fc = $r->fetch_assoc();

                                                            $email = $fc["email"];
                                                            $password = $fc["password"];
                                                        }
                                                    }


                                                    ?>

                                                    <div class="col-12 mt-3">
                                                        <input class="form-control" type="email" id="emaill" placeholder="Email/Username" value="<?php echo $email ?>" />
                                                        <div class="col-12">
                                                            <span class="text-danger" id="msgemaill"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="input-group ">
                                                            <input type="password" class="form-control" placeholder="Password" id="pwtxt2" aria-describedby="button-addon1" value="<?php echo $password ?>">
                                                            <span class="input-group-text" type="button" id="button-addon3" onclick="changpaswordIcon2();"><i class="bi bi-eye-slash-fill"></i></i></span>
                                                            <div class="col-12">
                                                                <span class="text-danger" id="msgpasswordl"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3 d-grid">
                                                        <button class="btn btn-success" onclick="logIn();">Log In</button>
                                                    </div>



                                                    <div class="row mt-3 mb-3">
                                                        <div class="col-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                                                                <label class="form-check-label">Remember Me</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 text-end">
                                                            <a href="#" class="link-1" onclick="openModel();">Forgot Password?</a>
                                                        </div>
                                                    </div>



                                                    <!-- <div class="col-6 text-end mt-3 mb-4">

                                                   </div> -->


                                                    <hr class="hr_break_1" />

                                                    <div class="col-12 mb-3 text-center">
                                                        <span class="form-label">Not a member yet?<a href="#" class="link-1" onclick="loginChange(2);"> Join now</a></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- model verification cord -->

                        <div class="modal fade" id="cordSend" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content align-items-center ">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Verifi Your Email</h5>

                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center"> Please enter your email address and we'll send you a link to reset your password.</p>
                                        <div class="col-12">
                                            <span class="text-danger" id="msgfoget"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <input class="form-control" type="email" id="femaill" placeholder="Enter youer Email.." />
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-secondary" onclick="sendCode();">Send cord</button>
                                            </div>
                                            <div class="col-8 mt-3">
                                                <input class="form-control" type="text" id="verifiCord" placeholder="Enter Verification Code" />
                                            </div>
                                            <div class="col-12 mt-1">
                                                <span id="msgchak" class="text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" onclick="newPasword();">Reset Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model verification cord -->

                        <!-- fogotPassword Modal -->
                        <div class="modal fade" id="fogetpassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content align-items-center">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reset Your Password</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <span class="text-danger" id="msgfoget1"></span>
                                            <div class="col-12">
                                                <input class="form-control" type="password" id="fpassword" placeholder="New Password" />
                                            </div>
                                            <div class="col-12 mt-3">
                                                <input class="form-control" type="password" id="frePassword" placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" onclick="changePassword();">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- fogotPassword Modal -->
                    </div>

                </div>

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
    ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>