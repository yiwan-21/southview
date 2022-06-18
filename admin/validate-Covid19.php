<?php
include 'connect.php';
$Patient_ID=$_GET['validateCovid19id'];
$sql="select * from `covid-19 patient` where Patient_ID=$Patient_ID";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$validate_status=$row['Validate_Status'];




if(isset($_GET['validateCovid19id'])){
    $Patient_ID=$_GET['validateCovid19id'];

    $sql="update `covid-19 patient` set `Validate_Status`='1' where Patient_ID=$Patient_ID";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Validated Successfully!");'; 
        echo 'window.location.href = "manage-Covid19.php";';
        echo '</script>';
      
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}

?>

