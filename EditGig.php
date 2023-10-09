<!DOCTYPE html>

<html>

<head>
    <title>Freelance | Edit Gig</title>

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
            $gigId = $_GET["id"];

            if (isset($_SESSION["u"])) {

                $user_email = $_SESSION["u"]["email"];

                $gig = Database::search("SELECT * FROM gig INNER JOIN user_details ON user_details.id =gig.user_details_id INNER JOIN `user` ON `user`.id = user_details.user_id 
                WHERE `user`.email='" . $user_email . "' AND gig.id='" . $gigId . "'");
                $gignum = $gig->num_rows;

                if ($gignum == 1) {

                    $gig_data = $gig->fetch_assoc();

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

                            <div class="col-8 offset-2 shadow_div_box container-fluid mt-5" id="pricing">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row text-center">
                                            <span class="h3 text-dark fw-bold m-3">Overview & Pricing</span>

                                        </div>
                                    </div>
                                    <hr class="hr_break_1" />

                                    <div class="col-md-10 m-3">

                                        <label class="form-label fw-bold">Gig Title : </label>

                                        <textarea type="text" class="form-control border-1 bg-white ms-5 fs-1" style="height: 150px;" id="title"><?php echo $gig_data["title"]; ?> </textarea>

                                        <label class="text-danger ms-5" id="errortitle"></label>
                                        <label class="float-end text-black-50"><label> Min Text 10 / </label> <label> Max Text 80</label></label>

                                    </div>

                                    <div class="col-md-11 m-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fw-bold">Category : </label>
                                            </div>

                                            <?php
                                            $b = Database::search("SELECT * FROM `brand` WHERE `id`='" . $gig_data["brand_id"] . "'");
                                            $brand = $b->fetch_assoc();

                                            $c = Database::search("SELECT * FROM `category` WHERE `id`='" . $brand["category_id"] . "'");
                                            $category = $c->fetch_assoc();

                                            ?>
                                            <div class="col-4 ">
                                                <select class="form-select" id="cid" disabled>
                                                    <option value="1"><?php echo $category["name"]; ?></option>

                                                </select>

                                                <label class="text-danger" id="errorc"></label>

                                            </div>
                                            <div class="col-4 ms-2" id="brand">

                                                <select class="form-select" id="brandselect" disabled>

                                                    <option value="1"><?php echo $brand["name"]; ?></option>

                                                </select>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-10 m-3">

                                        <label class="form-label fw-bold ">Price : </label>

                                        <input type="number" class="form-control border-1 bg-white ms-5 " id="price" value="<?php echo $gig_data["price"]; ?>"></input>
                                        <label class="text-danger ms-5" id="errorprice"></label>
                                        <label class="float-end text-black-50"><label> Min Price 10$ / </label> <label> Max Price 1000$</label></label>

                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-11">
                                        <div class="row">

                                            <div class="col-1">

                                            </div>
                                            <div class=" col-5 m-3">
                                                <!-- <button class="btn fw-bold btn-outline-dark"><< Back</button> -->
                                            </div>

                                            <div class="col-5 text-end m-3">
                                                <button class=" btn btn-success fw-bold" onclick="nextDescription();">Next >></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-8 offset-2 shadow_div_box container-fluid mt-5 d-none" id="description">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row text-center">
                                            <span class="h3 text-dark fw-bold m-3">Description</span>

                                        </div>
                                    </div>
                                    <hr class="hr_break_1" />

                                    <div class="col-md-10 m-3">

                                        <label class="form-label fw-bold ">Gig Description : </label>

                                        <textarea type="text" class="form-control border-1 bg-white ms-5 " style="height: 250px;" id="descriptionarea"><?php echo $gig_data["description"]; ?></textarea>
                                        <label class="text-danger ms-5" id="errord"></label>
                                        <label class="float-end text-black-50"><label> Min Text 100 / </label> <label> Max Text 500</label></label>

                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-11">
                                        <div class="row">

                                            <div class="col-1"> </div>

                                            <div class=" col-5 m-3">
                                                <button class="btn fw-bold btn-outline-dark" onclick="backDescription();">
                                                    << Back</button>
                                            </div>

                                            <div class="col-5 text-end m-3">
                                                <button class=" btn btn-success fw-bold" onclick="nextGallery();">Next >></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-8 offset-2 shadow_div_box container-fluid mt-5 d-none" id="gallery">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row text-center">
                                            <span class="h3 text-dark fw-bold m-3">Gallery</span>

                                        </div>
                                    </div>
                                    <hr class="hr_break_1" />

                                    <?php

                                    $i = Database::search("SELECT * FROM `gig_image` WHERE `id` ='" . $gig_data["gig_image_id"] . "'");
                                    $image = $i->fetch_assoc();

                                    ?>

                                    <div class="col-12 ">
                                        <div class="row justify-content-center">

                                            <div class="col-4 text-center btn">

                                                <?php
                                                if (!$image["url1"] == null) {
                                                ?>

                                                    <label for="imageuploader" class="col-12 btn" onclick="changeProductImage();">
                                                        <img class="img-fluid border border-dark rounded " src="<?php echo $image["url1"] ?>" id="preview0" style="width: 3000px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader" />
                                                    </label>
                                                <?php

                                                } else {
                                                ?>
                                                    <label for="imageuploader" class="col-12 btn" onclick="changeProductImage();">
                                                        <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview0" style="width: 3000px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader" />
                                                    </label>
                                                <?php
                                                }
                                                ?>



                                            </div>
                                            <div class="col-4 text-center btn">

                                                <?php
                                                if (!$image["url2"] == null) {
                                                ?>

                                                    <label for="imageuploader1" class="col-12 btn" onclick="changeProductImage1();">
                                                        <img class="img-fluid border border-dark rounded " src="<?php echo $image["url2"] ?>" id="preview1" style="width: 300px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader1" />
                                                    </label>
                                                <?php

                                                } else {
                                                ?>
                                                    <label for="imageuploader1" class="col-12 btn" onclick="changeProductImage1();">
                                                        <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview1" style="width: 300px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader1" />
                                                    </label>
                                                <?php
                                                }
                                                ?>



                                            </div>
                                            <div class="col-4 text-center btn">

                                                <?php
                                                if (!$image["url3"] == null) {
                                                ?>
                                                    <label for="imageuploader2" class="col-12 btn" onclick="changeProductImage2();">
                                                        <img class="img-fluid border border-dark rounded " src="<?php echo $image["url3"] ?>" id="preview2" style="width: 300px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader2" />
                                                    </label>

                                                <?php

                                                } else {
                                                ?>
                                                    <label for="imageuploader2" class="col-12 btn" onclick="changeProductImage2();">
                                                        <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview2" style="width: 300px; height: 200px; " />
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader2" />
                                                    </label>
                                                <?php
                                                }
                                                ?>



                                            </div>


                                        </div>
                                    </div>

                                    <hr class="hr_break_1" />

                                    <div class="col-11">
                                        <div class="row">

                                            <div class="col-1"> </div>

                                            <div class=" col-5 m-3">
                                                <button class="btn fw-bold btn-outline-dark" onclick="backtGallery();">
                                                    << Back</button>
                                            </div>

                                            <div class="col-5 text-end m-3">
                                                <button class=" btn btn-success fw-bold" onclick="updateGig(<?php echo $gigId ?>);">Update</button>
                                            </div>
                                        </div>

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
            window.location = "Gig.php";
        </script>
    <?php
                }
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>