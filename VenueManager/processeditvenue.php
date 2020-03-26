<?php

include ("connections/conn.php");

$editID = $_GET["selectedVenue"];
$fileName = $_FILES['updateImage']['name'];
$fileTemp = $_FILES['updateImage']['tmp_name'];
$updatedName = $conn -> real_escape_string ($_POST["venueName"]);
$updatedCapacity = $conn -> real_escape_string ($_POST["venueCapacity"]);
$updatedDesc = $conn -> real_escape_string ($_POST["venueDesc"]);

$errorFlag = 0;

if(empty($fileName)){
  $errorFlag = 1;
 }

if($errorFlag==1){

$updateVenueQuery = "UPDATE venues
                     SET venue = '$updatedName', description = '$updatedDesc', maxcapacity = '$updatedCapacity'
                     WHERE id='$editid'";	

}else{
    
    move_uploaded_file($fileTemp,"gallery/$fileName");   
    
    $updateVenueQuery = "UPDATE venues
                         SET venue = '$updatedName', imgpath = '$fileName', description = '$updatedDesc', maxcapacity = '$updatedCapacity'
                         WHERE id = '$editID'";

}

$updateVenueResult = $conn->query($updateVenueQuery);

if (!$updateVenueResult) {
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
                    <li><a href="login.php"> Login </a></li>
                    
            
            </div>
			<!-- End of nav bar code -->
			
			</header>
        
    </head>
    
    <body>		
        <div id='container'>
            
            
                <?php
                    if($errorFlag==1){
                        
                        echo "<p>Venue Image not edited.
                                 Venue Name Update:<strong>$updatedName<strong><br>
                                 Description update:<strong>$updatedDesc<strong><br>
                                 Capacity Update:<strong>$updatedCapacity<strong>
                              </p>";
                        
                    }else{
                        
                        echo "<p><strong>Venue Updated Successfully<strong><br>
                                 Venue Name Update:<strong>$updatedName<strong></p>
                                     
                              <img src='gallery/$fileName' height='250px'/>
                                  
                              <p>Description update:<strong>$updatedDesc<strong><br>
                                 Capacity update:<strong>$updatedCapacity<strong>
                              </p>";
                        
		    }
                ?>
            
            
            
            
               
            
            
            
            
            
            
            
            
            
            
            <?php
                /*if (isset($_POST["updateVenue"])) {
    
                    move_uploaded_file($fileTemp, "gallery/$fileName"); 

                    $updateVenueQuery = "UPDATE venues
                                         SET venue = '$updatedName', imgpath = '$fileName', description = '$updatedDesc', maxcapacity = '$updatedCapacity'
                                         WHERE id = '$editID'";

                    $updateVenueResult = $conn -> query($updateVenueQuery);

                    if (!$updateVenueResult) {
                        echo $conn -> error;
                    }
                    
                    while($row = $updateVenueResult->fetch_assoc()){

                        $venueName = $row["venue"];
                        $venueImage = $row["imgpath"]; 
                        $venueDesc = $row["description"];
                        $venueCapacity = $row["maxcapacity"];

                        echo "<div class='box'> 
                                $venueName
                                <img src='gallery/$venueImage' height='250px'/>
                                Venue Capacity: $venueCapacity <br>
                                $venueDesc
                              </div>

                              <p><strong>Venue Updated Successfully<strong></p>";
                    }
                    
                }*/
            
                
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

