<?php
//  SIGNUP-PHP
// Define variables and initialize with empty values
require_once "connection.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate username
    if(empty(trim($_POST["email"])))
    {
        $username_err = "Please enter a username.";
    } 
    else
    {
        // Prepare a select statement
        $sql = "SELECT id FROM login WHERE uname = ?";
        
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken.";
                } 
                else
                {
                    $username = trim($_POST["email"]);
                }
             } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
          mysqli_stmt_close($stmt);
        }
         
        // Close statement
       
    }
    
    // Validate password
    if(empty(trim($_POST["psw"])))
    {
        $password_err = "Please enter a password.";     
    } 
    elseif(strlen(trim($_POST["psw"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    }
     else
     {
        $password = trim($_POST["psw"]);
     }
    
    // Validate confirm password
    if(empty(trim($_POST["psw-repeat"])))
    {
        $confirm_password_err = "Please confirm password.";     
    } 
    else
    {
        $confirm_password = trim($_POST["psw-repeat"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }

    $cellno = $_POST["cell"];

   // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO login (uname,pw,cellno) VALUES (?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters        
         
            mysqli_stmt_bind_param($stmt, "ssi",$param_username, $param_password,$param_cell);
            
            // Set parameters
            $param_username = $username;
            //$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_password=$password;
            $param_cell=$cellno;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
               header("location: ./login-signup.php");
            } 
            else
            {
                echo "Signup Failed";
            }
           mysqli_stmt_close($stmt);   
        }
         
        // Close statement
      
    }
    // Close connection
    mysqli_close($conn);
}
?>
