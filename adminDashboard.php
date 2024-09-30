<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminDashboard.css">
</head>

<body onload="loadUser();">


    <?php include "adminNavbar.php" ?>



    <div class="info fixed-top">

        <h1 class=" text text-center mt-3 text-light ">User Management</h1>

        <div class="row  justify-content-center mt-2">

            <div class=" d-none alertbox" id="msgDiv" onclick="reload();">
                <div class="alertboxtext text-danger bg-dark rounded-3 d-flex justify-content-center " style="font-size: 18px;" id="msg">

                </div>
            </div>

            <div class="col-4 mt-3">
                <input type="text" class="form-control" placeholder="User  Email" id="uemail" />
            </div>

            <button class="btn btn-danger col-2 mt-3" onclick="statusUpdate();">Change Status</button>
        </div>

        <div class="mt-4">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="tb">

                    <!-- ROW-->

                    <!--ROW-->




                </tbody>
            </table>

        </div>










    </div>


</body>

</html>