<?php

include "connection.php";

 include "header.php" ;
session_start();
$user = $_SESSION["u"];

if (isset($user)) {
$rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$user["email"]."'");
$d = $rs->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <!--header-->

    

    <!--header-->
    <div class="top">
        <div class="background">
            <div class="d-flex">


                <div class=" bg-white col-4">

                    <div>

                        <div class="img mb-3">
                            <img src="<?php
                            if (!empty($d["img_path"])) {
                                echo $d["img_path"];
                            } else {
                                echo("IMAGES/empty.png");
                            }
                            
                            ?>" style="width: 250px;" id="i">
                        </div>

                        <div class="text-center ">
                            <label for="form-label"><?php echo $d["fname"]?></label>
                            <label for="form-label"><?php echo $d["lname"]?></label>
                        </div>

                        

                       
                            <div class="col-6 mt-2 offset-3">
                            <label for="form-label">Profile Image :</label>
                                <input type="file" class="form-control" id="imageUploader">
                            </div>
                       



                        <div class="d-flex justify-content-center mt-4">
                            <button class="btn btn-primary" onclick="uploadImg();">Upload</button>
                        </div>
                    </div>

                </div>


                <div class="bg-white col-8" style="padding: 20px 20px;">

                    <h1 class="text-center mt-2 mb-3">Profile Details</h1>


                    <div class="row mt-2">
                        <div class="col-6 ">
                            <label for="form-label">First Name</label>
                            <input type="text " class="form-control" value="<?php echo $d["fname"]?>" id="fname"/>
                        </div>
                        <div class="col-6">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"]?>" id="lname"/>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="form-label">Mobile</label>
                            <input type="text" class="form-control" value="<?php echo $d["mobile"]?>" id="mobile"/>
                        </div>
                        
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 mt-2">
                            <label for="form-label">Email</label>
                            <input type="text" class="form-control"value="<?php echo $d["email"]?>"disabled />
                        </div>

                        <div class="col-6 ">
                            <label class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" value="<?php echo $d["password"]?>" disabled id="pw" />
                                <button id="npb" class="btn btn-primary" type="button">SHOW</button>
                            </div>
                        </div>

                    </div>

                    <div class="col-6 mt-2">
                        <label for="form-label">Registered Date / Time</label>
                        <input type="text" class="form-control" value="<?php echo $d["joined_date"]?>" disabled>
                    </div>



                    <div class="col-12 mt-2">
                        <label for="form-label">Address Line 01</label>
                        <input type="text" class="form-control" value="<?php echo $d["line_1"]?>" id="line1">
                    </div>


                    <div class="col-12 mt-2">
                        <label for="form-label">Address Line 02</label>
                        <input type="text" class="form-control" value="<?php echo $d["line_2"]?>" id="line2">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary col-12" onclick="updateData();">Update Profile</button>
                    </div>




                </div>


            </div>
        </div>
    </div>

    <!--footer-->

    <?php include "footer.php" ?>

    <!--footer-->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>


</body>

</html>

<?php
} else {
    header("location: index.php");
}


?>