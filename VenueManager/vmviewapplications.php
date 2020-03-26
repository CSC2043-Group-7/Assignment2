<?php

include("connections/conn.php");

$selectedApplication = $_GET["applicationID"];

$selectedApplicationsQuery = "SELECT applications.id, applications.name, applications.description, applications.date, applications.runtime, 
                              applications.availabletickets, applications.ticketprice, applications.imgpath, show_categories.category, 
                              applications.categoryID, venues.venue, applications.venueID
                              FROM applications
                              INNER JOIN show_categories
                              ON applications.categoryID = show_categories.id
                              INNER JOIN venues
                              ON applications.venueID = venues.id
                              WHERE applications.id = $selectedApplication";

$selectedApplicationsResult = $conn -> query($selectedApplicationsQuery);

if (!$selectedApplicationsResult) {
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
        <script src="js/JavaScript.js"></script>
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
                        
                        while ($row = $selectedApplicationsResult->fetch_assoc()) {

                            $showName = $row["name"]; 
                            $showDesc = $row["description"];
                            $showDate = $row["date"];
                            $showRunTime = $row["runtime"];
                            $availableTickets = $row["availabletickets"];
                            $ticketPrice = $row["ticketprice"];
                            $showImage = $row["imgpath"];
                            $showCategory = $row["category"];
                            $showCategoryID = $row["categoryID"];
                            $showVenue = $row["venue"];
                            $showVenueID = $row["venueID"];        
                            
                            echo "<form action='vmviewapplications.php?applicationID=$selectedApplication' method='POST' enctype='multipart/form-data'>
                                    $showName <br>
                                    Category: $showCategory <br>
                                    <img src='gallery/$showImage' height='250px'/> <br>
                                    $showDesc <br>
                                    Ticket Price: £$ticketPrice <br> 
                                    Tickets Available: $availableTickets <br>

                                    <div id='buttons'>
                                        <input type='submit' value='Approve Application' name='approveApplication' onclick='hideButton()'/>
                                        <input type='submit' value='Decline Application' name='declineApplication' onclick='hideButton()'/>
                                    </div>
                                  </form>";
                               
                        }
                        
                        if (isset($_POST["approveApplication"])) {
                            
                            $approveApplicationQuery = "INSERT INTO shows (image_path, show_name, description, date, run_time, ticket_price, category_id, venue_id)
                                                        VALUES ('$showImage', '$showName', '$showDesc', '$showDate', '$showRunTime', '$ticketPrice', '$showCategoryID', '$showVenueID')";
                            
                            $approveApplicationResult = $conn -> query($approveApplicationQuery);
                            
                            if (!$approveApplicationResult) {
                                echo $conn -> error;
                            } 
                            
                            $deleteApplicationQuery = "DELETE FROM applications WHERE id = $selectedApplication";
                            
                            $deleteApplicationResult = $conn -> query($deleteApplicationQuery);
                            
                            if (!$deleteApplicationResult) {
                                echo $conn -> error;
                            } else {
                                echo "<p>This application has been approved.<p/>";
                            }
                            
                        } else if (isset($_POST["declineApplication"])) {
                            
                            $declineApplicationQuery = "DELETE FROM applications WHERE id = $selectedApplication";
                            
                            $declineApplicationResult = $conn -> query($declineApplicationQuery);
                            
                            if (!$declineApplicationResult) {
                                echo $conn -> error;
                            } else {
                                echo "<p>This application has been declined.<p/>";
                            }
                        }
                        
                    ?>
                
            </form>
            
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
