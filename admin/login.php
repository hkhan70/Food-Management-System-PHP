<?php
session_start();
require_once "connection.php";
$user = $_POST['email'];
$password = $_POST['psw'];
$op = $_GET['op'];

if($op=="in")
{
    $sql = mysqli_query($conn,"SELECT * FROM admin WHERE name='$user' AND pw='$password'");
	if(!$sql)
    {
		die('Error'.mysqli_error());;
	}
    if(mysqli_num_rows($sql)==1)
	{
        $qry = mysqli_fetch_array($sql);
        $_SESSION['admin'] = $qry['name'];
        $_SESSION['pw'] = $qry['pw'];
    
          header("location: ./home.php");
       
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
    unset($_SESSION['admin']);
    unset($_SESSION['pw']);
    header("location:./login-signup.php");
}
?> 