<?php

require "connection.php";
session_start();
if (isset($_SESSION["admin"])) {
?>



    <!DOCTYPE html>

    <html>

    <head>
        <title>Freelance | History</title>

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
                            <h2 class="fw-bold">History</h2>
                        </div>

                        <div class="col-12">
                            <div class="row g-1 m-2">

                                <div class="row m-1">
                                    <div class="col-6">
                                        <label class="form-label text-dark">From Date</label>
                                        <input type="date" class="form-control" id="todate" onchange="HistorySearch()">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-dark ">To Date</label>
                                        <input type="date" class="form-control" id="fromdate" onchange="HistorySearch()">
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div id="view" class="mt-2">

                            <div class="col-12">
                                <div class="row g-1 m-2">

                                    <div class="col-12 mt-3 mb-2">
                                        <div class="row text-center">

                                            <div class="col-1 bg-light pt-2 pb-2 ">
                                                <span class=" fw-bold text-dark">ID</span>
                                            </div>

                                            <div class="col-lg-4 bg-light pt-2 pb-2 d-none d-lg-block">
                                                <span class=" fw-bold text-dark">GIG</span>
                                            </div>

                                            <div class="col-4 col-lg-2 bg-light pt-2 pb-2 ">
                                                <span class=" fw-bold text-dark">Buyer</span>
                                            </div>

                                            <div class="col-4 col-lg-2 bg-light pt-2 pb-2">
                                                <span class="fw-bold text-dark ">Order date</span>
                                            </div>

                                            <div class="col-3 col-lg-2 bg-light pt-2 pb-2">
                                                <span class="fw-bold text-dark ">Price</span>
                                            </div>

                                        </div>
                                    </div>

                                    <?php

                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $m = Database::search("SELECT * FROM `order` ORDER BY `id` DESC");
                                    $d = $m->num_rows;
                                    $result_per_page = 6;
                                    $number_of_pages = ceil($d / $result_per_page);
                                    $page_first_result = ((int)$pageno - 1) * $result_per_page;

                                    $order = Database::search("SELECT * FROM `order` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                    $ordernum = $order->num_rows;

                                    for ($x = 1; $ordernum >= $x; $x++) {
                                        $orderData = $order->fetch_assoc();

                                        $gig = Database::search("SELECT * FROM `gig` WHERE `id`='" . $orderData["gigId"] . "'");
                                        $gigData = $gig->fetch_assoc();

                                        $user = Database::search("SELECT * FROM `user` WHERE `id`='" . $orderData["user_id"] . "'");
                                        $userData = $user->fetch_assoc();

                                    ?>

                                        <div class="col-12 mt-3 mb-2">
                                            <div class="row text-center">

                                                <div class="col-1 bg-light pt-2 pb-2 ">
                                                    <span class=" fw-bold text-black-50"><?php echo $orderData["id"]; ?></span>
                                                </div>

                                                <div class="col-lg-4 bg-light pt-2 pb-2 d-none d-lg-block">
                                                    <span class=" fw-bold text-black-50"><?php echo $gigData["title"]; ?></span>
                                                </div>

                                                <div class="col-4 col-lg-2 bg-light pt-2 pb-2 ">
                                                    <span class=" fw-bold text-black-50"><?php echo $userData["email"]; ?></span>
                                                </div>

                                                <div class="col-4 col-lg-2 bg-light pt-2 pb-2">
                                                    <span class="fw-bold text-black-50 "><?php echo $orderData["date_Time"]; ?></span>
                                                </div>

                                                <div class="col-3 col-lg-2 bg-light pt-2 pb-2">
                                                    <span class="fw-bold text-black-50 "><?php echo $gigData["price"]; ?></span>
                                                </div>

                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                </div>
                            </div>

                            <div class="row">
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
                                                <a href="<?php echo "?page=" . ($pageno - 1) . ""; ?>" class="page-link">Previous</a>
                                            </li>
                                            <?php
                                        }

                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                            if ($page == $pageno) {
                                            ?>
                                                <li class="page-item active"><a class="page-link" href="<?php echo "?page=" . ($page) . ""; ?>"><?php echo $page; ?></a></li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item"><a class="page-link" href="<?php echo "?page=" . ($page) . ""; ?>"><?php echo $page; ?></a></li>

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
                                                <a class="page-link" href="<?php echo "?page=" . ($pageno + 1) . ""; ?>">Next</a>
                                            </li>
                                        <?php

                                        }
                                        ?>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>

                <?php
                require "AdminFooter.php";
                ?>

            </div>
        </div>

        <script src="script.js"></script>
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