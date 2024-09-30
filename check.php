<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
  <title>header</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="check.css">
  <link rel="icon" href="IMAGES/agb logo.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <nav>
    <ul>


      <li><a href="home.php"><img class="logo" src="images/AGBwhite.png"></a></li>

      <div class="center">
        <div class="search-container">
        <a href="#"><input class="search" type="text" placeholder="search"><button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button></a>
        </div>

        <div>
        <button class="adbtn"><a href="advanced.php">Advanced</a></button>
      </div>
      
      </div>

      
      
      

      <li><a href="wishlist.php"><i class="fa-regular fa-heart"></i></a></li>
      <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
      <li><a href="index.php"><i class="fa-regular fa-user"></i><div class="user_title">Register or Sign in</div></a></li>
      



    </ul>


  </nav>


  <header>
    


    <nav1 class="navbar">


      <ul>


        <li onclick="showslidebar()"><i class="fa-solid fa-list "></i>

        <li><a href="home.php">Home</a></li>
        <li><a href="">Desktop Computers</a></li>
        <li><a href="">Laptops</a></li>
        <li><a href="">Monitors</a></li>
        <li><a href="">Accessories</a></li>

      </ul>


    </nav1>


    <div class="slidebar d-none" id="slidebar">
      <ul>


        <li><a href="home.php">Home</a></li>
        <li><a href="">Desktop Computers</a></li>
        <li><a href="">Laptops</a></li>
        <li><a href="">Monitors</a></li>
        <li><a href="">Accessories</a></li>

        <li><a href="">Home</a></li>
        <li><a href="">Desktop Computers</a></li>
        <li><a href="">Laptops</a></li>
        <li><a href="">Monitors</a></li>
        <li><a href="">Accessories</a></li>



      </ul>
    </div>

  </header>











  <script src="header.js"></script>
  <script src="bootstrap.js"></script>

</body>

</html>