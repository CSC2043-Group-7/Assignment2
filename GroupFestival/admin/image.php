<?php
  include('../connections/conn.php');

  //get image to edit
  $theid=$_GET['id'];

  //only select one row using the id value passed in the URL
  $queryimage = "SELECT * FROM galleryimages WHERE id='$theid'";

  $result2 = $conn->query($queryimage);

   if(!$result2){
        echo $conn -> error;
    }

   while($row2 = mysqli_fetch_assoc($result2)){

       $galimg = $row2["imgname"];
	   
	   $galdes = $row2["imgdescript"];    
 
    }
?>


<html>
    <head>
        <title>Seven Festival</title>
   
        
        <link href="../css/venue.css" rel="stylesheet" type="text/css">
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
                    <img src='../img/Sevenlogo.png'> 
                </div>
                <ul class="main-nav">
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="shows.php"> Shows </a></li>
                    <li class='active'><a href="venue.php"> Venue </a></li>
                    <li><a href="login.php"> Login </a></li>
                    
            
            </div>
			<!-- End of nav bar code -->
			
			 <div id='container'>
		<h3>Edit title background image</h3> 
		 
			<div class="box edit">
				<form enctype="multipart/form-data" action="processimage.php" method="POST"> 
				
				<img src="../gallery/<?php echo $galimg; ?>" width='75%' />

					</br>
					<label for="frontimg"> Select a file </label>
					
					<input type="hidden" value="<?php echo $theid;?>" name="changeid"/>
					
					<input name="newimg" type="file" />
					</br>
					<p>Description:
					<textarea name="txtdescript" rows ="2"cols="5"><?php echo $galdes; ?> </textarea>
					</p>
					<div id='sub'><input  name="submit" type="submit" value="update image"/></div>
				</form>	
			</div>
			
        </div>
		
		
		
		</header>
        
        
    

        
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