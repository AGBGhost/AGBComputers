<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

//echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `product` WHERE `product`.`title` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
//echo($num);

$results_per_page = 8;
$num_of_pages =  ceil($num / $results_per_page);
//echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
//echo ($num2);

?><div class="card-container"><?php

                                if ($num2 == 0) {
                                    //Search Result

                                ?>
        <div class="d-flex flex-column align-items-center mt-5 text-light">
            <h4>Search No Result</h4>
            <p>We,re Sorry, We cannot find any mathes for your search term</p>
        </div>
        <?php


                                } else {
                                    //Load Result
                                    for ($i = 0; $i < $num2; $i++) {
                                        $d = $rs2->fetch_assoc();
        ?>





            <div class="card1">
                <div class="card2">

                    <div class="big-img">


                        <?php
                                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $d["id"] . "'");
                                        $img_data = $img_rs->fetch_assoc();

                        ?>

                        <a href="<?php echo "singleProductView.php?id=" . ($d["id"]); ?>"><img src="<?php echo $img_data["img_path"]; ?>"></a>
                    </div>

                    <div class="info text-center mb-4">
                        <div class="card-title"><?php echo $d["title"]; ?></div>


                        <?php
                                        if ($d["qty"] > 0) {

                        ?>

                            <div class="card-instock">In Stock</div>
                            <div class="card-instock"><?php echo $d["qty"]; ?> Items Available</div>
                            <div class="card-price">RS. <?php echo $d["price"]; ?></div>

                    </div>

                    <div class="btn">
                        <div class="d-flex gap-2 justify-content-center">

                            <button class="btn btn-danger col-6"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                            <button class="btn btn-primary col-6">Buy Now</button>
                        </div>

                    </div>



                <?php

                                        } else {
                ?>
                    <div class="card-outstock">Out Of Stock</div>
                    <div class="card-outstock">0 Items Available</div>
                    <div class="card-price">RS. <?php echo $d["price"]; ?></div>

                </div>

                <div class="btn">
                    <div class="d-flex gap-2 justify-content-center">

                        <button class="btn btn-danger disabled col-6"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                        <button class="btn btn-primary col-6 disabled">Buy Now</button>
                    </div>

                </div>

            <?php
                                        }
            ?>

            </div>
</div>




<?php
                                    }

?>

<!--pagination-->
<div class=" justify-content-center">
    <section class="pagination mb-4 mt-2">
        <ul class="pagination-items mb-2 mt-2">

            <li <?php
                                    if ($pageno <= 1) {
                                        echo ("#");
                                    } else {
                ?>onclick="searchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                    }

                                                                        ?>>Pre</li>

            <?php

                                    for ($y = 1; $y <= $num_of_pages; $y++) {
                                        if ($y == $pageno) {
            ?>
                    <li class="active" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></li>
                <?php
                                        } else {
                ?>
                    <li class="" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></li>
            <?php
                                        }
                                    }

            ?>



            <li <?php
                                    if ($pageno >= $num_of_pages) {
                                        echo ("#");
                                    } else {
                ?> onclick="searchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                        }

                                                                            ?>>Next</li>

        </ul>
    </section>

</div>
<!--pagination-->


<?php
                                }


?>