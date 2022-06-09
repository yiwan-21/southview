<?php
session_start();
$_SESSION["svid"] = $_POST["svid"];
$_SESSION["password"] = $_POST["password"];
if(isset($_SESSION["svid"])) {
    echo "<script>console.log('Session svid: " . $_SESSION["svid"] . "' );</script>";
}
if(isset($_SESSION["password"])) {
    echo "<script>console.log('Session password: " . $_SESSION["password"] . "' );</script>";
}

echo "<script>console.log('hi' );</script>";

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
    if(empty($_POST['svid']) || empty($_POST['password'])){
        $error = "Username or Password is Invalid";
    }
    else
    {
        //Define $user and $pass
        $user=$_POST['svid'];
        $password=$_POST['password'];
        //Establishing Connection with server by passing server_name, user_id and pass as a patameter
        $conn = mysqli_connect('localhost','root',"",'south view',3325);
        //Selecting Database
        //$db = mysqli_select_db($conn, "test");
        //sql query to fetch information of registerd user and finds user match.
        
        
        $role = $_POST['role'];


        if ($role=="Administrator"){
            $query = mysqli_query($conn, "SELECT * FROM administrator WHERE Password='$password' AND Administrator_svID='$user'");
            $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: ../admin/home.html"); // Redirecting to other page
        }
        else
        {
            $error = "Username of Password is Invalid";
        }
        }else{
            $query = mysqli_query($conn, "SELECT * FROM resident WHERE Password='$password' AND Resident_svID='$user'");
            $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: ../Homepage/indexHomepage.php"); // Redirecting to other page
        }
        else
        {
            $error = "Username of Password is Invalid";
        }
        }
        
        mysqli_close($conn); // Closing connection
    }
}
?>  `