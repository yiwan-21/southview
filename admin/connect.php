<?php
$servername = "localhost";
$username = "root";
$password = "";
<<<<<<< HEAD
$dbname = "south view";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3325);
=======
$dbname = "south_view_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
>>>>>>> main
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>