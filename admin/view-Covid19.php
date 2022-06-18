<?php
    include '../admin/manage-register-account/connect.php';
    $userid = $_POST['userid'];
    $sql="select * from `covid-19 patient` where Patient_ID=$Patient_ID";
    $result=mysqli_query($conn,$sql);
    if($result){
        $singleRow  = mysqli_fetch_assoc($result);
        if(isset($singleRow['Testkit_Result'])){
            $img_src = "data:".$singleRow['Mime'].";base64,".base64_encode($singleRow['Testkit_Result']);
        }
        else{
            $img_src = "../admin/images/no_image.jpg";
        }
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
    while( $row = mysqli_fetch_array($result) ){
?>
<img src="<?php echo $img_src;?>" class="img-fluid mb-2">

<?php }?>