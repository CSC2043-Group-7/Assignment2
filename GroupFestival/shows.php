<?php
include("connections/conn.php");

$allShowsQuery = "SELECT shows.id, shows.show_name, shows.date, shows.start_time, shows.end_time, shows.ticket_price, show_categories.category, venues.venue
                  FROM shows
                  INNER JOIN show_categories
                  ON shows.category_id = show_categories.id
                  INNER JOIN venues
                  ON shows.venue_id = venues.id";

$allShowsResult = $conn -> query($allShowsQuery);

if (!$allShowsResult) {
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
                    <li class='active'><a href="shows.php"> Shows </a></li>
                    <li><a href="venue.php"> Venue </a></li>
                    <li><a href="login.php"> Login </a></li>
                </ul>    
            
            </div>
            </div>
            
            <!-- Start of dropdown code -->
            <div>
                <form method="POST" action="shows.php">
                    <div>

                        <p>
                        <label class="p">Category</label>
                        <select name="category">
                            <option>All Shows</option>
                            <?php
                                $getCategoriesQuery = "SELECT * FROM show_categories";

                                $getCategoriesResult = $conn -> query($getCategoriesQuery);

                                if (!$getCategoriesResult) {
                                    echo $conn -> error;
                                }

                                while ($row = $getCategoriesResult -> fetch_assoc()) {

                                    $categoryName = $row["category"];
                                    $categoryID = $row["id"];

                                    echo "<option value='$categoryID'>$categoryName</option>";
                                    
                                }
                            ?>
                        </select>

                        <label class="p">Venue</label>
                        <select name="venue">
                            <option>All Venues</option>
                            <?php
                                $getVenuesQuery = "SELECT * FROM venues";

                                $getVenuesResult = $conn -> query($getVenuesQuery);

                                if (!$getVenuesResult) {
                                    echo $conn -> error;
                                }

                                while ($row2 = $getVenuesResult -> fetch_assoc()) {

                                    $venueName = $row2["venue"];
                                    $venueID = $row2["id"];

                                    echo "<option value='$venueID'>$venueName</option>";
                                    
                                } 
                            ?>
                        </select>

                        <input type="submit" value="GO" name="searchevents">
                        </p>

                    </div>    

                </form>
            </div>
            <!-- End of dropdown code -->
            
            <!-- Start of body code -->
            <div id="container">
                
                
                <?php
                
                    if (!isset($_POST["searchevents"] )) {
                        
                        while ($row3 = $allShowsResult -> fetch_assoc()) {
                            
                            $showID = $row3["id"];
                            $showName = $row3["show_name"];
                            $showDate = $row3["date"];
                            $startTime = $row3["start_time"];
                            $endTime = $row3["end_time"];
                            $showPrice = $row3["ticket_price"];
                            $showCategory = $row3["category"];
                            $showVenue = $row3["venue"];
                            
                            echo "<a href='lineup.php?showID=$showID'>
                                    <div class='box'>
                                        $showName
                                        Category: $showCategory Venue: $showVenue <br>
                                        Date: $showDate <br>
                                        Begins: $startTime Ends: $endTime <br>
                                        Ticket Price: £$showPrice <br>
                                    </div>
                                  </a>";
                        }
                    } else if (isset($_POST["searchevents"]) && $_POST["category"] && $_POST["venue"]) {
                        
                        $whereClause = "";
                        
                        $category = $_POST["category"]; 
                        if ($category == "All Shows") {
                            $category = "";
                        } else {
                            $whereClause .= "WHERE show_categories.id = '$category'";
                        }
                        
                        $venue = $_POST["venue"];
                        if ($venue == "All Venues") {
                            $venue = "";
                        } else {
                            if( $whereClause == null || $whereClause=="") {
                                $whereClause .= "WHERE venues.id = '$venue'";
                            } else {
                                $whereClause .= "AND venues.id = '$venue'";
                            }
                        }
                        
                            $selectShowQuery = "SELECT shows.id, shows.show_name, shows.date, shows.start_time, shows.end_time, shows.ticket_price, show_categories.category, venues.venue
                                                FROM shows
                                                INNER JOIN show_categories
                                                ON shows.category_id = show_categories.id
                                                INNER JOIN venues
                                                ON shows.venue_id = venues.id
                                                ";

                            $selectShowQuery .= $whereClause;
                            
                            $selectShowResult = $conn -> query($selectShowQuery);

                            if (!$selectShowResult) {
                                echo $conn -> error;
                            }

                            while ($row4 = $selectShowResult -> fetch_assoc()) {

                                $showID = $row4["id"];
                                $showName = $row4["show_name"];
                                $showDate = $row4["date"];
                                $startTime = $row4["start_time"];
                                $endTime = $row4["end_time"];
                                $showPrice = $row4["ticket_price"];
                                $showCategory = $row4["category"];
                                $showVenue = $row4["venue"];

                            echo "<a href='lineup.php?showID=$showID'>
                                    <div class='box'>
                                        $showName
                                        Category: $showCategory Venue: $showVenue <br>
                                        Date: $showDate <br>
                                        Begins: $startTime Ends: $endTime <br>
                                        Ticket Price: £$showPrice <br>
                                    </div>
                                  </a>";
                            }
                        }
                        
                ?>
            </div>
            <!-- End of body code -->
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