<?php
include '../connect.php';
include '../checkLogin.php';
if(isset($_GET['deleteResidentid'])){
    $SV_ID=$_GET['deleteResidentid'];

    $sql="delete from `resident` where Resident_svID=$SV_ID";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Deleted Successfully!");'; 
        echo 'window.location.href = "viewlist.php";';
        echo '</script>';
      
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_close($conn);
}
    
?>
