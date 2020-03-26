<?php

include("connections/conn.php");

$selectedVenue = $_GET["venueID"];

$selectedVenueQuery = "SELECT * FROM venues WHERE id = $selectedVenue";

$selectedVenueResult = $conn -> query($selectedVenueQuery);

if (!$selectedVenueResult) {
    echo $conn -> error;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Seven Festival</title>
   
        
        <link href="css/venue.css" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d6f6f144c6.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
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
                    <li class='active'><a href="venue.php"> Venue </a></li>
                    <li><a href="logout.php"> Log out </a></li>
                    
            
            </div>
			<!-- End of nav bar code -->
			
			</header>
        
    </head>
    
    <body>		
        <div id='container'>
            
            <?php
                while($row = $selectedVenueResult->fetch_assoc()){

                    $venueName = $row["venue"];
                    $venueImage = $row["imgpath"]; 
                    $venueDesc = $row["description"];
                    $venueCapacity = $row["maxcapacity"];

                    echo "<div class='box'> 
                            
                            <form action='processeditvenue.php?selectedVenue=$selectedVenue' method='POST' id='editvenue' enctype='multipart/form-data'>
                                <label>Venue Name</label>
                                <input type='text' name='venueName' value='$venueName'/>
                                <br>
                                
                                <img src='gallery/$venueImage' height='250px'/>
                                <input type='file' name='updateImage'/> 
                                <br>
                                
                                <label>Venue Capacity</label>
                                <input type='text' name='venueCapacity' value='$venueCapacity'/>
                                <br>
                                
                                <label>Venue Description</label>
                                <textarea name='venueDesc' form='editvenue'>$venueDesc</textarea>
                                <br>
                                
                                
                                
                                <input type='submit' value='Update' name='updateVenue'/>
                            </form>
                    
                          </div>";
                    
                    /*if (isset($_POST["updateVenue"])) {

                    $fileName = $_FILES['newimg']['name'];
                    $fileTemp = $_FILES['newimg']['tmp_name'];
                    $updatedName = $conn -> real_escape_string ($_POST["venueName"]);
                    $updatedCapacity = $conn -> real_escape_string ($_POST["venueCapacity"]);
                    $updatedDesc = $conn -> real_escape_string ($_POST["venueDesc"]);
                            

                    move_uploaded_file($fileTemp, "gallery/$fileName"); 

                    $updateVenueQuery = "UPDATE venues
                                         SET venue = '$updatedName', imgpath = '$fileName', description = '$updatedDesc', maxcapacity = '$updatedCapacity'
                                         WHERE id = '$venueID'";

                    $updateVenueResult = $conn -> query($updateVenueQuery);

                    if (!$updateVenueResult) {
                        echo $conn -> error;
                    }

                    echo "<p><strong>Venue Updated Successfully<strong></p>";

                    }*/      
                }
                        
                  
                
                
            ?>
            
        </div>
        

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
