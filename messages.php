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
  if (isset($_POST['upload'])) {
    $sql="";
     // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
     // get date and time
    $date = new DateTime('now', new DateTimeZone("Asia/Kathmandu"));
            $datetime=$date->format('Y-m-d h:i:s');
     $user=$_SESSION['username'];
     if( empty($image_text)) {
          echo "No message to post";
            $uploadOk = 0;
        }
        else{
            
    
      $sql = "INSERT INTO messages (image_text,date,username) VALUES ('$image_text','$datetime','$user')";
          // execute query
          mysqli_query($db, $sql);

        }
      }
        $result = mysqli_query($db, "SELECT * FROM messages ");
  ?>
  <!DOCTYPE html>
<html>
<head>
<title>Public Messages</title>
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
	<center><h1>Messages So far..</h1></center>
	<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<p>".$row['image_text']."</p>";
        echo "<p>messaged on ".$row['date']."</p>";
        echo "<p>messaged by ".$row['username']."</p>";
      echo "</div>";
    }
  ?>
	<form method="POST" action="messages.php">
    <input type="hidden" name="size" value="1000000">
    <div>
      <textarea
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="start public chat"></textarea>
    </div>
    <div>
        <button type="submit" name="upload" style="background-color: #4CAF50">POST</button>
    </div>
  </form>
  </div>
</body>
</html>