<?php

include("connect.php");

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO performer_upload_material(file,type,size) VALUES('$file','$file_type','$file_size')";
// mysql_query($sql); 
 $conn->query($sql) or die("query error ".$conn->error);
}
?>

<!DOCTYPE html>
<html>
    <meta http-equiv="refresh" content="0; URL='http://jpatterson62.web.eeecs.qub.ac.uk/GroupFestival/performershows.php'"/>
</html>
