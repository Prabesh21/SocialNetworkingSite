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
  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}



/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
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
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
 	<title>Setting</title>
 </head>
 <body>
 	<form action="changepw.php" method="post" name="myform"> 
    <div class="container">
    <h1>Update Password </h1>
    <hr>
      <br>
    <label for="password"><b>New Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label for="cpassword"><b>Confirm New Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpassword" required>
    <hr>
    <button type="submit" class="registerbtn" name="update1">Update</button>
  </div>
  
  <div class="container signin">
    <p><a href="myprofile.php">Cancel?</a>.</p>
  </div>
  		
</form>
 </body>
 </html>