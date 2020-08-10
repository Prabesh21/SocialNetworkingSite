<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "social_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password= mysqli_real_escape_string($link, $_REQUEST['password']); 
$cpassword= mysqli_real_escape_string($link, $_REQUEST['cpassword']); 
$fullname = mysqli_real_escape_string($link, $_REQUEST['fullname']);
$email= mysqli_real_escape_string($link, $_REQUEST['email']); 
$gender= mysqli_real_escape_string($link, $_REQUEST['gender']); 
$age= mysqli_real_escape_string($link, $_REQUEST['age']); 
$pic ="";
$target = "images/";
$target = $target . basename( $_FILES['image']['name']);
//This gets all the other information from the form 
$pic = ($_FILES['image']['name']); 

if ($_POST["password"] == $_POST["cpassword"]) {
// Attempt insert query execution
$sql = "INSERT INTO register (username, password,fullname,email,gender,age,image) VALUES ('$username', '$password','$fullname','$email','$gender','$age','$pic')";
if(mysqli_query($link, $sql)){
    echo "user created";
} 
else{
    echo "username already exists";
  }
}
else
{
  echo "password didn't match";
}

 
// Close connection
mysqli_close($link);
?>