<?php

include("connections/conn.php");


$name = $_POST["name"];
$comment = $_POST["comment"];
$showid = $_POST["ShowID"];

$comment_length = strlen($comment);
if($comment_length > 100)
{
	header("location: Reviews.php?error=1");
}
else
{
	$query =$conn->query("INSERT INTO comments( name, comment, showid) VALUES('$name','$comment','$showid')");
	header("location: Reviews.php");
}
?>