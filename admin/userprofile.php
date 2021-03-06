
<?php
session_start();
ob_start();
require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
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
<style type="text/css">
  h6
  {
    color: black;
  }
</style>
</head>
<body>

      <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
  <header class="" >
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="home.php"><img src="assets/images/logo/logo.png" alt="logo" style="height: 50px;"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li><a href="./home.php">Home</a></li>                     
                            <li><a href="./orders.php">View Orders</a></li>
                            <li><a href="./menu.php">Add/View Items</a></li>
                            <li><a href="./userprofile.php">View Customer Profile</a></li>
                            

     
                        </ul>
                    </div>  
                                
                         <div class="dropdown" style="z-index: 2;">
                                  <button class="mainmenubtn" style="z-index: 2;">
                                  <?php 
                                   if (isset($_SESSION['admin'])) 
                                  {
                                    echo $_SESSION["admin"];

                                  }
                                  else 
                                  {
                                    echo '<p style="font-family: Impact;font-size: 15px;">LOGGED OUT</p>';
                                  }
                                    
                                  ?>                                     
                                    </button>
                                     <?php
                                     if (isset($_SESSION['admin']))
                                      {
                                      echo '<div class="dropdown-child" style="z-index:2;">';  
                                       echo '<a href="profile.php"><p>Profile</p></a><hr>';                                    
                                        echo "<a href='logout.php'><p>LogOut</p></a>";                              
                                      } 
                                    ?>
                                  </div>
                                </div>                                                                       
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
  </div>

<div id="login">


    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">

                <div id="page-wrapper" style="width: 70%;">
            <div class="row">
              <h3 class="page-header" style="text-align: center;color: #939895;margin-left: 50%;">CUSTOMER PROFILE</h3>
        
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>                          
                        </div>
                       <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover' >
                                    <thead>
                                      <tr>
                                         
                                          <th>Name</th>
                                          <th>Password</th>    
                                          <th>Cell</th>
                                          <th>Address</th>
                                          
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

<?php

$name = "";
$cell = "";
$pw ="" ;
$tmp="";
$address="";


      $checksql = "SELECT * FROM login";
      if ($result=mysqli_query($conn,$checksql))
      {
        if (mysqli_num_rows($result) != 0)
            {
              while($row2 = mysqli_fetch_array($result))
            {
               echo"<tr>";

              $name = $row2[1];
              $pw = $row2[2];
              $cell =$row2[3] ;
              $address =$row2[4] ;

              echo "<td >$name</td>"; 
               echo "<td >$pw</td>"; 
                echo "<td >$cell</td>"; 
                 echo "<td >$address</td>"; 

              echo"</tr>";

            }

            }
           else
           {
             echo "No Record Found!";
           }                                       
         }

?>
                                          </tr>

                                    </tbody>
                                </table>
                            </div>
                       
                        </div>
                        
                    </div>
                    
                </div>

            </div>
          
         </div>
    </div>
</section>
</div>

<div id="logout" style="width: 100%;height: 70%;">  
    <section class="table-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>LOGIN <span>FOR</span> CONTENT</h3>
                        <p><i>Just a step away from amazing deals in town.</i></p>
                        <div style="margin-right:35%;margin-top:50px;width:30%;float: right;display: block;">
                            <form action="login.php?op=in" style="border:1px solid #ccc;border-radius: 8px;" method="POST">
                                <div class="container">
                                  <h3>Login</h3>
                                  <p></p>
                                  <hr>

                                  <label for="email"><b>Username</b></label>
                                  <input type="text" placeholder="Enter Username" name="email" required style="margin-left: 20%;">
                                  </br>
                                  <label for="psw"><b>Password</b></label>
                                  <input type="password" placeholder="Enter Password" name="psw" required style="margin-left: 20%;">                                
                              
                                 </br></br>
                                  <div class="clearfix">                                    
                                    <button type="submit" class="myButton" style="margin-left: 80%;">Login</button>                                   
                                  </div>

                                </div>
                          </form>
                   </div>  
                    </div>
                </div>
             </div>
          </div>
    </section>
             
</div>

<?php 
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])){  ?>

<script>
document.getElementById("login").style.display = "none";
document.getElementById("logout").style.display = "show";
</script>
<?php }
else {  ?>
<script>
document.getElementById("logout").style.display = "none";
document.getElementById("login").style.display = "show";
</script>

<?php 
}
?>


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