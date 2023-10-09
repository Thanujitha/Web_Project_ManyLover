<?php


$to = $_POST["to"];
$send = $_POST["send"];

require "connection.php";

$message = Database::search("SELECT * FROM massage WHERE sender_id ='" . $send . "' AND to_id ='" . $to . "' OR sender_id ='" . $to . "' AND to_id ='" . $send . "'  ORDER BY `id` ASC ");
$messageNum = $message->num_rows;

?>

    <div class="position-relative bs-popover-bottom">
        <div class="chat-messages p-4">

            <?php
            for ($y = 0; $messageNum > $y; $y++) {
                $messageData = $message->fetch_assoc();

                if ($messageData["sender_id"] == $send) {

                    $u = Database::search("SELECT * FROM `user_details` WHERE `user_id`= '" . $messageData["sender_id"] . "'");

                    $ud = $u->fetch_assoc();
                    $pi = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $ud["id"] . "'");
                    $pi_num = $pi->num_rows;

                    $d = new DateTime($messageData["dateTime"]);
                    $date = $d->format("H:i:s");
            ?>

                    <div class="chat-message-right pb-4">
                        <div>
                            <?php
                            if ($pi_num == 0) {
                            ?>
                                <img src="resources/logo/user_icon.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <?php
                            } else {
                                $piurl = $pi->fetch_assoc();
                            ?>
                                <img src="<?php echo $piurl["url"] ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <?php
                            }

                            ?>
                            <div class="text-muted small text-nowrap mt-2"><?php echo $date ?></div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            <?php echo $messageData["message"] ?>
                        </div>
                    </div>

                <?php

                } else if ($messageData["sender_id"] == $to) {
                    $u = Database::search("SELECT * FROM `user_details` WHERE `user_id`= '" . $messageData["sender_id"] . "'");
                    $ud = $u->fetch_assoc();

                    $pi = Database::search("SELECT * FROM `profile_image` WHERE `user_details_id`= '" . $ud["id"] . "'");
                    $pi_num = $pi->num_rows;

                    $d = new DateTime($messageData["dateTime"]);
                    $date = $d->format("H:i:s");



                ?>

                    <div class="chat-message-left pb-4">
                        <div>
                            <?php
                            if ($pi_num == 0) {
                            ?>
                                <img src="resources/logo/user_icon.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <?php
                            } else {
                                $piurl = $pi->fetch_assoc();
                            ?>
                                <img src="<?php echo $piurl["url"] ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <?php
                            }

                            ?>
                            <div class="text-muted small text-nowrap mt-2"><?php echo $date ?></div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1"><?php echo $ud["name"]; ?></div>
                            <?php echo $messageData["message"] ?>
                        </div>
                    </div>

            <?php
                }
            }
            ?>



        </div>
    </div>

    <div class="flex-grow-0 py-3 px-4 border-top">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type your message" id="m">
            <button class="btn btn-primary" onclick="sendmessage1(<?php echo $send ?>,<?php echo $to ?>);">Send</button>
        </div>
    </div>


<script src="script.js"></script>
<script src="bootstrap.bundle.js"></script>