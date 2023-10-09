<?php

$uid = $_POST["uid"];
$todate = $_POST["todate"];
$fromdate = $_POST["fromdate"];

require "connection.php";
$t = "0";

$invoicers = Database::search("SELECT * FROM `invoice` WHERE `bayerId`='" . $uid . "' AND `date` BETWEEN '".$todate."' AND '".$fromdate."'");
$in = $invoicers->num_rows;

for ($x = 0; $x < $in; $x++) {
    $ir = $invoicers->fetch_assoc();
    $t = $t + $ir["Price"];
}

?>

<div class="row m-3">
    <h4 class="form-label text-black-50">Earning</h4>
</div>

<div class="row m-2">
    <h3 class="form-label fw-bold mx-4"><?php echo $t; ?></h3>
</div>