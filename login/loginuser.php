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
        $conn = mysqli_connect('localhost','root',"",'south view',3325);
        //Selecting Database
        //$db = mysqli_select_db($conn, "test");
        //sql query to fetch information of registerd user and finds user match.
        
        
        $role = $_POST['role'];


        if ($role=="Administrator"){
            $query = mysqli_query($conn, "SELECT * FROM administrator WHERE Administrator_svID='$user' LIMIT 1");
            $rows = mysqli_fetch_assoc($query);
            $pw = $rows['Password'];
            
            $verify = password_verify($password, $pw)                                                                                                                                                                                           ;
            
            
            if($verify){
                $_SESSION["svid"] = $user;
                header("Location: ../admin/home.php"); // Redirecting to other page
            }
            else{
                #error = "Username of Password is Invalid";
                header('Location: login.php?error=User Name or Password is invalid');
            }
        }else{
            $query = mysqli_query($conn, "SELECT * FROM resident WHERE Resident_svID='$user' LIMIT 1");
            $rows = mysqli_fetch_assoc($query);
            $pw = $rows['Password'];
            
            
            $verify = password_verify($password, $pw);
            if($verify){
                $_SESSION["svid"] = $user;
                header("Location: ../Homepage/indexHomepage.php"); // Redirecting to other page
            }
            else{
                header("Location: login.php?error=User Name or Password is invalid");
            }
        }
        
        mysqli_close($conn); // Closing connection
    }
}
?>  