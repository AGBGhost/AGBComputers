<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="adminSignIn.css">
    <link rel="icon" href="IMAGES/agb logo.png">
</head>
<body class="adminsignInbody">

 <!-- adminloginbox -->
 <div class="center " >

 <div>
    <img class="logo" src="IMAGES/AGBwhite.png">
 </div>

<h1 class="login ">Admin Login</h1>


<div class=" d-none alertbox " id="msgDiv">
    <div class="alertboxtext" id="msg" >

    </div>

</div>

<div class="box">

    <div class="txt_field">
        <input type="text" required id="email" >
        <span></span>
        <label>Email</label>
    </div>

    <div class="txt_field">
        <input type="password" required id="pw" >
        <span></span>
        <label>Password</label>
    </div>
    

    <button class="Btn" onclick="adminSignIn();">Login</button>

    
</div>
</div>
<!-- adminloginbox -->


<script src="script.js"></script>

</body>
</html>