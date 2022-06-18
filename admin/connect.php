<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "south view";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3325);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>