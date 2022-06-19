<?php
include '../connect.php';
include '../checkLogin.php';
if(isset($_POST['delete'])){
    $SV_ID=$_POST['userid'];

    $sql="delete from `resident` where `Resident_svID`='$SV_ID'";echo "<script> console.log($SV_ID);</script>";
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
    
}
mysqli_close($conn);
?>
