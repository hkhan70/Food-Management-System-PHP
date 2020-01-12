<?php
session_start();
require_once "connection.php";
require_once "header.php";
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
    td,th
    {
        color: white;
    }
</style>
</head>
<body>
   

    <!-- Banner Area Starts -->
    <section class="banner-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>TRY THE BEST HOMEMADE FOOD</h6>
                    <h1>Discover the <span class="prime-color">true</span><br>  
                    <span class="style-change">home <span class="prime-color">taste</span> outside</span></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

   
    <!-- Testimonial Area Starts -->
    <section class="testimonial-area section-padding4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Customer <span>Words</span></h3>
                        <p><i>Our source of motivation</i></p>
                    </div>
                </div>
            </div>
  <section class="">
  <div class="container">

    <div id="page-wrapper" style="width: 100%;">
            <div class="row">
              <h3 class="page-header"></h3>
        
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
</div>
</section>

    <!-- Testimonial Area End -->


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
