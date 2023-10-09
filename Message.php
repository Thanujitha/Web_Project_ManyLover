<!DOCTYPE html>

<html>

<head>
    <title>Freelance | Messages</title>

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
                $user_id = $_SESSION["u"]["id"];

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

                        <h1 class="h3 mb-3 mt-4">Messages</h1>

                        <div class="card">
                            <div class="row g-0">
                                <div class="col-12 col-lg-5 col-xl-3 border-right chat-messages">

                                    <div class="px-4 d-none d-md-block">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control my-3" placeholder="Search...">
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                    $sendMessage = Database::search("SELECT DISTINCT to_id,sender_id FROM `massage` WHERE `sender_id` = $user_id ");
                                    $s1 = $sendMessage->num_rows;

                                    $toMessage = Database::search("SELECT DISTINCT to_id,sender_id FROM `massage` WHERE `to_id` = $user_id ");
                                    $to = $toMessage->num_rows;

                                    for ($y = 0; $s1 > $y; $y++) {
                                        $sd1 = $sendMessage->fetch_assoc();

                                        // for ($x = 0; $to > $x; $x++) {
                                        //     $to1 = $toMessage->fetch_assoc();

                                                $u;
                                                if ($sd1["sender_id"] == $user_id) {

                                                    $u = Database::search("SELECT * FROM `user_details` WHERE `user_id`= '" . $sd1["to_id"] . "'");
                                                } 
                                                // else if ($sd1["to_id"] == $user_id) {
                                                //     $u = Database::search("SELECT * FROM `user_details` WHERE `user_id`= '" . $sd1["sender_id"] . "'");
                                                // }

                                                $ud = $u->fetch_assoc();
                                                $pi = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $ud["id"] . "'");
                                                $pi_num = $pi->num_rows;

                                                if ($pi_num == 0) {
                                    ?>
                                                    <a href="#" class="list-group-item list-group-item-action border-0 mt-3">
                                                        <div class="d-flex align-items-start" onclick="viweMessage(<?php echo $sd1['to_id'] ?>,<?php echo $sd1['sender_id'] ?>);">
                                                            <img src="resources/logo/user_icon.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                                            <div class="flex-grow-1 ml-3">
                                                                <?php echo $ud["name"] ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php
                                                } else {
                                                    $piurl = $pi->fetch_assoc();
                                                ?>
                                                    <a href="#" class="list-group-item list-group-item-action border-0 mt-3">
                                                        <div class="d-flex align-items-start" onclick="viweMessage(<?php echo $sd1['to_id'] ?>,<?php echo $sd1['sender_id'] ?>);">
                                                            <img src="<?php echo $piurl["url"] ?>" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                                            <div class="flex-grow-1 ml-3">
                                                                <?php echo $ud["name"] ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                    <?php
                                                }
                                            
                                        // }
                                    }
                                    ?>

                                    <hr class="d-block d-lg-none mt-1 mb-0">
                                </div>


                                <div class="col-12 col-lg-7 col-xl-9" id="messageView">



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