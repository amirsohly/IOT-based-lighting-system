<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>IOT Sign up</title>
	<link rel="icon" type="image/x-icon" href="iot.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
	<div class="header" style="background-color:#04AA6D;">
		<h2>Sing up</h2>
	</div>

	<form method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label><b>Username</b></label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label><b>E-mail</b></label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label><b>Password</b></label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label><b>Confirm password</b></label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="button button" name="reg_user">Sign up</button>
		</div>
		<p style="color:green;"><b>
				Already have an account? <a href="login.php">Log in</a></b>
		</p>
		<br>
		<p ALIGN="center" style="font-family:nazanin;font-size:25px;">
			<!--<a href="home.php"><b>Homepage</b></a>-->
		</p>
	</form>
</body>

</html>