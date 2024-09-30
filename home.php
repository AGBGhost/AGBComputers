<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="home.css">
  <link rel="icon" href="IMAGES/agb logo.png">

</head>

<body>

  <!--header-->

  <?php include "header.php" ?>

  <!--header-->


  <!--home-->



  <!--load class="top"-->
  <div class="top" id="loadProduct">

    <!--load -->



    <!--advsearch-->

    


    <!--advsearch-->



    <!--carousel-->
    <div>

      <div class="carousel_slide ">


        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="carousel/carousel_slide AGB 2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="carousel/carousel_slide AGB 3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="carousel/carousel_slide AGB 4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="carousel/carousel_slide AGB 5.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <!--carousel-->



        <div>
          <?php
          $category_rs2 = Database::search("SELECT * FROM `category`");
          $category_num2 = $category_rs2->num_rows;

          for ($y = 0; $y < $category_num2; $y++) {
            $category_data2 = $category_rs2->fetch_assoc();
          ?>

            <!-- Category Name -->

            <div class="box">

              <div class="title">
                <a href=""><?php echo $category_data2["cat_name"]; ?></i></a>

              </div>
            </div>

            <!-- Category Name -->





            <!-- product card -->

            <div class="card-container">


              <?php

              $product_rs = Database::search("SELECT * FROM `product` WHERE `category_cat_id`='" . $category_data2["cat_id"] . "' 
             AND `status_status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");

              $product_num = $product_rs->num_rows;

              for ($z = 0; $z < $product_num; $z++) {
                $product_data = $product_rs->fetch_assoc();
              ?>

                <div class="card1">
                  <div class="card2">

                    <div class="big-img">
                      <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>">

                        <?php
                        $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data["id"] . "'");
                        $img_data = $img_rs->fetch_assoc();

                        ?>

                        <img src="<?php echo $img_data["img_path"]; ?>"></a>
                    </div>


                    <div class="info text-center mb-4">
                      <div class="card-title text-center"><?php echo $product_data["title"]; ?></div>


                      <?php
                      if ($product_data["qty"] > 0) {

                      ?>

                        <div class="card-instock">In Stock</div>
                        <div class="card-instock"><?php echo $product_data["qty"]; ?> Items Available</div>
                        <div class="card-price">RS. <?php echo $product_data["price"]; ?> </div>
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
                    <div class="card-price">RS. <?php echo $product_data["price"]; ?></div>
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
            <!-- product card -->



          <?php
              }

          ?>




        </div>

        






      <?php
          }
      ?>



      <!-- product card -->

      <div class="lastbox"></div>




      </div>
    </div>
  </div>

  <!--home-->


  <!--footer-->

  <?php include "footer.php" ?>

  <!--footer-->


  <script src="script.js"></script>
  <script src="bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>