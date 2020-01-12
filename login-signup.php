<?php
session_start();
 require_once "header.php";
require_once "register.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Requiwhite Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>KHANAPEENA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="css/profilecss.css">

</head>
<body background="banner-bg.jpg">
   

<div style="margin-left:35%;margin-top:200px;width: 35%;float: left;display: block;">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="border:1px solid #ccc;border-radius: 8px;" method="POST">
                                <div class="container">
                                  <h3>Sign Up</h3>
                                  
                                  <hr>

                                  <label for="email"><b>Username</b></label>
                                  <input type="text" placeholder="Enter Username" name="email"  required>
                                  <span style="color: white"><?php echo $username_err; ?></span></br>

                                  <label for="psw"><b>Password</b></label>
                                  <input type="password" placeholder="Enter Password" name="psw"  required>
                                  <span style="color: white"><?php echo $password_err; ?></span></br>


                                  <label for="psw-repeat"><b>Confirm</b></label>
                                  <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                                  <span style="color: white"><?php echo $confirm_password_err; ?></span></br> 

                                   <label for="cell"><b>CellNo</b></label>
                                   <input type="tel" placeholder="Enter Cell" name="cell" required>
                                  </br></br>  </br>                                  

                                  <p style="color: white;">By creating an account you agree to our <a href="#" style="color:white">Terms & Privacy</a>.</p>

                                  <div class="clearfix">
                                    <button type="submit" class="myButton" style="margin-left: 80%;">Sign Up</button>
                                  </div>
                                </div>
                          </form>
</div>
<div style="margin-right:30%;margin-top:50px;width: 35%;float: right;display: block;">
                            <form action="login.php?op=in" style="border:1px solid #ccc;border-radius: 8px;" method="POST">
                                <div class="container">
                                  <h3>Login</h3>
                                  <p></p>
                                  <hr>

                                  <label for="email"><b>Username</b></label>
                                  <input type="text" placeholder="Enter Username" name="email" required>
                                  </br>
                                  <label for="psw"><b>Password</b></label>
                                  <input type="password" placeholder="Enter Password" name="psw" required>                                
                              
                                 </br></br>
                                  <div class="clearfix">                                    
                                    <button type="submit" class="myButton" style="margin-left: 80%;">Login</button>                                   
                                  </div>

                                </div>
                          </form>
                   </div>  
   
    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
