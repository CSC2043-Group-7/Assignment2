<?php
//include password
include("password.php");
//declare MySQL username
$user = "";
//declare webserver
$webserver = "";
$db = "csc2043Group0720";

//mysqli api library in PHP to connect to the DB
$conn = new mysqli($webserver, $user, $password, $db);

if($conn->connect_errno){
    echo ("Connection failed: " . $conn->connect_error() );
}
