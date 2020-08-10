<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_db";
  $msg="";
  //if upload button is pressed
  if(isset($_POST['upload'])){
    // the path to store the uploaded image
    $target="sample/".basename($_FILES['image']['name']);
    //connect to the database
    $con=mysqli_connect("localhost","root","","social_db");

    // get all the submmitted data from the form
    $image=$_FILES['image']['name'];
    $text=$_POST['text'];

    $sql="INSERT INTO images (image, text) values('$image','$text')";
    mysqli_query($con, $sql);//stores the submitted data into the database table:images
    //now let's move the uploaded image into the folder sample

    if(move_uploaded_file($_FILES['image']['name'],$target )){
      $msg="Image uploaded successfully";
    }else{
      $msg="There was a problem uploading the image";
    }

  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="upload.css">
  <title>upload image</title></head>
<body>
<div id="content">
  <?php 
  $con=mysqli_connect("localhost","root","","social_db");
  $sql= "SELECT * FROM images";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result)){
  echo "<div id='img_div'>";
  echo "<img src='sample/".$row['image']."'>";
  echo "</div>"; 
}
  ?>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea name="text" cols="40" rows="4" placeholder="say something about this image........"></textarea></div>
      <div>
        <input type="submit" name="upload" value="upload image">
      </div>
</form>

</body>
</html>