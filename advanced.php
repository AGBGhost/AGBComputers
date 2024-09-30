<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="advanced.css">
    <link rel="icon" href="IMAGES/agb logo.png">
</head>

<body>

    <!--header-->

    <?php include "header.php" ?>

    <!--header-->

    <!--adsearch-->
    <div class="top ">
        <div class="adbox">

            <div class="adbox1">
                <div class="title">Advanced Search</div>
                <div class="border"></div>

                <div class="">
                    <div class="d-flex justify-content-center mt-5 gap-4">

                        <div class="col-3">
                            <label for="form-label" class="text-light">Brand :</label>
                            <select class="mt-2 form-select " aria-label="Default select example" id="brand">
                                <option value="0">Open this select menu</option>
                                <?php
                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                $brand_num = $brand_rs->num_rows;

                                for ($x = 0; $x < $brand_num; $x++) {
                                    $brand_data = $brand_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $brand_data["brand_id"]; ?>">
                                        <?php echo $brand_data["brand_name"]; ?>
                                    </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-3 ">
                            <label for="form-label" class="text-light">Category :</label>
                            <select class=" mt-2 form-select " aria-label="Default select example" id="cat">
                                <option value="0">Open this select menu</option>
                                <?php
                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $category_data["cat_id"]; ?>">
                                        <?php echo $category_data["cat_name"]; ?>
                                    </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-3 ">
                            <label for="form-label" class="text-light">Model :</label>
                            <select class="mt-2 form-select " aria-label="Default select example" id="model">
                                <option value="0">Open this select menu</option>
                                <?php
                                $model_rs = Database::search("SELECT * FROM `model`");
                                $model_num = $model_rs->num_rows;

                                for ($x = 0; $x < $brand_num; $x++) {
                                    $model_data = $model_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $model_data["model_id"]; ?>">
                                        <?php echo $model_data["model_name"]; ?>
                                    </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>


                    </div>

                    <div class=" mt-4 d-flex justify-content-center  gap-5">
                        <div class="col-4  ">
                            <input type="number" class="form-control" id="exampleFormControlInput1" min="0" placeholder="Min Price" id="min" />
                        </div>

                        <div class="col-4 ">
                            <input type="number" class="form-control" id="exampleFormControlInput1" min="0" placeholder="Max Price" id="max" />
                        </div>
                    </div>



                </div>



                <div class=" mt-4 d-flex justify-content-center">
                    <button class="btn btn-danger col-5 mb-5" onclick="advSearchProduct(0);">Search</button>
                </div>


            </div>
        </div>
        <!--adsearch-->



        <!--footer-->

        <?php include "footer.php" ?>

        <!--footer-->


    </div>


    <script src="script.js"></script>
    <script src="header.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>