<?php
 session_start();
unset($_SESSION['admin']);
unset($_SESSION['pw']);
header("Location:./home.php");
?>