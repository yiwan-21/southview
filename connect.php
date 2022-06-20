<?php
    $dbhost = "localhost";
    $database = "south view";
    $dbuser = "root";
    $dbpass = "";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database);

    // mysqli_connect_errno returns the last error code
    if ( mysqli_connect_errno() ) {
        echo "<script>console.log('connection failed: " . mysqli_get_host_info($conn) . "');</script>";
        die( mysqli_connect_error() ); 
    }
    // echo "<script>console.log('" . mysqli_get_host_info($conn) . "');</script>";

?>