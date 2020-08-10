<?php

// Inialize session
session_start();
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}
?>
<?php
	$con=mysqli_connect("localhost","root","","social_db");
if(isset($_POST['update']))
{
$fullname = $_POST['fullname'];
 $user=$_SESSION['username'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$image= $_FILES['image']['name'];
 $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
       echo "Error! (no file is selected or the selected file is not an image.)";
          $uploadOk = 0;
       }
        else{ 
            $update= "UPDATE register set   fullname = '$fullname', gender='$gender', age='$age', email='$email', image='$image' where username='$user'";
           // $run=mysqli_query($con,$update);
            
            if ($con->query($update) === TRUE) {
            	header('location:myprofile.php');
            }else
            {echo "error";
        }
        }}

        ?>