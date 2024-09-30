<?php


include "connection.php";



$rs =  Database::search("SELECT * FROM `product` INNER JOIN  `category` ON `product`.`category_cat_id` = `category`.cat_id
    INNER JOIN `model_has_brand` ON `model_has_brand`.id=`product`.model_has_brand_id INNER JOIN  `product_img` ON `product`.`id` = `product_img`.`product_id`
    INNER JOIN `brand` ON `brand`.brand_id=`model_has_brand`.brand_brand_id ORDER BY `product`.`id` ASC");

$num = $rs->num_rows;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminDashboard.css">

</head>

<body>



    <div id="printArea">
        <div class="d-flex justify-content-center">

            <h1 class=" usertext text-center mt-3 col-10 ">Product Report</h1>

        </div>

        <div class="offset-1 mb-5" style="position: absolute;">
            <a href="adminDashboard.php"><img src="IMAGES/back.png" height="80" /></a>
        </div>

        <div class="d-flex justify-content-center offset-8">
            <img src="IMAGES/AGB Black.png" height="150">
        </div>


        <div class="d-flex justify-content-center ">
            <div class="col-9 ">
                <table class="table  rounded-4 table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Catergory</th>
                            <th scope="col">Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <tr>

                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["title"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["cat_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><?php echo $d["qty"] ?></td>
                                <td>Rs.<?php echo $d["price"] ?></td>
                                <td><img src="<?php echo $d["img_path"] ?>" height="150"></td>

                            </tr>

                        <?php

                        }

                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center offset-7">
        <button class="btn btn-outline-primary col-5 mb-3" onclick="printDiv()">Print</button>
    </div>


    <script src="script.js"></script>
</body>

</html>