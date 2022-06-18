<?php

session_start();

$_SESSION["svid"] = $_POST["svid"];
// if (isset($_SESSION["svid"])) {
//     echo "<script>console.log('Session svid: " . $_SESSION["svid"] . "' );</script>";
// }

$host = "localhost";
$database = "south view";
$user = "root";
$pass = "";
$conn = mysqli_connect($host, $user, $pass, $database);

// mysqli_connect_errno returns the last error code
if (mysqli_connect_errno()) {
    echo "<script>console.log('connection failed: " . mysqli_get_host_info($conn) . "');</script>";
    die(mysqli_connect_error());
}

$error = ''; //Variable to Store error message;
if (isset($_POST['submit'])) {
    if (empty($_POST['svid']) || empty($_POST['password'])) {
        $error = "Username or Password is Invalid";
    } else {
        //Define $user and $pass
        $user = $_POST['svid'];
        $password = $_POST['password'];
        //Establishing Connection with server by passing server_name, user_id and pass as a patameter
        // $conn = mysqli_connect('localhost','root',"",'south view',3325);
        //Selecting Database
        //$db = mysqli_select_db($conn, "test");
        //sql query to fetch information of registerd user and finds user match.


        $role = $_POST['role'];


        if ($role == "Administrator") {
            $query = mysqli_query($conn, "SELECT * FROM administrator WHERE Password='$password' AND Administrator_svID='$user'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1) {
                header("Location: ../admin/home.php"); // Redirecting to other page
            } else {
                $error = "Username of Password is Invalid";
            }
        } else {
            $query = mysqli_query($conn, "SELECT * FROM resident WHERE Password='$password' AND Resident_svID='$user'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1) {
                header("Location: ../Homepage/indexHomepage.php"); // Redirecting to other page
            } else {
                $error = "Username of Password is Invalid";
            }
        }

        mysqli_close($conn); // Closing connection
    }
}
?> `