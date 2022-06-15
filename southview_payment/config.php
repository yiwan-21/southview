<?php
$databaseHost = 'localhost';
$databaseName = 'south_view';
$databaseUsername = 'user1';
$databasePassword = 'user1abc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ( mysqli_connect_errno() ) {
	// die() is equivalent to exit()
	// die( "Database connection failed: " . mysqli_connect_error() );
} 

// echo "Database connected successfully <br>";

?>