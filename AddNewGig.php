<!DOCTYPE html>

<html>

<head>
    <title>Freelance | Add New Gig</title>

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

                                    <textarea type="text" class="form-control border-1 bg-white ms-5 fs-1 text-capitalize" style="height: 100px;" id="title"></textarea>
                                    <label class="text-danger ms-5" id="errortitle"></label>
                                    <label class="float-end text-black-50"><label> Min Text 10 / </label> <label> Max Text 80</label></label>

                                </div>

                                <div class="col-md-11 m-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fw-bold">Category : </label>
                                        </div>
                                        <div class="col-4 ">
                                            <select class="form-select" onchange="catagaryChange();" id="cid">
                                                <option value="0">Select Category</option>

                                                <?php

                                                $category = Database::search("SELECT * FROM `category`");
                                                $category_num = $category->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"] ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>

                                            <label class="text-danger" id="errorc"></label>

                                        </div>
                                        <div class="col-4 ms-2" id="brand">

                                            <select class="form-select" id="brandselect">

                                                <option value="0"></option>

                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-10 m-3">

                                    <label class="form-label fw-bold ">Price : </label>

                                    <input type="number" class="form-control border-1 bg-white ms-5 " id="price"></input>
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

                                    <textarea type="text" class="form-control border-1 bg-white ms-5 " style="height: 250px;" id="descriptionarea"></textarea>
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

                                <div class="col-12 ">
                                    <div class="row justify-content-center">

                                        <div class="col-4 text-center btn">

                                            <label for="imageuploader" class="col-12 btn" onclick="changeProductImage();">
                                                <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview0" style="width: 3000px; height: 200px; " />
                                                <input type="file" accept="img/*" class="d-none" id="imageuploader" />
                                            </label>

                                        </div>
                                        <div class="col-4 text-center btn">

                                            <label for="imageuploader1" class="col-12 btn" onclick="changeProductImage1();">
                                                <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview1" style="width: 300px; height: 200px; " />
                                                <input type="file" accept="img/*" class="d-none" id="imageuploader1" />
                                            </label>

                                        </div>
                                        <div class="col-4 text-center btn">

                                            <label for="imageuploader2" class="col-12 btn" onclick="changeProductImage2();">
                                                <img class="img-fluid border border-dark rounded " src="resources/upload.png" id="preview2" style="width: 300px; height: 200px; " />
                                                <input type="file" accept="img/*" class="d-none" id="imageuploader2" />
                                            </label>

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
                                            <button class=" btn btn-success fw-bold" onclick="addnewgig();"> Publish </button>
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