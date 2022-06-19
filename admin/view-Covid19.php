<?php
    include '../checkLogin.php';
    include '../connect.php';
    $userid = $_POST['userid'];
    $sql="select * from `covid-19 patient` where Patient_ID=$userid";
    $result=mysqli_query($conn,$sql);
    if($result){
        $singleRow  = mysqli_fetch_assoc($result);
        if(isset($singleRow['Testkit_Result'])){
            $img_src = "data:".$singleRow['Mime'].";base64,".base64_encode($singleRow['Testkit_Result']);
        }
        else{
            $img_src = "../admin/images/no_image.jpg";
        }
        echo '<img src="'.$img_src.'" class="img-fluid mb-2">';
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
    
?>

