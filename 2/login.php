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

$sql = "SELECT * FROM users WHERE name = '$name' &&  password = '$password' ";


$query = mysqli_query($conn, $sql);
$result_count = mysqli_num_rows($query);

if ($result_count > 0) {
  echo "Welcome Back $name <br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "You will now be redirected back to the homepage";

header( "refresh:10;url=index.html" );
?> 