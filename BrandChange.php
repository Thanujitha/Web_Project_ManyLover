<select class="form-select" id="brandselect">
<option value="0"></option>
    <?php

    require "connection.php";

    $cid = $_GET["cid"];

    $brand = Database::search("SELECT * FROM `brand` WHERE `category_id` = '" . $cid . "'");
    $brand_num = $brand->num_rows;

    for ($x = 0; $x < $brand_num; $x++) {
        $brand_data = $brand->fetch_assoc();

    ?>

        <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"] ?></option>

    <?php

    }

    ?>

</select>