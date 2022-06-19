<?php
session_start();
$_SESSION['svid']=220002;
include '../connect.php';
include '../checkLogin.php';
if(isset($_POST['delete'])){
    $Resident_svID = $_SESSION['svid'];
    
    $result = mysqli_query($conn, "DELETE FROM resident WHERE Resident_svID=$Resident_svID");

    mysqli_close($conn);

    header("Location: http://localhost:8000/login/login.php");

}
mysqli_close($conn);
?>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>South View</title>
        <link rel="icon" href="../southview_payment/images/Logo SV.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../southview_profile/profile.css"> 
    </head>
    <style>
        <?php
        include "../southview_profile/profile.css";
        ?>
</style>
<body>
    <!-- nav bar -->
    <script src="/navigation/navigation.js"></script>
    <?php
        include '../connect.php';
        $sql = "SELECT * FROM resident WHERE Resident_svID='" .  $_SESSION['svid'] . "'"; 
        $result=mysqli_query($conn, $sql);

        $singleRow  = mysqli_fetch_assoc($result);
         mysqli_close($conn);
    ?>
    
    <div class=" profile-area">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="img1"><img src="/southview_payment/images/563adbeb015fb165c4145a28a6c2e4c8.jpg">
                        </div>
                        <!-- <div class="img3"> -->
						<div class="profile-pic-div">	
                            <!-- <label for="file"> -->
                               <?php    
                               if (empty($singleRow['Profile_Picture'])&& empty($singleRow['mime'])){
                                    echo "<img src='image.jpg' id='photo'>";
                               }else{
                                    echo "<img src= 'data:".$singleRow['mime'].";base64,".base64_encode($singleRow['Profile_Picture'])."' id='photo' style='cursor:default;'>" ;
                               }
                                ?>
                        </div>
                        <div class="card mx-3 mb-3">
                            <div class="row">
                                <div class="col table-style mx-5 my-5">
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2 "></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>NAME</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Name']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2 "></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>SV-ID</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Resident_svID']; ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2 "></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>GENDER</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Gender']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2" o></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>AGE</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Age']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2"></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>IC NO/Passport NO</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['IC_No/Passport_No']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2"></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>PHONE NO</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo "0".$singleRow['Phone_No']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2"></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>E-Mail</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Email']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2"></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>UNIT</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Unit']; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1 col-sm-1 col-md-2 col-lg-2"></div>
                                        <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                            <strong>VEHICLE NO</strong>
                                        </div>
                                        <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                            <strong>:</strong>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
                                        <?php echo $singleRow['Vehicle_No']; ?>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center mb-4">
                                        <button type="button" class="btn" id="btn-setting">
                                            <?php
                                                echo "<a href=\"profile2.php\">Edit Profile</a>";
                                            ?>
                                        </button>  
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center mb-4"><a
                                                href="#popup"><button type="button" class="btn" id="btn-setting"
                                                    style="background-color: red">Delete Account</button></a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-3 col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <!-- footer -->
                <script type="text/javascript" src="../southview_profile/profile.js"></script>
            </div>
        </div>
    </div>
    <div class="overlay" id="popup">
        <div class="wrapper white-background">
            <h3 class="text-center">Delete Account Confirmation</h3><a class="close" href="#">&times;</a>
            <div class="content">
                <div class="container text-center">
                    <form name="form2" method="post" action="profile1.php">
                        <p>Are you sure you want to delete this item?</p>
                        <div class="row text-center">
                            <div class="col-12 col-sm-9 col-md-10 col-lg-11">
                                <input type="checkbox" required>
                                <label>Your account will be permanently delete.</label>
                            </div>
                        </div>
                        <button type="submit" name= "delete" value="delete" class="btn btn mt-3 btn-delete" id="btn-setting">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/southview_profile/profile.js"></script>
</body>

</html>
