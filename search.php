<?php
include("logo.php");
    include("optionbar.php");
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
  $result="";
  $search_value="";
  if (isset($_POST['search'])) {
  //	$_SESSION['search']=$_POST['search'];
  $search_value=$_POST['search'];}
   $result = mysqli_query($db, "SELECT * FROM register
    WHERE username LIKE '%{$search_value}%'");
   if ($result === FALSE) { echo "Error"; } 

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
<title>Searched results</title>
</head>
<body bgcolor="#4CAF50"><form method="post" action="updateprofile.php">
  <center><h2>Availabe Users Are:</h2><h3>
<?php

while ($row = mysqli_fetch_array($result))
{

        echo'<h2>'.$row['username'].'</h2>';
        echo "<br>";
}
 ?></h3>
</body>
</html>
 
   
