<?php

require "connection.php";
session_start();
if (isset($_SESSION["admin"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Freelance | Admin Dachboard</title>

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
                            <h2 class="fw-bold">Dashboard</h2>
                        </div>

                        <?php
                        $today = date("Y-m-d");
                        $thismonth = date("m");
                        $thisyear = date("Y");
                        $a = "0";
                        $b = "0";

                        $invoicers = Database::search("SELECT * FROM `invoice`");
                        $in = $invoicers->num_rows;
                        for ($x = 0; $x < $in; $x++) {
                            $ir = $invoicers->fetch_assoc();
                            $d = $ir["date"];
                            $splitdate = explode(" ", $d);
                            $pdate = $splitdate[0];

                            if ($pdate == $today) {
                                $a = $a + $ir["Price"];
                            }

                            $splitmonth = explode("-", $pdate);
                            $pyear = $splitmonth[0];
                            $pmonth = $splitmonth[1];
                            if ($pyear == $thisyear) {
                                if ($pmonth == $thismonth) {
                                    $b = $b + $ir["Price"];
                                }
                            }
                        }
                        ?>

                        <div class="col-12">
                            <div class="row g-1">

                                <div class="col-6 col-lg-4 px-1 ">
                                    <div class="row g-1 m-3">
                                        <div class="col-12 bg-white text-dark text-center rounded border border-1 border-dark" style="height: 175px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span><br />
                                            <span class="fs-5">$<?php echo $a; ?>.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1 m-3">
                                        <div class="col-12 bg-white text-dark text-center rounded border border-1 border-dark" style="height: 175px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Earnings</span><br />
                                            <span class="fs-5">$<?php echo $b; ?>.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1 m-3">
                                        <div class="col-12 bg-white text-dark text-center rounded border border-1 border-dark" style="height: 175px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Engagements</span><br />
                                            <?php

                                            $usersrs = Database::search("SELECT * FROM `user`");
                                            $un = $usersrs->num_rows;
                                            ?>
                                            <span class="fs-5"><?php echo $un; ?> Members</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="fixed-bottom ">

            <?php
            require "AdminFooter.php";
            ?>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>

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