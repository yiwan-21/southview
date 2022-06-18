<?php
include '../admin/manage-register-account/connect.php';
$Patient_ID=$_GET['updateID'];
$sql="select * from `covid-19 patient` where Patient_ID=$Patient_ID";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$Q1=$row['Symptom'];
$Q1Array = explode(",",$Q1);
$Q2=$row['Self_Living'];
$Q3=$row['Date_Start'];
$Q4=$row['Test_Type'];
$Q5=$row['Pre-Existing_Disease'];


if(isset($_POST['submit']))
{         
      $Q1=implode(",", $_POST['Q1']);
      $Q2=$_POST['Q2'];
      $Q3=$_POST['Q3'];
      $Q4=$_POST['Q4'];
      $Q5=$_POST['Q5'];
      
      $sql="update `covid-19 patient` set Patient_ID=$Patient_ID, `Symptom`='$Q1', `Self_Living`='$Q2', `Date_Start`='$Q3', `Test_Type`='$Q4', `Pre-Existing_Disease`='$Q5' where Patient_ID=$Patient_ID";
      $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Successfully!");'; 
        echo 'window.location.href = "manage-Covid19.php";';
        echo '</script>';
      
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Reporting</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.html">
                <img id="nav-logo" src="./images/logo.svg" alt="SV logo">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link mx-1" aria-current="page" href="home.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-1" href="./manage-register-account/viewsignup.html">Residents Account</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-1" href="./manage-Covid19.html">Covid-19 Reporting</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-1" href="./message.html">Messages</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        <!-- logout button -->
        <section id="logout">
            <br><br><br><br>
            <div class="container-fluid-lg-12" >
            <div class="row justify-content-center" >
                <div class="col-lg-9"></div>
                <div class="col-lg-2 justify-content-end d-flex align-items-end">
                <div class="col-lg-1"></div>
                <!-- <a href="../login/login.html" class="logoutbtn">LOGOUT</a> -->
                <a href="javascript:Alert();" class="logoutbtn">LOGOUT</a>
            </div>          
                </div>
            </div>
            <br>
        </section>

        <!-- Main Content -->
        <div class="my-container ms-5">

          <div class="container-lg-12" >
            <div class="row justify-content-start">
                <div class="col-lg-7">
                    <!-- update form -->             
                    <form class="form" method="post">
                        <div class="question">
                            <label for="Q1">1. Do you have any of the following symptoms?<span class="red">*</span></label>
                            <div class="answer checkbox required">
                                <input type="checkbox" name="Q1[]" value="Fever" id="fever" 
                                <?php 
                                    if(in_array("Fever",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="fever">Fever</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Cough" id="cough"
                                <?php 
                                    if(in_array("Cough",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="cough">Cough</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Shortness of breath" id="shortness"
                                <?php 
                                    if(in_array("Shortness of breath",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="shortness">Shortness of breath</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Sore throat" id="sore"
                                <?php 
                                    if(in_array("Sore throat",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="sore">Sore throat</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Difficulty breathing" id="difficulty"
                                <?php 
                                    if(in_array("Difficulty breathing",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="difficulty">Difficulty breathing</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Runny nose" id="runny"
                                <?php 
                                    if(in_array("Runny nose",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="runny">Runny nose</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Loss of taste or smell" id="taste"
                                <?php 
                                    if(in_array("Loss of taste or smell",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="taste">Loss of taste or smell</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="Other" id="other"
                                <?php 
                                    if(in_array("Other",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="other">Other</label>
                                <br>
                                <input type="checkbox" name="Q1[]" value="None of the above" id="none"
                                <?php 
                                    if(in_array("None of the above",$Q1Array)){ 
                                      echo "checked";} 
                                ?>
                                >
                                <label for="none">None of the above</label>
                            </div>
                        </div>

                        <br>
                        <div class="question">
                            <label for="Q2">2. Are you staying alone in the apartment?<span class="red">*</span></label>
                            <div class="answer col-lg-6">
                                <input type="radio" name="stayalone" class="form-check-input" id="yes" value="yes" 
                                         <?php
                                              if($Q2==1){
                                                echo "checked";
                                              }
                                         ?>
                                              required>
                                    <label for="yes"  class="form-input-label">Yes</label>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="stayalone" class="form-check-input" id="no" value="no" 
                                         <?php
                                              if($Q2==0){
                                                echo "checked";
                                              }
                                         ?>
                                    required>
                                    <label for="no"  class="form-input-label">No</label>  
                            </div>
                        </div>
                        <br>
                        <div class="question">
                            <label for="Q3">3. When did you test positive?<span class="red">*</span></label>
                            <div class="answer col-lg-6">
                                <input type="date" class="form-control" name="Q3" id="date" 
                                value="<?php
                                         echo $Q3;
                                       ?>">
                            </div>
                        </div>
                        <br>
                        <div class="question">
                            <label for="Q4">4. Type of test<span class="red">*</span></label>
                            <div class="answer">
                                <input type="radio" name="Q4" value="Self-test-saliva" id="saliva" 
                                         <?php
                                              if($Q4=='Self-test-saliva'){
                                                echo "checked";
                                              }
                                         ?>
                                required>
                                <label for="saliva">Self test saliva</label>
                                <br>

                                <input type="radio" name="Q4" value="Self-test-nasal" id="nasal"
                                        <?php
                                              if($Q4=='Self-test-nasal'){
                                                echo "checked";
                                              }
                                         ?>
                                >
                                <label for="nasal">Self test nasal</label>
                                <br>

                                <input type="radio" name="Q4" value="PCR" id="pcr"
                                        <?php
                                              if($Q4=='PCR'){
                                                echo "checked";
                                              }
                                         ?>
                                >
                                <label for="pcr">PCR</label>
                                <br>

                                <input type="radio" name="Q4" value="Other" id="other"
                                         <?php
                                              if($Q4=='Other'){
                                                echo "checked";
                                              }
                                         ?>
                                >
                                <label for="other">Other</label>
                            </div>
                        </div>
                        <br>
                        <div class="question">
                            <label for="Q5">5. Pre-existing disease (eg asthma, high blood pressure)</label>
                            <div class="answer col-lg-7">
                                <input type="text" class="form-control" name="Q5" id="disease" 
                                value="<?php
                                         echo $Q5;
                                       ?>"
                                >
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-7 d-grid gap-2 d-md-flex justify-content-md-end">
                          <button class="btn btn-update" name="submit">Update</button>
                          <button class="btn px-4 btn-back" type="button" onclick="window.location.href='./manage-Covid19.php'">
                            Back
                          </button> 
                        </div>
                    </form>                                        
                <!-- end of update form -->
                </div>             
                
                <!-- covid icon -->
                <div class="col-lg-5 justify-content-center  align-items-start text-center d-none d-lg-block update-pg-icon">
                    <img src="./images/virus.png" alt="Virus Icon">                          
                </div>
            </div>
          </div>
         </div>
      </div>
      <br><br>
    <!-- footer -->  
    <footer class="container-footer text-center text-lg-center">
      <div class="footer row d-flex align-items-center">
  
      <!-- copyright text -->
      <div class="col-lg-12 my-3 text-center text-lg-center">
        <i>Copyright © 2022 SV Community</i>
      </div>
      </div>
  </footer> 
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="./index.js"></script>
    
</body>
</html>