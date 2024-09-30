<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminDashboard.css">
    <link rel="icon" href="IMAGES/agb logo.png">
</head>

<body>


    <?php include "adminNavbar.php" ?>

    <div class="info fixed-top">

        <h1 class=" text text-center mt-3 text-light ">Product Management</h1>

        <div class="row offset-1 gap-4">

            <!--Brand registor-->
            <div class="border1 col-5  mt-4">

                <label for="form-label" class="text1">Brand Name :</label>
                <input type="text" class="form-control mt-2 mb-3" id="brand" />

                <div class=" mb-3">
                    <button class="btn1 col-12" onclick="brandReg();">Brand Register</button>
                </div>

                <div class=" d-none" id="msgDiv1" onclick="reload();">
                    <div class="alert alert-danger" id="msg1"></div>
                </div>


            </div>

            <!--Brand registor-->

            <!--category registor-->
            <div class="border1 col-5  mt-4">

                <label for="form-label" class="text1">Category Name :</label>
                <input type="text" class="form-control mt-2 mb-3" id="cat" />

                <div class=" mb-3">
                    <button class="btn1 col-12" onclick="categoryReg();">category Register</button>
                </div>

                <div class="d-none" id="msgDiv2" onclick="reload();">
                    <div class="alert alert-danger" id="msg2">

                    </div>
                </div>


            </div>

            <!--category registor-->

            <!--model registor-->
            <div class="border1 col-5  mt-2">

                <label for="form-label" class="text1">Model Name :</label>
                <input type="text" class="form-control mt-2 mb-3" id="model" />

                <div class=" mb-3">
                    <button class="btn1 col-12" onclick="modelReg();">Model Register</button>
                </div>

                <div class="d-none" id="msgDiv3">
                    <div class="alert alert-danger" id="msg3"></div>
                </div>

                

            </div>

            <!--model registor-->

           





        </div>



    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>