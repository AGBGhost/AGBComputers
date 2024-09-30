<?php

include "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $products_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
    product.title,product.datetime_added,
    product.category_cat_id,product.model_has_brand_id,
    product.status_status_id,model.model_name AS mname,brand.brand_name AS bname FROM 
    `product` INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id INNER JOIN 
    `brand` ON brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id WHERE product.id='" . $pid . "'");

    $product_num = $products_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $products_rs->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $product_data["title"]; ?></title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="product.css">

        </head>

        <body>

            <!--header-->

            <?php include "header.php" ?>

            <!--header-->

            <div class="top">

                <div class="box">

                    <div class="flex-box">
                        <div class="left">





                            <?php
                            $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $pid . "'");
                            $image_num = $image_rs->num_rows;
                            $img = array();

                            if ($image_num != 0) {
                                for ($x = 0; $x < $image_num; $x++) {
                                    $image_data = $image_rs->fetch_assoc();
                                    $img[$x] = $image_data["img_path"];
                            ?>
                                    <div class="big-img">
                                        <img src="<?php echo $img[$x]; ?>">
                                    </div>
                                    <div class="images">

                                        <div class="small-img">
                                            <img src="<?php echo $img[$x]; ?>" onclick="showImg(this.src)">
                                        </div>

                                    <?php
                                }
                            } else {
                                    ?>

                                    <div class="small-img">
                                        <img src="IMAGES/border.png" onclick="showImg(this.src)">
                                    </div>
                                    <div class="small-img">
                                        <img src="IMAGES/border.png" onclick="showImg(this.src)">
                                    </div>
                                    <div class="small-img">
                                        <img src="IMAGES/border.png" onclick="showImg(this.src)">
                                    </div>
                                <?php
                            }
                                ?>
                                    </div>
                        </div>


                        <div class="right">
                            <div class="url"><a href="home.php">Home</a> / Product / Monitors</div>
                            <div class="pname"><?php echo $product_data["title"]; ?></div>
                            <div>
                                <div class="d-flex gap-4">
                                    <div class="titleb">Brand : <?php echo $product_data["bname"]; ?></div>
                                    <div class="titleb">Model : <?php echo $product_data["mname"]; ?></div>
                                </div>

                            </div>
                            <div class="price">RS.<?php echo $product_data["price"]; ?></div>

                            <div class="d-flex text-primary mb-3">
                                <div class="">In Stock : </div>
                                <div class=""> <?php echo $product_data["qty"]; ?> Items Available</div>
                            </div>


                            <div class="quantity">
                                <p>Quantity :</p>
                                <input type="number" min="0" id="qty" />
                            </div>
                            <div class="btn-box">
                                <button class="cart-btn" onclick="addtoCart('<?php echo $product_data['id'] ?>');">Add to Cart</button>
                                <button class="buy-btn" onclick="buyNow('<?php echo $product_data['id'] ?>');">Buy Now</button>
                            </div>
                        </div>

                    </div>


                    <div class="title1">Specification</div>
                    <div class="description d-flex justify-content-center"><?php echo $product_data["description"]; ?></div>


                </div>

                <!--footer-->

                <?php include "footer.php" ?>

                <!--footer-->

            </div>










            <script>
                let bigImg = document.querySelector('.big-img img');

                function showImg(pic) {
                    bigImg.src = pic;
                }
            </script>
            <script src="script.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>


<?php





    } else {
        echo ("Please try again later.");
    }
} else {
    echo ("Something Went Wrong.");
}


?>