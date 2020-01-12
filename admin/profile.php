<?php
session_start();
require_once "connection.php";
require_once "header.php";


if (isset($_SESSION['admin'])) {
  // logged in
} else {
  // not logged in
  header('Location:login-signup.php');
}

$name = "";
$cell = "";
$pw ="" ;
$tmp="";
$address="";


      $tmp = $_SESSION["admin"];

      $checksql = "SELECT * FROM admin where name = '$tmp'";
      if ($result=mysqli_query($conn,$checksql))
      {
        if (mysqli_num_rows($result) != 0)
            {
              while($row2 = mysqli_fetch_array($result))
            {
              $name = $row2[1];
              $pw = $row2[2];
              $cell =$row2[3] ;

            }

            }
           else
           {
             echo "No Record Found!";
           }                                       
         }

                
       if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]) ) 
    {

      $usercellno = $_POST["cmp_cell"];
      $username = $_POST["cmp_name"];
      $userpassword = $_POST["cmp_pw"];

      $checkQuery=" UPDATE admin SET name='$username' , pw='$userpassword' ,cellno='$usercellno'  where name = '$tmp' ";

      if(mysqli_query($conn, $checkQuery))
      {

        header("location: profile.php");

      } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }

    }
    


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
  table 
{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;
  margin-right: 10%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr {
  background-color: #dddddd;
}
</style>
</head>
<body style="background-image:url(food6.jpg);background-size: cover;">

     
          <div id="" style="background-color:transparent;margin-top: 120px;">
            <div class="">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
              
              <br>
              <h3 style="text-align: center;">MY PROFILE</h3><br><br>
                <div style="width: 50%;display: inline;float: left; margin-left: 45%;">                   
                    <h4>NAME: </h4>
                    <input type="text" name="cmp_name" class="" value="<?php echo $name ?>" readonly/>
                    <br><br><br>
                    <h4>CELL-NO: </h4>
                    <input type="text" name="cmp_cell" class="" value="<?php echo $cell ?>"/>
                    <br><br><br>
                    <h4>PASSWORD </h4>
                    <input type="text" name="cmp_pw" class="" value="<?php echo $pw ?>"/>
                    <br><br><br>
                    <input type="submit" name ="update" class="btn btn-primary" value="Update Profile"/>


                </div>
              
              </form>                     
         </div>
                             
    </div>

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>

    </body>
</html>
