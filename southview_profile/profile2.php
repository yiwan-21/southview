<?php
    include 'config.php'; 
	session_start();

    if(isset($_POST['update'])){
        $age = mysqli_real_escape_string($mysqli, $_POST['age']);
        $phoneNo = mysqli_real_escape_string($mysqli, $_POST['phoneno']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        if ((count($_FILES) > 0) && !empty($_FILES['file']['tmp_name'])) {
            $data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $type = $_FILES['file']['type'];
          
            if(empty($age)||empty($phoneNo)||empty($email)){
                if(empty($age)) {
                    echo "<font color='red'>Age field is empty.</font><br/>";
                }
                
                if(empty($phoneNo)) {
                    echo "<font color='red'>Phone number field is empty.</font><br/>";
                }
                
                if(empty($email)) {
                    echo "<font color='red'>Email field is empty.</font><br/>";
                }		
            }else{
            $result = mysqli_query($mysqli, "UPDATE resident SET Age='$age', Phone_No='$phoneNo', Email='$email', Profile_Picture='$data', mime='$type' WHERE Resident_svID='" . $_SESSION['svid'] . "'");
            }
        }else{
            $result = mysqli_query($mysqli, "UPDATE resident SET Age='$age', Phone_No='$phoneNo', Email='$email' WHERE Resident_svID='" . $_SESSION['svid'] . "'");
        }
        header("Location: http://localhost:8000/southview_profile/profile1.php");
    }

    if(isset($_POST['reset'])){	
        $oldpass=mysqli_real_escape_string($mysqli, $_POST['oldpass']);
        $newpass=mysqli_real_escape_string($mysqli, $_POST['newpass']);
        $newpass2=mysqli_real_escape_string($mysqli, $_POST['newpass2']);

        $res=mysqli_query($mysqli, "SELECT * FROM resident WHERE Resident_svID='" . $_SESSION['svid'] . "'");

        $single = mysqli_fetch_assoc($res);

        if(empty($oldpass)||empty($newpass)||empty($newpass2)){
            if(empty($oldpass)) {
                echo "<font color='red'>The field is empty.</font><br/>";
            }
            
            if(empty($newpass)) {
                echo "<font color='red'>The field is empty.</font><br/>";
            }
            
            if(empty($newpass2)) {
                echo "<font color='red'>The field is empty.</font><br/>";
            }		
        }else if($single['Password']!=$oldpass){
            echo "<font color='red'>Current password incorrect</font><br/>";
        }else if ($newpass!=$newpass2){
            echo "<font color='red'>The new password is not the same.</font><br/>";
        }else{
         $result = mysqli_query($mysqli, "UPDATE resident SET Password='$newpass' WHERE Resident_svID='" . $_SESSION['svid'] . "'");  
        }
        
    }
    mysqli_close($mysqli);
?>
<?php  
    include 'config.php'; 
    $result = mysqli_query($mysqli, "SELECT * FROM resident WHERE Resident_svID='" . $_SESSION['svid'] . "'");
    $singleRow  = mysqli_fetch_assoc($result);  
    mysqli_close($mysqli);
?>

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

<!DOCTYPE html>
<html lang="en">
    <div class=" profile-area">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="card">
						<form name="form1" method="post" action="profile2.php" enctype="multipart/form-data">
                        <div class="img1"><img src="/southview_payment/images/563adbeb015fb165c4145a28a6c2e4c8.jpg">
                        </div>
                        <!-- <div class="img3"> -->
						<div class="profile-pic-div">	
                            <label for="file">
                            <?php    
                               if (empty($singleRow['Profile_Picture'])&& empty($singleRow['mime'])){
                                    echo "<img src='image.jpg' id='photo'>";
                               }else{
                                    echo "<img src= 'data:".$singleRow['mime'].";base64,".base64_encode($singleRow['Profile_Picture'])."' id='photo' style='cursor:default;'>" ;
                               }
                                ?>
                            </label>
                            <input type="file" id="file" name="file">
							<label for="file" id="uploadBtn">
                                Choose Photo
                            </label>
                        </div>
                        <div class="card mx-3 mb-3">
                            <div class="row">
                                <div class="col table-style mx-5 my-5 ">
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-2 col-lg-2 "></div>
                                            <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                                <strong>NAME</strong>
                                            </div>
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                                <strong>:</strong>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
												<?php 
												echo $singleRow['Name']; 
												?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                            </div>
                                            <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                                <strong>SV-ID</strong>
                                            </div>
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                                <strong>:</strong>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
												<?php 
												echo $singleRow['Resident_svID']; 
												?>
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
												<?php 
												echo $singleRow['Gender']; 
												?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                            </div>
                                            <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                                <strong>AGE</strong>
                                            </div>
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                                <strong>:</strong>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
													<input type="text" class="form-control" type="number" name="age"
                                                    id="input-style" value=" <?php 
													echo $singleRow['Age']; 
													?>" placeholder="Age">
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
												<?php 
												echo $singleRow['IC_No/Passport_No']; 
												?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                            </div>
                                            <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                                <strong>PHONE NO</strong>
                                            </div>
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                                <strong>:</strong>
                                            </div>
                                            <div class="col-2 col-sm-2 col-md-2 col-lg-1" id="tr-settings">
                                                60-
                                            </div>
                                            <div class="col-4 col-sm-2 col-md-4 col-lg-3" id="tr-settings">
												<input type="text" class="form-control" name="phoneno" id="input-style"
                                                value=" <?php 
												echo $singleRow['Phone_No']; 
												?>" placeholder="Phone No">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1 col-sm-1 col-md-2 col-lg-2 ">
                                            </div>
                                            <div class="col-3 col-sm-3 col-md-2 col-lg-3" id="tr-settings">
                                                <strong>E-Mail</strong>
                                            </div>
                                            <div class="col-1 col-sm-1 col-md-1 col-lg-1" id="tr-settings">
                                                <strong>:</strong>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-4" id="tr-settings">
												<input type="text" class="form-control" type="email" name="email"
                                                    id="input-style" value=" <?php 
													echo $singleRow['Email']; 
													?>" placeholder="E-mail">
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
												<?php 
												echo $singleRow['Unit']; 
												?>
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
												<?php 
												echo $singleRow['Vehicle_No']; 
												?>
                                            </div>
                                        </div>
                                        <div class="row text-center mt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 ">
                                                <a href="#resetpassword">
                                                    <p class="reset mt-3">Reset password?</p>
                                                </a>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                            <button type="submit"
                                                    class="btn" id="btn-setting" name="update" value="Update">Save</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="resetpassword">
        <div class="wrapper white-background text-center">
            <h3>Reset Password</h3><a class="close" href="#">&times;</a>
            <form name='form2' method='post' action='profile2.php'>
                <div class="mx-3">
                <input type="password" name="oldpass" class="form-control my-3" placeholder="Enter Current Password" id=""
                    inputmode="numeric"  minlength="8" maxlength="15" size="15" required>
                <input type="password" name="newpass" class="form-control mb-3" placeholder="Enter New Password" id="logpw"
                    inputmode="numeric" minlength="8" maxlength="15" size="15" required onkeyup='check();'>
                <input type="password" name="newpass2" class="form-control mb-3" placeholder="Enter Confirm Password" id="confirmpw"
                    inputmode="numeric" minlength="8" maxlength="15" size="15" required onkeyup='check();'>
                </div>
                <div id="message">&nbsp;</div> 
                <button type="submit" class="btn btn mt-3 btn-delete" id="btn-setting" name="reset" value="reset">Reset</button>    
            </form>
        </div>
    </div>
    <div class="overlay" id="resetsuccess">
        <div class="wrapper white-background text-center">
            <a class="close" href="#">&times;</a>
            <img id="ok" src="../signup/OK.png">
            <h3>Password Reset Successfully</h3>
        </div>
    </div>
    <!-- footer -->
    <script type="text/javascript" src="../southview_profile/profile.js"></script>
</body>
</html>