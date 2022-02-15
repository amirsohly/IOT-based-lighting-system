<!DOCTYPE html>
<html>
<head>
<title>IOT Records</title>
<link rel="icon" type="image/x-icon" href="iot.png">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "project";

$conn = mysqli_connect('localhost', 'root', '', 'iot');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		echo "<br> id: ". $row["user_id"]. "  /  Username : ". $row["username"]. "  /   E-mail : " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>