<?php
session_start();
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order'])) 
{
	

$customername=$_SESSION['user'];
$name=$_POST['name'];
$price=$_POST['price'];

$sql = "INSERT INTO orders( order_name, order_price, customer_name,status)
 				 VALUES ('$name','$price','$customername','ordered')";
 				
				 if(mysqli_query($conn, $sql))
                 {

                      echo "DONE";
                  }
                  else
                  {
                  	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);


				  }

  }

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel"]) ) 
   {
      $name=$_POST['name'];
      $customer=$_SESSION['user'];

  		$checkQuery = "DELETE from `orders` WHERE `customer_name`='$customer' AND order_name= '$name'";
      if(mysqli_query($conn, $checkQuery))
      {
       
        	echo "SUCCESSFULL";

      } 
      else
      {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }

  	}

?>