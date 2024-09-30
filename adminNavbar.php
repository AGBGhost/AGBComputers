<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>adminDashboard</title>
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="adminNavbar.css"/>
  <link rel="icon" href="IMAGES/agb logo.png">
</head>

<body class="body">

  <div class="box fixed-top">

    <div class="logo">
      <img src="IMAGES/AGBwhite.png">
    </div>

    <div class="bar"></div>

    <h1 class="text-center text-light">Dashboard</h1>

    <div class="bar"></div>

    <div class="slidebar2 mt-5">
      <ul>
        <li><a href="adminDashboard.php">User Management</a></li>
        <li><a href="adminProduct.php">Product Management</a></li>
        <li><a href="adminstock.php">Stock Management</a></li>
        
        <li><a href="adminReportUser.php">User Reports</a></li>
        <li><a href="adminReportProduct.php">Product Reports</a></li>


        <div class="d-flex justify-content-center mt-5">
          <button class="btn btn-light col-11 mt-5 " ><a href="adminSignIn.php" style="text-decoration: none;">SignOut</a></button>
        </div>
        


      </ul>

    </div>

  </div>

  <div class="info">

  

    








  </div>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>