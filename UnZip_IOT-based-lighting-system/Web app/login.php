<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>IOT Log in</title>
<link rel="icon" type="image/x-icon" href="iot.png">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <div class="header" style="background-color:#04AA6D;">
  	<h2>Log in</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label><b>Username</b></label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label><b>Password</b></label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="button button" name="login_user">Log in</button>
  	</div>
  	<p style="color:green;"><b>
  		Don’t have an account? <a href="register.php">Sign up</a></b>
  	</p>
	<br>
	<p ALIGN="center" style="font-size:25px;">
  		<!--<a href="home.php"><b>Homepage</b></a>-->
  	</p>
	
  </form>
</body>
</html>