<?php

include "connection.php";


session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON `cart`.`product_id` = `product`.`id` INNER JOIN  `product_img` ON `product`.`id` = `product_img`.`product_id`
 WHERE `cart`.`user_email` = '" . $user["email"] . "'");
$num = $rs->num_rows;

if ($num > 0) {
    //echo ("Load Card");
?>

    <?php

    for ($i = 0; $i < $num; $i++) {

        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;
    ?>

        <!-- cart_items -->
        
            <div class="cart  d-flex justify-content-center">
                <div class="product">

                    <!-- cart_items -->

                    <div class="col-12 border-3  p-3 mb-3 d-flex justify-content-between">
                        <div class="d-flex align-items-center col-5 ">
                            <img src="<?php echo $d["img_path"] ?>" class="rounded-4" width="250px" />
                            <!-- margin_start(ms) -->
                            <div class="ms-5">
                                <h4 class="text-light"><?php echo $d["title"] ?></h4>

                                <h5 class="text-light mt-4">Price:<span class="text-warning">Rs:<?php echo $d["price"] ?></span></h5>

                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-light btn-sm bg-primary" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                            <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control form-control-sm text-center" value="<?php echo $d["cart_qty"] ?>" disabled style="max-width: 100px;">
                            <button class="btn btn-light btn-sm bg-primary" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>

                        </div>
                        <div class="d-flex align-items-center me-5">
                            <h4 class="text-light">Total:<span class="text-warning">Rs:<?php echo $total ?></span></h4>
                        </div>
                        <div class="d-flex align-items-center me-5">
                            <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>

                    </div>



                </div>
            </div>
       
        <!-- cart_items -->

    <?php
    }

    ?>

    <!-- checkout -->
    <div class="d-flex justify-content-end  ">
        <div class="buy-box">
            <div class="title2">Summary</div>
            <div class="bar"></div>

            <div class="text-light p-3">

                <h5 class="mt-4">Number Of Items :<span class="text-info"><?php echo $num ?></span></h5>
                <div class="bar"></div>
                <h5 class="mt-4 ">Delevery Fee :<span class="text-info">Rs:500</span></h5>
                <div class="bar"></div>
                <h3 class="mt-3">Net Total :<span class="text-warning">Rs:<?php echo ($netTotal + 500) ?></span></h3>

            </div>


            <div class="checkbtn-box">

                <button class="check-btn"  onclick="checkOut();">CHECKOUT</button>
            </div>
        </div>
    </div>
    <!-- checkout -->

<?php

} else {
    //echo("Cart is Empty");

?>

    <!-- empty -->
    <div class="title1 mt-5">Your cart is currently empty.</div>

    <div class="d-flex justify-content-center  mt-5 mb-4">
        <a href="home.php" class="btn btn-danger col-3 ">Return to shop</a>
    </div>
    <!-- empty -->



<?php
}



?>