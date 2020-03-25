<?php

include("connections/conn.php");
?>



<html>
	<head>
        <title>Seven Festival</title>
   
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
         <link href="css/Reviews.css" rel="stylesheet" type="text/css">


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
            <h1>Reviews</h1>
            <div class="container text-center">
            <?php
$find_comments = $conn->query("SELECT * FROM  comments");
while($row = mysqli_fetch_assoc($find_comments))

{
	$comment_name = $row['name'];
	$comment= $row['comment'];

	echo "<p>$comment_name - $comment</p>";
}

if(isset($_GET['error']))
{
	echo "<p>100 Character Limit</p>";
}
?>
</div>


<form action="post_comments.php" method="POST">
    <p> Leave a Review on one of our Shows!</p>
	<div class="txtb">
        <br>
	<input type="text" name="name" placeholder="Your name"><br>
	<textarea name="comment" cols="50" rows"2">Enter a Comment</textarea><br>
	<select name="ShowID">
                            <option>Shows</option>
                            <?php
                                $getshowsQuery = "SELECT * FROM shows";
								 $getshowsResult = $conn -> query($getshowsQuery);

                                if (!$getshowsResult) {
                                    echo $conn -> error;
                                }

                                while ($row = $getshowsResult -> fetch_assoc()) {

                                    $showName = $row["show_name"];
                                    $showID = $row["id"];

                                    echo "<option value='$showID'>$showName</option>";
                                }
                                    ?>
                                </select>
	<input type="submit" value="Submit Review">


</form>
</div>
<br><br><br>
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
</html>
