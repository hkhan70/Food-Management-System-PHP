<?php
session_start();
require_once "connection.php";

if (isset($_SESSION['user'])) 
{
  // logged in
} else 
{
  // not logged in
  header('Location:login-signup.php');
}


$Complaint_Name = $Complaint_Address = $Complaint_Fname =$Complaint_no= "";
$Complaint_id=$Registration_Number = $Chasis_Number = $Color =$Engine_Number=$Model= "";
$Place= $City = $DOL =$Complaint= "";
$Para="";

  	
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["_s_details"]) ) 
    {

      $Para =  $_POST["para"];
      $checksql = "SELECT * FROM menu where Item_id = '$Para'";
      $result=mysqli_query($conn,$checksql);
  
        if (mysqli_num_rows($result) != 0)
            {
              while($row2 = mysqli_fetch_array($result))
            {
              $Item_id = $row2[1];
              $Item_Name = $row2[2];
              $Item_Price =$row2[3] ;
              $Quantity = $row2[3];
              $Pay_Mode= $row2[3];

           }
}
}
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
 <div id="page-wrapper">
            <div class="row">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <h1 class="page-header" style="text-align: center;color: #939895  ;">DETAILS</h1>
              <br>
              <h4></h4>
                <div class="col-lg-4">

                    <input type="text" name="cmp_no" hidden value="<?php echo $Item_id ?>"/>
                    <h5>Item Name: </h5>
                    <input type="text" name="cmp_name" class="form-control" value="<?php echo $Item_Name ?>"/>
                    <br>
                    <h5>Item Price: </h5>
                    <input type="text" name="cmp_address" class="form-control" value="<?php echo $Item_Price ?>"/>
                    <br>

                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-4">
                  <h5>Quantity </h5>
                  <input type="text" name="cmp_fname" class="form-control" value="<?php echo $Quantity ?>"/>
                  <br>
                  <h5>Pay Mode </h5>
                  <input type="text" name="cmp_number" class="form-control" value="<?php echo $Pay_Mode ?>"/>
                  <br>
                </div>

            </div>
           
                    <hr>
                    <input type="submit" name ="confirm" class="btn btn-primary" value="Confirm"/>
                    <input type="submit" class="btn btn-danger" value="Cancel" name="Cancel"/>
                    <br><br><br>
                </div>

              </form>
            </div>

    </div>

    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>

 