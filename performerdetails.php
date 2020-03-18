<?php
session_start();
include("connect.php");

if (!isset($_SESSION["admin_40267457"])) 
    {
    
  header("Location: login.php") ; 
  
    }
?>

<html>
    <head>
        <title>Seven Festival</title>
   
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                    <li><a href="index.php"> Home </a></li>  
                    <li><a href="shows.php"> Shows </a></li>
                    <li><a href="venue.php"> Venues </a></li>
                    <li class='active'><a href="performerdetails.php"> My Details </a></li>
                    <li><a href="performershows.php"> My Shows </a></li>
                    <li><a href="announcements.php"> Announcements </a></li>
                    <li><a href="logout.php"> Log Out </a></li>
                    
            
            </div>
                
                <?php
        $sqlQuery = "SELECT * FROM performer_details";
        $qry = $conn->query($sqlQuery);

        
        while ($row = $qry->fetch_assoc()) {
            $name[] = stripcslashes($row["performer_name"]);
            $category[] = stripcslashes($row["performance_category"]);
            $description[] = stripcslashes($row["performance_description"]);
            $username[] = stripcslashes($row["username"]);
            $email[] = stripslashes($row["email_address"]);
        }
        ?>
               
                    
                <div style="width: 50%; margin: 0 auto;">
                    <form action= updateperformerdetails.php method="post">
                <p> 
                    <label for="editday1">Edit Your Details</label> <br>
                </p>
                
                <p>
                    <label for="editday1">Performer Name</label> <br><br>
                    <input id="mainstage" size="40" name="performername" type="text" maxlength="100" required="required" value="<?php echo $name[0] ?>"
                           <br>
                            </p>
                            
                              <p>
                    <label for="editday1">Performance Category</label> <br><br>
                    <input id="mainstage" size="40" name="category" type="text" maxlength="100" required="required" value="<?php echo $category[0] ?>"
                           <br>
                            </p>

                           

                <p>
                    <label for="editday1">Description</label> <br><br>
                    <input id="mainstage" size="40" name="description" type="text" maxlength="100" required="required" value="<?php echo $description[0] ?>"
                           <br>
                            </p>

                <p>
                    <label for="editday1">Username</label> <br><br>
                    <input id="altstage" size="40" name="username" type="text" maxlength="100" required="required" value="<?php echo $username[0] ?>"
                           <br>
                </p>

                <p>
                    <label for="editday1">Email Address</label> <br><br>
                    <input id="boilerroom" size="40" name="email" type="text" maxlength="100" required="required" value="<?php echo $email[0] ?>"
                          <br>
                    <br>
                <br>
                    <input type ="submit" value="Save Changes">
                    
                </p>
               
              
                </form>
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
