<?php

include_once "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
  <title>header</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="header.css">
  <link rel="icon" href="IMAGES/agb logo.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>



  <nav>
    <ul>
      <li><a href="home.php"><img class="logo" src="images/AGBwhite.png"></a></li>

      <div class="center1">
        <div class="search-container">
          <a href="#"><input class="search" type="text" placeholder="Product Name" id="product" onkeyup="searchProduct(0);"><button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button></a>
        </div>

        <div>
          <button class="adbtn"><a href="advanced.php">Advanced</a></button>
        </div>

      </div>

      <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>




      <?php
      session_start();

      if (isset($_SESSION["u"])) {
        $data = $_SESSION["u"];
      ?>
        <li onclick="showslidebar2()">
          <div class="user_img"><i class="fa-regular fa-user"></i></div>
        </li>
        <div class="user_title"><b>Hi</b> <?php echo $data["fname"]; ?></div>
        <div class="usersignout_title" onclick="signout();">Signout</div>
      <?php

      } else {
      ?>
        <div class="user_title"><a href="index.php">Register or Sign in</a></div>
      <?php

      }
      ?>
    </ul>
  </nav>

  <header>


    <nav1 class="navbar">


      <ul>
        <li>
          <select class="" aria-label="Default select example" onchange="loadProduct(0);" id="basic_select">
            <option value="0">All Category</option>
            <?php

            $category_rs = Database::search("SELECT * FROM `category`");
            $category_num = $category_rs->num_rows;

            for ($x = 0; $x < $category_num; $x++) {
              $category_data = $category_rs->fetch_assoc();
            ?>
              <option  value="<?php echo $category_data["cat_id"]; ?>" >
                <?php echo $category_data["cat_name"]; ?>
              </option>
            <?php
            }
            ?>
            
          </select>
        </li>


        <li><a href="home.php">Home</a></li>
        <li><a href="">Laptops</a></li>
        <li><a href="">Monitors</a></li>
        <li><a href="">Memory</a></li>
        
       

      </ul>


    </nav1>


    





    <!--user-->

    <div class="slidebar2  d-none" id="slidebar2">

      <ul>
        <li><a href="profile.php">Personal Details</a></li>
        <li><a href="">Invoice</a></li>
        <li><a href="">Purchase History</a></li>

      </ul>
    </div>

    <!--user-->


  </header>








  
  
  <script src="script.js"></script>
  <script src="header.js"></script>
  <script src="bootstrap.js"></script>
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</body>

</html>






