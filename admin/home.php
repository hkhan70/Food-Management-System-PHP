<?php
session_start();
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

    <!-- Header Area Starts -->
  <header class="">
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

<div id="login">
<h2 style="color: gray;text-align: center;text-decoration: underline;">DASHBOARD</h2>
    <!-- Food Area starts -->
    <section class="food-area section-padding">     
        <div class="container">
            <div class="row">
                <div class="col-md-5">                   
                </div>
            </div>
      <div id="page-wrapper" style="width: 30%;overflow: hidden;float: left;">
            <div class="row">
              <h3 class="page-header" style="color: #939895;margin-left:35%;border-style: solid;">MENU</h3>
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
                                          <th>Day</th>
                                          
                                          
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
                                                                  echo "
                                                                        <td>$item_name</td>";
                                                                  echo "<td >$item_price</td>"; 
                                                                  echo "<td >$item_day</td>";                                                                                                                                
                                                                    echo"</tr>";  
                                                                                                                                   
                                                                  
                                                       }


                                                    }
                                                 }             
                                                  else
                                                  {
                                                      echo "No Record Found!";
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

    <div id="page-wrapper" style="width: 30%;overflow: hidden;margin-left: 50%;">
            <div style="border-style: solid;">
              <h3 class="page-header" style="color: #939895;margin-left:30%;">ORDERS</h3>
               <?php    

  $query = "SELECT count(*) as allcount FROM orders WHERE status='ordered' ";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);
  $allcount = $row['allcount'];
  echo "<h6 style='color:black;text-align:center;'>TOTAL ORDERS:$allcount</h6>";
 
?>

             </div>
    </div>
    </div>
       
    </section>

    <section class="">
  <div class="container">

    <div id="page-wrapper" style="width: 100%;">
            <div class="row">
              <h3 class="page-header" style="color: gray;margin-left: 40%;border-style: solid;">REVIEWS</h3>
        
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                           
                        </div>

                        <div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover'>
                                    <thead>
                                      <tr>
                                         
                                          <th>Item Name</th>
                                          <th>Review</th>   
                                          <th>Customer</th>                                         
                                          
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php  
                                                                
                                                 $checksql = "SELECT * FROM reviews ";

                                              if ($result=mysqli_query($conn,$checksql))
                                              {
                                                if (mysqli_num_rows($result) != 0)
                                               {
                                                      while($row2 = mysqli_fetch_array($result))
                                                    {
                                                        
                                                        echo"<tr>";
                                                       // $item_id=strtoupper($row2['item_id']);//ITEM ID NOT USEFUL
                                                        $item_name=strtoupper($row2['item_name']);//ITEM-NAME
                                                        $item_review=$row2['review'];//ITEM-PRICE
                                                        $customer_name=$row2['customer_name'];//ITEM DAY NOT SHOWING IN MENU

                                                                  echo "<td >$item_name</td>";
                                                                  echo "<td >$item_review</td>";
                                                                  echo "<td >$customer_name</td>";                                                                                                                                     
                                                                    echo"</tr>";
                                                                   
                                                                    
                                                       }


                                                    }
                                                 }             
                                                  else
                                                  {
                                                      echo "No Record Found!";
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
    <!-- Food Area End -->
</div>

<div id="logout" style="width: 100%;height: 70%;">
    <section class="table-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>LOGIN <span>FOR</span> CONTENT</h3>
                       
                        <div style="margin-right:35%;margin-top:50px;width:30%;float: right;display: block;">
                            <form action="./login.php?op=in" style="border:1px solid #ccc;border-radius: 8px;" method="POST">
                                <div class="container">
                                  <h3>Login</h3>
                                  <p></p>
                                  <hr>

                                  <label for="email"><b>adminname</b></label>
                                  <input type="text" placeholder="Enter adminname" name="email" required style="margin-left: 20%;">
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
