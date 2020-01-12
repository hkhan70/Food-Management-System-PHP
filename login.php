<?php
session_start();
require_once "connection.php";
$user = $_POST['email'];
$password = $_POST['psw'];
$op = $_GET['op'];

if($op=="in")
{
    $sql = mysqli_query($conn,"SELECT * FROM login WHERE uname='$user' AND pw='$password'");
	if(!$sql)
    {
		die('Error'.mysqli_error());;
	}
    if(mysqli_num_rows($sql)==1)
	{
        $qry = mysqli_fetch_array($sql);
        $_SESSION['user'] = $qry['uname'];
        $_SESSION['password'] = $qry['pw'];
    
          header("location: ./menu.php");
       
    }
    else
	{
        ?>
        <script language="JavaScript">
            alert('Invalid Credentials');
          document.location='./login-signup.php';
        </script>
        <?php
    }
}
else if($op=="out")
{
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    header("location:./login-signup.php");
}
?> 