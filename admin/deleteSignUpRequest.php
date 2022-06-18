<?php
include 'connect.php';
if(isset($_GET['deleteSignUpRequestid'])){
    $id=$_GET['deleteSignUpRequestid'];

    $sql="delete from `resident_signup` where signup_ID=$id";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Deleted Successfully!");'; 
        echo 'window.location.href = "viewsignup.php";';
        echo '</script>';
      
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
