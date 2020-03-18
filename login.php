<?php 
include("connect.php");
?>


<html>
    <head>
        <title>Seven Festival</title>
   
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <script src="https://kit.fontawesome.com/d6f6f144c6.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    
    <body>
        <!-- Start of nav bar code -->
        <header>
            <div class="container">
            <div class="row">
                <div class='logo'>
                    <img src='img/Sevenlogo.png'> 
                </div>
                <ul class="main-nav">
                    <li class='active'><a href="index.php"> Home </a></li>
                    <li><a href="shows.php"> Shows </a></li>
                    <li><a href="venue.php"> Venue </a></li>
                    <li><a href="login.php"> Login </a></li>
                    
            
            </div>
                
                <div class="container1">
            <form action="sign.php" method="post">
                <img src="img/icon-login-admin-png-2.png" alt="Admin Logo"/>
            <form>
                <div class="form-input">
                    <input name="username" type="text" required="required" value="" placeholder="Enter the User Name"  />
                   
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter Your Password" required="required" value=""/>
                </div>
                <div>
                    <select id="usertypes" name="usertypes">
                        <option name="Admin" value="Admin">Admin</option>
                        <option value="VenueManager">Venue Manager</option>
                        <option value="Performer">Performer</option>
                        <option value="RegisteredUser">Registered User</option>
                    </select>
                </div>
                <br>
                <div>
                <input type="submit" type="submit" value="LOGIN" class="btn-login" />
                </div>
                <div>
                    <br>                  
                    <a href="registrationpage.php">Not have an account? Sign up here.</a> 
                </div>
                
                </form>
            </form>

        </div>
           
            </div>
            
           
        </header>
         
        <!-- End of nav bar code -->
        
    
        
        <!-- Start of footer code -->
        <hr>
        <div class="footer">
            
            <div class="inner-footer">
                <div class="footer-items">
                    <h2>Quick Links</h2>
                    <div class="border"></div>
                    <ul>
                    <li><a href="index.html"> Home </a></li>
                    <li><a href="shows.php"> Shows </a></li>
                    <li><a href="venue.php"> Venue </a></li>
                    <li><a href="login.php"> Login </a></li>
                    
                    </ul>
                </div>
                
                <div class="footer-items">
                    <h2>Contact Us</h2>
                    <div class="border"></div>
                    <ul>
                    <li><i class="fas fa-phone"></i>02892 145834</li>
                    <li><i class="fas fa-envelope"></i>support@sevenfestival.com</li>
                    </ul>
                    
                    <div class="social-media">
                        <a href="https://www.facebook.com" class="fab fa-facebook"></a>
                        <a href="https://twitter.com" class="fab fa-twitter"></a>
                        <a href="https://www.instagram.com" class="fab fa-instagram"></a>
                    </div>  
                </div>
                
            </div>
            <div class="footer-bottom">
                Copyright &copy; Seven Festival 2020. All rights reserved.
            </div>
        </div>
        <!-- End of footer code -->
    </body>
    
</html>