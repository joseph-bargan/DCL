<?php
$servername = "localhost";
$username = "root";
$password = "Test123";
$dbname = "dcl1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];

$sql = "INSERT INTO users (name, password, email)
VALUES ('$name', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New User Regisered! <br>";
  echo "Welcome $name <br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "You will now be redirected back to the homepage";

header( "refresh:10;url=index.html" );
?> 