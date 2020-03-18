<?php


$conn = new mysqli("jpatterson62.web.eeecs.qub.ac.uk", "jpatterson62", "dmYPRgkMVRCbQyQ7", "jpatterson62");

if($conn->connect_errno){echo "Failed to connect to my database".$conn->connect_error;
}

$readquery = "SELECT * FROM users";
$result = $conn ->query($readquery);

if(!$result){
    echo $conn->error;
}

