
<?php 
session_start();

 include("connect.php");

$username = $_POST["username"];
$password = $_POST["password"];
$usertype = $_POST["usertypes"];
 

 $checkuser = "SELECT * FROM users WHERE username='$username' AND password='$password' AND userType='$usertype'";
 
         
 $userresult = $conn->query($checkuser);
 
 if (!$userresult) {
    echo $conn->error;
}

$returnedrows = $userresult->num_rows;

if ($returnedrows > 0 && $usertype == 'Admin' ) {
 $_SESSION["admin_40267457"] = $username;  
header("Location: userhomepages/adminhomepage.php"); }

else if($returnedrows > 0 && $usertype == 'VenueManager'){
    $_SESSION["admin_40267457"] = $username;
    header("Location: userhomepages/venuemanagerhomepage.php");
}
else if ($returnedrows > 0 && $usertype == 'Performer'){
    $_SESSION["admin_40267457"] = $username;
     header("Location: userhomepages/performerhomepage.php");
 }
 
 else if ($returnedrows > 0 && $usertype == 'RegisteredUser'){
     $_SESSION["admin_40267457"] = $username;
     header("Location: userhomepages/registeredpublicuser.php");
 }
 else{
     
     header("Location: login.php");
     };

//  $row = $userresult->fetch(PDO::FETCH_ASSOC);
//
//  session_regenerate_id();
//  $_SESSION['sess_user_id'] = $row['id'];
//  $_SESSION['sess_username'] = $row['username'];
//        $_SESSION['sess_usertype'] = $row['userType'];
//
//        echo $_SESSION['sess_usertype'];
//  session_write_close();
//
//  if( $_SESSION['sess_usertype'] == "Admin"){
//  header('Location: adminhome.php'); }
//   
//   else if( $_SESSION['sess_usertype'] == "VenueManager"){
//       header('Location: venuemanagerhome.php');
//   }
//   else if($_SESSION['sess_usertype'] == "Performer"){
//       header('Location: performerhome.php');
//   }
//  else if($_SESSION['sess_usertype'] == "RegisteredUser"){
//   header('Location: registereduserhome.php');
//  };
// 
      
  
  
  
 


?>

