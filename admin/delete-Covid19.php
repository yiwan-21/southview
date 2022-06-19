<?php
include '../connect.php';
include '../checkLogin.php';
if(isset($_POST['delete'])){
    $Patient_ID=$_POST['userid'];

    $sql="delete from `covid-19 patient` where Patient_ID=$Patient_ID";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Deleted Successfully!");'; 
        echo 'window.location.href = "manage-Covid19.php";';
        echo '</script>';
      
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}
mysqli_close($conn);
?>
