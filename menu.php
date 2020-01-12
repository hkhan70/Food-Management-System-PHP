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
                            <li class="active"><a href="home.php">Home</a></li>                            
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="login-signup.php">Signup/Login</a></li>
     
                        </ul>
                    </div>  
                                
                         <div class="dropdown" style="z-index: 2;">
                                  <button class="mainmenubtn" style="z-index: 2;">
                                  <?php 
                                   if (isset($_SESSION['user'])) 
                                  {
                                    echo $_SESSION["user"];

                                  }
                                  else 
                                  {
                                    echo '<p style="font-family: Impact;font-size: 15px;">LOGGED OUT</p>';
                                  }
                                    
                                  ?>                                     
                                    </button>
                                     <?php
                                     if (isset($_SESSION['user']))
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

    <div id="page-wrapper" style="width: 10%;overflow: hidden;float: right;margin-top: 20px;">
            <div style="border-style: solid;">
              <h5 class="page-header" style="color: #939895;">YOUR ORDERS</h5>
  <?php    
  $customername=$_SESSION['user'];
  $query = "SELECT count(*) as allcount FROM orders WHERE status='ordered' and customer_name='$customername' ";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);
  $allcount = $row['allcount'];
  echo "<h6 style='color:black;text-align:center;'>$allcount</h6>";
 
?>

             </div>
    </div>

    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">

                <div id="page-wrapper" style="width: 70%;">
            <div class="row">
              <h3 class="page-header" style="text-align: center;color: #939895;margin-left: 50%;">MENU</h3>
        
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                           
                        </div>

                        <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover'>
                                    <thead>
                                      <tr>
                                         
                                          <th>Item</th>
                                          <th>Price</th>    
                                          <th>Action</th>
                                          
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php  
                                                                
                                                 $checksql = "SELECT * FROM menu ";

                                              if ($result=mysqli_query($conn,$checksql))
                                              {
                                                if (mysqli_num_rows($result) != 0)
                                               {
                                                      while($row2 = mysqli_fetch_array($result))
                                                    {
                                                        
                                                        echo"<tr>";
                                                       // $item_id=strtoupper($row2['item_id']);//ITEM ID NOT USEFUL
                                                        $item_name=strtoupper($row2['item_name']);//ITEM-NAME
                                                        $item_price=strtoupper($row2['item_price']);//ITEM-PRICE
                                                        $item_day=strtoupper($row2['item_day']);//ITEM DAY NOT SHOWING IN MENU
                                                        
                                                        $name=$price="";
                                                                  echo "
                                                                        <td>$item_name</td>";
                                                                  echo "<td >$item_price</td>"; 

                                                                  echo "<td>";
                                                                   
 echo "<a href='menu.php?order_name=".$row2['item_name']." & order_price=".$row2['item_price']." data-toggle='tooltip'><span>ORDER</span></a>";

                                                                   echo "</td>";                                                                                                                                    
                                                                    echo"</tr>";
                                                                   
                                                                    
                                                       }


                                                    }
                                                 }             
                                                  else
                                                  {
                                                      echo "No Record Found!";
                                                  }

if ( isset($_GET['order_name'])) 
{
    
$customername=$_SESSION['user'];
$item_name=$_GET['order_name'];
$item_price=$_GET['order_price'];

$sql = "INSERT INTO orders( order_name, order_price, customer_name,status)
                 VALUES ('$item_name','$item_price','$customername','ordered')";
                
                 if(mysqli_query($conn, $sql))
                  {
                    ?>
                    <script language="JavaScript">
                        //alert('Order Placed');
                      document.location='./menu.php';
                    </script>
                    <?php
                  } 
                  else
                  {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);


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
    
<?php   
echo '  <div >
              <form action="./menu.php" method="POST">
              <br>
                <div style="width: 100%;">
                    <h4 style="color: #939895;border-style: dotted;text-align:center">ADD A REVIEW </h4><br>
                    <h6>ITEM NAME:</h6>
                    <input type="text" name="item_name" class="" />
                    <br><br><br>
                    <h6>REVIEW</h6>
                    <textarea name="item_review" rows="10" cols=59></textarea>
                    <br><br><br>
                    <input type="submit" name ="addreview" class="btn btn-primary" value="ADD REVIEW"/>


                </div>
              
              </form>  

          </div>
';
if ( isset($_POST['addreview'])) 
{
 
$customername=$_SESSION['user'];
$item_name=$_POST['item_name']; 
 $item_review=$_POST['item_review'];
$allcount="";
$query = "SELECT count(*) as allcount FROM reviews WHERE review='".$item_review."' ";
           if(mysqli_query($conn, $query))
                  {
                    $row = mysqli_fetch_array($result);
                    $allcount = $row['allcount'];
                  }
                  else
                  {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                  }
 
if($allcount == 0)
{
    $sql = "INSERT INTO reviews( item_name, review, customer_name)
                 VALUES ('$item_name','$item_review','$customername')";
                
                 if(mysqli_query($conn, $sql))
                  {
                   
                  }
                  else
                  {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                  }

}

  }
?>
    </section>
    <!-- Food Area End -->
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
       

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="" style="height: 50px;"></a>
                            <p class="mt-3">We strive to let people have feeling of home at thier workplaces.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0" style="float: right;">
                            <h5 class="mb-4">Contact Us</h5>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p>Blue Area Islamabad </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-text">
                                    <p>(051) 456 78 90</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="info-text">
                                    <p>support@khaanapeena.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


<?php 
if (!isset($_SESSION['user']) || empty($_SESSION['user'])){  ?>

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
