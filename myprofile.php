<?php
    include("logo.php");
    include("optionbar.php");
?>
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "social_db");
  $sql="";

   //$image= $_FILES['image']['name'];
   $user=$_SESSION['username'];
      //$image=$_SESSION['image'];
    //$target = "images/".basename($image);
    $result = mysqli_query($db, "SELECT * FROM register where username='$user'");
   

?>
<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}</style>
<title>My Profile</title>
</head>
<body bgcolor="#4CAF50"><form method="post" action="updateprofile.php">
  <center><h2>My Profile Picture is:</h2><h3>
<?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<img src='images/".$row['image']."' >";
        echo "<p> Username is ".$row['username']."</p>";
        echo "<p> Full-Name: ".$row['fullname']."</p>";
        echo "<p> Email: ".$row['email']."</p>";
        echo "<p> Gender: ".$row['gender']."</p>";
        echo "<p> Age: ".$row['age']."</p>";
    }
  ?></h3>
 <button type="submit" class="registerbtn">Update Your Profile</button></center>
</body>
</html>