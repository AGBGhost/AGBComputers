<?php


include "connection.php";



$rs =  Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id`");
$num = $rs->num_rows;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminDashboard.css">
    <link rel="icon" href="IMAGES/agb logo.png">

</head>

<body>


    <div>
        <div>

            <div>

            </div>
            <div id="printArea">
                <div class="d-flex justify-content-center">

                    <h1 class=" usertext text-center mt-3 col-10 ">User Report</h1>

                </div>

                <div class="offset-1 mb-5" style="position: absolute;">
                    <a href="adminDashboard.php"><img src="IMAGES/back.png" height="80" /></a>
                </div>

                <div class="d-flex justify-content-center offset-8">
                    <img src="IMAGES/AGB Black.png" height="150">
                </div>


                <div class="d-flex justify-content-center ">
                    <div class="col-9">
                        <table class="table  rounded-4 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Join Date/Time</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <tr>

                                        <td><?php echo $d["fname"] ?></td>
                                        <td><?php echo $d["lname"] ?></td>
                                        <td><?php echo $d["email"] ?></td>
                                        <td><?php echo $d["mobile"] ?></td>
                                        <td><?php echo $d["joined_date"] ?></td>
                                        <td><?php echo $d["type"] ?></td>
                                        <td><?php

                                            if ($d["status_status_id"] == 1) {
                                                echo ("Active");
                                            } else {
                                                echo ("Inactive");
                                            }


                                            ?></td>
                                    </tr>

                                <?php

                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center offset-7">
                <button class="btn btn-outline-primary col-5" onclick="printDiv();">Print</button>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>