<?php

include("connections/conn.php");

$selectedShow = $_GET["showID"];

$selectedShowQuery = "SELECT shows.id, shows.show_name, shows.date, shows.start_time, shows.end_time, shows.ticket_price, shows.image_path, shows.description, show_categories.category, venues.venue
                      FROM shows
                      INNER JOIN show_categories
                      ON shows.category_id = show_categories.id
                      INNER JOIN venues
                      ON shows.venue_id = venues.id
                      WHERE shows.id = $selectedShow";

$selectedShowResult = $conn -> query($selectedShowQuery);

if (!$selectedShowResult) {
    echo $conn -> error;
}

$performersQuery = "SELECT performer_details.performer_name, performer_details.performer_description, performances.start_time, performances.end_time
                    FROM performer_details
                    INNER JOIN performances
                    ON performer_details.id = performances.performer_id 
                    WHERE performances.show_id = $selectedShow";

$performersResult = $conn -> query($performersQuery);

if (!$performersResult) {
    echo $conn -> error;
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
                    <li><a href="venue.php"> Venue </a></li>
                    <li><a href="login.php"> Login </a></li>
                </ul>
            </div>
            </div>
            
            <div>
                <?php
                
                while ($row = $selectedShowResult -> fetch_assoc()) {
                    
                    $showID = $row["id"];
                    $showName = $row["show_name"];
                    $showDesc = $row["description"];
                    $showDate = $row["date"];
                    $startTime = $row["start_time"];
                    $endTime = $row["end_time"];
                    $showPrice = $row["ticket_price"];
                    $showImage = $row["image_path"];
                    $showCategory = $row["category"];
                    $showVenue = $row["venue"];
                    
                    echo "<div class='box'>
                            <img src='$showImage' height='250px'>
                          </div>
                          <div class='box'>
                            $showName
                            Category: $showCategory Venue: $showVenue <br>
                            Date: $showDate <br>
                            Begins: $startTime Ends: $endTime <br>
                            Ticket Price: £$showPrice <br>
                          </div>";
                }
                
                while ($row2 = $performersResult -> fetch_assoc()) {
                    
                    $performerName = $row2["performer_name"];
                    $performerDesc = $row2["performer_description"];
                    $performerStartTime = $row2["start_time"];
                    $performerEndTime = $row2["end_time"];
                    
                    echo "<div class='box'>
                            $performerName <br>
                            $performerDesc <br>
                            $performerStartTime - $performerEndTime
                          </div>";
                }
                
                ?>
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
