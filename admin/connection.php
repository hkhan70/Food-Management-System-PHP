<?php

$ip="127.0.0.1:3308";
$uname="root";
$pw="root";
$db="food_system";

$conn=mysqli_connect($ip,$uname,$pw,$db);

if (!$conn)

 {

echo "CONNECTION FAILED".mysql_error();
	
}


 ?>