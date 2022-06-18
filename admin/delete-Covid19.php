<?php
include 'connect.php';
if(isset($_GET['deleteCovid19id'])){
    $Patient_ID=$_GET['deleteCovid19id'];

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

?>
