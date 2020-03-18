<?php
session_start();
include("connect.php");
print_r($_POST);

//get form data from edit line up 

//Day1
$newname[0] = $conn->real_escape_string($_POST['performername']);
$newcategory[0] = $conn->real_escape_string($_POST['category']);
$newdescription[0] = $conn->real_escape_string($_POST['description']);
$newusername[0] = $conn->real_escape_string($_POST['username']);
$newemail[0] = $conn->real_escape_string($_POST['email']);


$queryname= "UPDATE performer_details SET performer_name = '$newname[0]'";
$conn->query($queryname) or die("query error ".$conn->error);

$querycategory = "UPDATE performer_details SET performance_category  = '$newcategory[0]'";
$conn->query($querycategory) or die("query error ".$conn->error);

$querydescription= "UPDATE performer_details SET performance_description = '$newdescription[0]' ";
$conn->query($querydescription) or die("query error ".$conn->error);



$queryusername = "UPDATE performer_details SET username  = '$newusername[0]'";
$conn->query($queryusername) or die("query error ".$conn->error);


$queryemail = "UPDATE performer_details SET email_address  = '$newemail[0]'";
$conn->query($queryemail) or die("query error ".$conn->error);



?>


<!DOCTYPE html>
<html>
    <meta http-equiv="refresh" content="0; URL='http://jpatterson62.web.eeecs.qub.ac.uk/GroupFestival/userhomepages/performerhomepage.php'"/>
</html>

