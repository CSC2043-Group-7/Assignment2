<?php 
session_start();

include("connect.php");

print_r($_POST);

$announcmenttitle = $conn->real_escape_string($_POST['announcmenttitle']);
$announcment = $conn->real_escape_string($_POST['announcement']);

$queryannouncment= "INSERT INTO  `announcements` (title , announcement)
VALUES ('$announcmenttitle' , '$announcment');";

$conn->query($queryannouncment) or die("query error ".$conn->error);
?>

<html> 
    <meta http-equiv="refresh" content="0; URL='http://jpatterson62.web.eeecs.qub.ac.uk/GroupFestival/userhomepages/performerhomepage.php'"/>
    
</html>
