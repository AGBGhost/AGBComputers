<?php

include "connection.php";

$select = $_POST["s"];

$query = "SELECT * FROM `product` ";

if ($select != 0) {
    $query .= "WHERE `category_cat_id`='" . $select . "'";
}

?>


<div>
    <div>
        <div class="card-container">


            <?php

            $pageno;

            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;
            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();
            ?>




                <div class="card1">
                    <div class="card2">

                        <div class="big-img">


                            <?php
                            $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                            $img_data = $img_rs->fetch_assoc();

                            ?>

                            <a href="<?php echo "singleProductView.php?id=" . ($selected_data["id"]); ?>"><img src="<?php echo $img_data["img_path"]; ?>"></a>
                        </div>

                        <div class="info text-center mb-4">
                            <div class="card-title"><?php echo $selected_data["title"]; ?></div>


                            <?php
                            if ($selected_data["qty"] > 0) {

                            ?>

                                <div class="card-instock">In Stock</div>
                                <div class="card-instock"><?php echo $selected_data["qty"]; ?> Items Available</div>
                                <div class="card-price">RS. <?php echo $selected_data["price"]; ?></div>

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
                        <div class="card-price">RS. <?php echo $selected_data["price"]; ?></div>

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

    </div>
</div>

</div>


<!--pagination-->
<div class=" justify-content-center">
    <section class="pagination mb-4 mt-2">
        <ul class="pagination-items mb-2 mt-2">

            <li <?php
                if ($pageno <= 1) {
                    echo ("#");
                } else {
                ?>onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                    }

                                                                        ?>>Pre</li>

            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="active" onclick="loadProduct(<?php echo $x ?>);"><?php echo $x ?></li>
                <?php
                } else {
                ?>
                    <li class="" onclick="loadProduct(<?php echo $x ?>);"><?php echo $x ?></li>
            <?php
                }
            }

            ?>



            <li <?php
                if ($pageno >= $number_of_pages) {
                    echo ("#");
                } else {
                ?> onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                    }

                                                                        ?>>Next</li>

        </ul>
    </section>

</div>
<!--pagination-->