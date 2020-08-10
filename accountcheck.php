<?php

// Inialize session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_db";

if(isset($_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$con=mysqli_connect("localhost","root","","social_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$qz = "SELECT * FROM register where username='".$username."' and password='".$password."'" ; 
$qz = str_replace("\'","",$qz); 
$result = mysqli_query($con,$qz);
$row = mysqli_num_rows($result);
if($row == 1)
  {// Set username session variable
$_SESSION['username'] = $_POST['username'];
$_SESSION['id']=$_POST['id'];
  header("location:home.php");
  }
  else
  {
  	echo "username and password didn't match!";
  }
mysqli_close($con);
}
?>