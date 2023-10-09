<?php
require "connection.php";
session_start();
if (!isset($_SESSION["admin"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>

        <title>Freelance | Admin Sign In</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo/logoh.png" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

    </head>

    <body class="body1 bg-dark">

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
                                        <a class="navbar-brand text-white h3" href="AdminSignIn.php"><?php echo $ti["name"]; ?></a>

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
                                                <h1 class="text_size text-white">Welcome to Admin</h1>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="offset-1 col-10 col-lg-3 ">
                                    <div class="row">

                                        <div class="login_div">
                                            <div class="row">

                                                <div class="" id="joinDiv">

                                                    <div class="col-12 text-center">
                                                        <p class="title02 mt-3 fw-bold">Freelance.com</p>
                                                        <span class="text-danger" id="msg"></span>
                                                    </div>

                                                    <hr class="hr_break_1" />

                                                    <div class="col-12 mt-3">
                                                        <input class="form-control" type="email" id="email" placeholder="Email ex:-example@abc.com" />
                                                        <div class="col-12">
                                                            <span class="text-danger" id="msgemail"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3 mb-3 d-grid">
                                                        <button class="btn btn-success" onclick="adminCode();">Continue</button>
                                                    </div>

                                                    <hr class="hr_break_1" />

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
                                        <p class="text-center"> Please enter Verification Code.</p>
                                        <div class="col-12">
                                            <span class="text-danger" id="msgfoget"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <input class="form-control" type="text" id="verifiCord" placeholder="Enter Verification Code" />
                                            </div>
                                            <div class="col-5">
                                                <button class="btn btn-secondary" onclick="ReSendadminCode();">Re Send cord</button>
                                            </div>

                                            <div class="col-12 mt-1">
                                                <span id="msgchak" class="text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" onclick="AdminLogin();">Log In</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- model verification cord -->
                    </div>

                </div>

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>

    </html>


<?php
} else {

?>

    <script>
        window.location = "AdminDashboard.php";
    </script>

<?php
}
?>