<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $oid = $_GET["oid"];
    $price = $_GET["amount"];

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Freelance | Invoice</title>

        <link rel="icon" href="resources/logo/logoh.png" />
        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body class="mt-2" style="background-color: #f7f7ff;">

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <span class="m-3">.</span>
                    </div>
                </div>

                <?php require "header.php"; ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printDiv();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Save as PDF</button>
                </div>

                <div class="col-12">
                    <hr class="hrbreak1" />
                </div>
                <div id="GFG">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="invoiceheaderimg"></div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12 text-end text-decoration-underline text-primary">
                                        <h2>MoneyLovers</h2>
                                    </div>
                                    <div class="col-12 text-end fw-bold">
                                        <span>Maradana,Colombo 10,Sri Lanka</span><br />
                                        <span>+94 112215684</span><br />
                                        <span>MoneyLovers@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-1 border-primary hrbreak1" />
                    </div>

                    <div class="col-12 mb-4">
                        <div class="row">
                            <div class="col-6">
                                <h6>INVOICE TO :</h6>
                                <?php
                                // $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                // $ar = $addressrs->fetch_assoc();

                                ?>
                                <!-- <h3><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?></h3>
                                <span class="fw-bold"><?php echo $ar["line1"] . "," . $ar["line2"] ?></span><br /> -->
                                <span class="fw-bold"><?php echo  $umail; ?></span>
                            </div>

                            <?php
                            $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                            $in = $invoicers->num_rows;
                            $ir = $invoicers->fetch_assoc();

                            ?>
                            <div class="col-6 text-end">
                                <h2 class="text-primary">INVOICE 0<?php echo $ir["order_id"]; ?></h2>
                                <span class="fw-bold">Date and Time of Invoice : </span>&nbsp;
                                <span class="fw-bold"><?php echo $ir["date"]; ?></span>
                            </div>



                        </div>
                    </div>

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr class="border border-1 border-white">
                                    <th>#</th>
                                    <th>Order Id</th>
                                    <th class="text-end">Unit price</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $invoices = Database::search("SELECT * FROM `order` WHERE `id`='" . $oid . "'");

                                $subtotal = "0";
                                if ($invoicers->num_rows > 0) {

                                    $irs = $invoices->fetch_assoc();
                                    $gid = $irs["gigId"];

                                    $subtotal = $subtotal + $_GET["amount"];

                                    $products = Database::search("SELECT * FROM `gig` WHERE `id`='" . $gid . "'");
                                    $pr = $products->fetch_assoc();
                                ?>
                                    <tr style="height: 70px;">
                                        <td class="bg-primary text-white fs-3"><?php echo $oid; ?></td>
                                        <td>
                                            <a href="#" class="fs-6 fw-bold link-2"><?php echo $pr["title"]; ?></a>
                                        </td>
                                        <td class="fs-6 text-end" style="background-color: rgb(199,199,199);">Rs. <?php echo $pr["price"]; ?>.00</td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end">SUBTOTAL</td>
                                    <td class="fs-5 text-end">$ <?php echo $pr["price"]; ?>.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <?php
                                    $fee = $subtotal - $pr["price"];
                                    ?>
                                    <td colspan="2" class="fs-5 text-end border-primary">fee</td>
                                    <td class="fs-5 text-end border-primary">$ <?php echo $fee; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end border-0 text-primary">GRAND TOTAL</td>
                                    <td class="fs-5 text-end text-primary border-0">$ <?php echo $subtotal; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-4 text-center" style="margin-top: -100px;margin-bottom: 50px;">
                        <span class="fs-1">Thank You</span>
                    </div>

                  
                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 mb-3 text-center">
                        <label class="form-label fs-6 text-black-50">
                            Invoice was created on a computer and is valid without the Signature and seal.
                        </label>
                    </div>
                </div>
                <?php require "footer.php"; ?>
            </div>
        </div>



        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php
}
?>