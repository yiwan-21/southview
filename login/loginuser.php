<?php
session_start();

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
        $conn = mysqli_connect('localhost','root',"",'south view');
        //Selecting Database
        //$db = mysqli_select_db($conn, "test");
        //sql query to fetch information of registerd user and finds user match.
        $role = $_POST['role'];

        if ($role=="Administrator") {
            $result = mysqli_query($conn, "SELECT * FROM administrator WHERE Administrator_svID='$user' LIMIT 1");
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['Password'])){
                $_SESSION['login_user']=$row['Administrator_svID']; // Initializing Session
                header("location: ../admin/home.php"); // Redirecting To Other Page
            } else {
                #error = "Username of Password is Invalid";
                header('Location: login.php?error=User Name or Password is invalid');
            }
        }
        else {
            $result = mysqli_query($conn, "SELECT * FROM resident WHERE Resident_svID='$user' LIMIT 1");
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['Password'])){
                $_SESSION['login_user']=$row['Resident_svID']; // Initializing Session
                header("location: ../Homepage/indexHomepage.php"); // Redirecting To Other Page
            } else {
                header("Location: login.php?error=User Name or Password is invalid&hi=$pw&pw=$password");
            }
        }
        
        mysqli_close($conn); // Closing connection
    }
}
?>  