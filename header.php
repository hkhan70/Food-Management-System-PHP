 <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
	<header class="header-area">
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
                            <li class="active"><a href="home.php">Home</a></li>                            
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="login-signup.php">Signup/Login</a></li>
     
                        </ul>
                    </div>  
                                <div class="dropdown">
                                  <button class="mainmenubtn">
                                  <?php 
                                   if (isset($_SESSION['user'])) 
                                  {
                                    echo $_SESSION["user"];

                                  }
                                  else 
                                  {
                                    echo '<p style="font-family: Impact;font-size: 15px;">LOGGED OUT</p>';
                                  }
                                    
                                  ?>                                     
                                    </button>
                                     <?php
                                     if (isset($_SESSION['user']))
                                      {
                                      echo '<div class="dropdown-child">';  
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