<html>
<head>
	<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {background: #f1f1f1;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body bgcolor="#4CAF50">
  <div style="background-color:lightblue">
    <ul class="horizontal">
          <li><a style="text-decoration: none;" href="home.php" class="active">Home</a></li>
          <li><a style="text-decoration: none;"  href="myprofile.php">My Profile</a></li>
          <li><a href="messages.php" style="text-decoration: none;">Public Messages</a></li>
          <li><a href="setting.php" style="text-decoration: none;">Setting</a></li>
           <li><a href="userprof.php" style="text-decoration: none;">All User's Profile</a></li>
          <li><a href="logout.php" style="text-decoration: none;">LogOut</a></li>
        </ul>

</div><form class="example" action="search.php" method="post">
  <input type="text" placeholder="Search for available users of fotogram...." name="search">
  <input type="submit" value="Click to search">
  
</form>
</body>
</html>