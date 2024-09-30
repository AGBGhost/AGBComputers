<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AGB Computers</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="IMAGES/agb logo.png">
</head>

<body>



    <!--header-->

    <?php include "header.php" ?>

    <!--header-->







    <!-- loginbox -->
    <div class="center d-none" id="signInBox">

        <h1 class="login">Login</h1>

        <?php
        $email = "";
        $password = "";

        if (isset($_COOKIE["email"])) {
            $email = $_COOKIE["email"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }
        ?>


        <div class=" d-none alertbox " id="msgdiv1">
            <div class="alertboxtext" id="msg1">

            </div>

        </div>

        <div class="box">

            <div class="txt_field">
                <input type="text" required id="email2" value="<?php echo $email; ?>">
                <span></span>
                <label>Email</label>
            </div>

            <div class="txt_field">
                <input type="password" required id="password2" value="<?php echo $password; ?>" >
                <span></span>
                <label>Password</label>
            </div>
            <div class="tr">
                <div class="checkbox">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberme" />
                            <label class="font">Remember Me</label>

                        </div>
                    </div>

                </div>

                <div class="pass" onclick="forgotPassword();">Forgot Password?</div>

            </div>

            <button class="Btn" onclick="signin();">Login</button>

            <div class="signup_link">
                Not a member? <a class="link" onclick="changeView();">Signup</a>
            </div>
        </div>
    </div>
    <!-- loginbox -->




    <!--model-->

    <div class="modal   " tabindex="-1" id="fpmodal">
        <div class="modal-dialog  ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np" />
                                <button id="npb" class="btn btn-info" type="button" onclick="showPassword1();">SHOW</button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button id="rnpb" class="btn btn-info" type="button" onclick="showPassword2();">SHOW</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vcode">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <!--model-->







    <!-- signupbox -->
    <div class="center " id="signUpBox">

        <h1 class="login">Sign Up</h1>


        <div class=" d-none alertbox " id="msgdiv">
            <div class="alertboxtext" id="msg">

            </div>

        </div>


        <div class="box">
            <div class="txt_field">
                <input type="text" required id="fname">
                <span></span>
                <label>First Name</label>
            </div>
            <div class="txt_field">
                <input type="text" required id="lname">
                <span></span>
                <label>Last Name</label>
            </div>
            <div class="txt_field">
                <input type="text" required id="email">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" required id="password">
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="text" required id="mobile">
                <span></span>
                <label>Mobile</label>
            </div>

            <button class="Btn" onclick="signup();">Sign Up</button>



            <div class="signup_link">
                Already have an account? <a class="link" onclick="changeView();">Login</a>
            </div>
        </div>
    </div>
    <!-- signupbox -->









    <script src="script.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>