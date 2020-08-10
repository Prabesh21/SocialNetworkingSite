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
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $sql="";
    // Get image name
     $image= $_FILES['image']['name'];
    //Get image file type
    $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    // get date and time
    $date = new DateTime('now', new DateTimeZone("Asia/Kathmandu"));
            $datetime=$date->format('Y-m-d h:i:s');
     $user=$_SESSION['username'];
   
     // image file directory
            $target = "images/".basename($image);
            // if imagetype is correct or not image not selected
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Error! (no file is selected or the selected file is not an image.)";
            $uploadOk = 0;
        }
        else{
            
    
      $sql = "INSERT INTO images (image, image_text,date,username) VALUES ('$image', '$image_text','$datetime','$user')";
          // execute query
          mysqli_query($db, $sql);

        }
      }
        $result = mysqli_query($db, "SELECT * FROM images ");
?>
<!DOCTYPE html>
<html>
<head>
<title>home</title>
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #4CAF50;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #4CAF50;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
   #text{
  background-color:#4CAF50;
  border:1px solid #4CAF50;
} 
</style>
</head>
<body bgcolor="#4CAF50">
  
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['image_text']."</p>";
        echo "<p> uploaded on ".$row['date']."</p>";
        echo "<p>uploaded by ".$row['username']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="home.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
        <button type="submit" name="upload" style="background-color: #4CAF50">POST</button>
    </div>
  </form>
</div>
</body>
</html>