<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminDashboard.css">
    <link rel="icon" href="IMAGES/agb logo.png">
</head>

<body>


    <?php include "adminNavbar.php" ?>

    <div class="info fixed-top">

        <h1 class=" text text-center mt-3 text-light ">Stock Management</h1>

        <div class="d-flex justify-content-end ">
            <button class="btn btn-outline-info mt-1" onclick="stockManagementchangeView();">Update Product</button>
        </div>


        <div class="box1  mt-3" id="productManage">

            <div class="d-flex justify-content-center gap-5 mt-1">

                <div class="col-3 mt-3">
                    <label for="form-label" class="text1 ">Category :</label>
                    <select class="form-select " aria-label="Default select example" id="category">
                        <option selected>Open this select menu</option>
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

                <div class="col-3 mt-3">
                    <label for="form-label" class="text1">Brand:</label>
                    <select class="form-select " aria-label="Default select example" id="brand">
                        <option selected>Open this select menu</option>
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

                <div class="col-3 mt-3">
                    <label for="form-label" class="text1">Model :</label>
                    <select class="form-select " aria-label="Default select example" id="model">
                        <option selected>Open this select menu</option>
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



            <div class="d-flex justify-content-center mt-3">
                <div class="col-10">
                    <label for="form-label" class="text1 ">Product Title</label>
                    <input type="text" class="form-control" id="title" />
                </div>
            </div>

            <div class="d-flex justify-content-center gap-2 mt-3 ">

                <div class="col-7">
                    <label for="form-label" class="text1 ">Product Price</label>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Rs.</span>
                        <input type="number" class="form-control" id="cost">
                        <span class="input-group-text">.00</span>
                    </div>

                </div>

                <div class="col-3">
                    <label for="form-label" class="text1 ">Qty</label>
                    <input type="number" class="form-control" value="0" min="0" id="qty" />
                </div>

            </div>

            <div class="d-flex justify-content-center mt-3">
                <div class="col-10">
                    <label for="form-label" class="text1 ">Product Description</label>
                    <input type="text" class="form-control" id="desc">
                </div>
            </div>

            <div class=" d-flex justify-content-center gap-4 mt-2 ">
                <label for="form-label" class="text1 mt-3 ">Product Image</label>

                <div class="col-5  mt-3">
                    <input class="form-control" type="file" multiple id="imageuploader">
                </div>
            </div>

            <div class="d-flex justify-content-center mb-5 mt-3">
                <button class="btn btn-primary mb-4 col-7" onclick="addProduct();">Save Product</button>
            </div>

        </div>









        <div class="box1 d-none mt-5" id="productUpdate">

            <div class="d-flex justify-content-center gap-5 mt-1">

                <label for="form-label" class="text1 mt-3 ">Product Name :</label>
                <div class="col-6 mt-3">
                    <select class="form-select" aria-label="Default select example" id="selectProduct">
                        <option selected>Open this select menu</option>
                        <?php
                        $product_rs = Database::search("SELECT * FROM `product`");
                        $product_num = $product_rs->num_rows;

                        for ($x = 0; $x < $product_num; $x++) {
                            $product_data = $product_rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $product_data["id"]; ?>">
                                <?php echo $product_data["title"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

            </div>


            <div class="d-flex  justify-content-center gap-5 mt-1">
                <label for="form-label" class="text1 mt-3">Prooduct Qty :</label>
                <div class="col-6 mt-3">
                <input type="text"  class="form-control" placeholder="Qty" id="qty1"/>
                </div>
            </div>


            <div class="d-flex justify-content-center gap-5 mt-1">
                <label for="form-label " class="text1 mt-3">Product Price :</label>
                <div class="col-6 mt-3 ">
                    <input type="text" class="form-control" placeholder="Price" id="uprice"/>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3 mb-3">
                <button class="btn btn-primary col-4 mb-3" onclick="updateProduct();">Update</button>
            </div>

        </div>


    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>