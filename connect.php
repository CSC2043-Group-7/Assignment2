<?php

include("errorson.php");


//connect to the local MySQL database using PHP

$conn = new mysqli("jpatterson62.hosting.eeecs.qub.ac.uk", "jpatterson62", "dmYPRgkMVRCbQyQ7", "csc2043Group0720");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

        
