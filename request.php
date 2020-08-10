<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>
<?PHP
// Create database connection
  $db = mysqli_connect("localhost", "root", "", "social_db");


$requesteeId=$_POST['username'];

mysqli_query("INSERT INTO requests (requestee, requester) VALUES ('".htmlspecialchars($requesteeId)."','".htmlspecialchars( $_SESSION['username'])."')"); 
echo "request Sent";

?>