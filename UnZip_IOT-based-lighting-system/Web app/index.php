<?php 
  session_start(); 
  $db = mysqli_connect('localhost', 'root', '', 'iot');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['user_id']);
	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<title>IOT</title>
<link rel="icon" type="image/x-icon" href="iot.png">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<div class="header">
	<h2>Congraduation</h2>
</div>
	
<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p ALIGN="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong><br>

	<!--<a href="home.php"><button class="button button"><b>Homepage</b></button></a>-->
	<a href="index.php?logout='1'"><button class="button button2"><b>Sign out</b></button></a>

    	<a href="index.php?logout='1'" style="color: red;">Sign out</a></p>
    <?php endif ?>
</div>

</body>
</html>