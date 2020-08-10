<?php

// Inialize session
session_start();
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}
?>
<?php
	$con=mysqli_connect("localhost","root","","social_db");
if(isset($_POST['update1']))
{$cpassword=$_POST['cpassword'];
$password = $_POST['password'];
 $user=$_SESSION['username'];
 if ($_POST["password"] == $_POST["cpassword"]) {
  $update= "UPDATE register set   password = '$password'where username='$user'";
            
            if ($con->query($update) === TRUE) {
            	header('location:login.php');
            }else
            {echo "error";
        }}else{
        	echo "password didn't match";
        }
        }

        ?>