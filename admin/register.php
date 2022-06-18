<?php
include '../connect.php';
include '../checkLogin.php';
  $query = 'SELECT * FROM resident ORDER BY Resident_svID DESC LIMIT 1';
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $lastid = $row['Resident_svID'];
  if($lastid == " "){
    $rID = 2200001;
  }
  else{
    $rID = $lastid + 1;
  }

if(isset($_POST['submit']))
{
      
      $name=$_POST['name'];      
      $gender=$_POST['gender'];
      $age=$_POST['age'];
      $icno=$_POST['icno'];
      $phoneno=$_POST['phoneno'];
      $email=$_POST['email'];
      $unit=$_POST['unit'];
      $vecno=$_POST['vecno'];
      
      // default password = SV12345678
     $result = mysqli_query($conn, "insert into `resident` (`Name`,`Gender`,`Password`,`IC_No/Passport_No`,`Phone_No`,`Email`,`Age`,`Unit`,`Vehicle_No`) values('$name','$gender','SV12345678','$icno','$phoneno','$email',$age,'$unit','$vecno')");

    if($result)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Register Successfully! The default password is SV12345678.");'; 
        echo 'window.location.href = "viewlist.php";';
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
    <link rel="icon" href="images/logo.svg">
    <title>Register Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container-fluid">
    <!-- top navigation bar -->
    <?php
    $page='ResidentAcc';
    include 'top-navbar.php';
    ?>

      <!-- logout button -->
      <?php
      include 'logout.php';
      ?>        

        <!-- Side-Nav -->
        <?php
        $side_page='register';
        include 'side-navbar.php';
        ?>

        <!-- Main Content -->
        <div class="p-1 my-container active-cont">
          <!-- Top Nav -->
          <nav class="navbar top-navbar navbar-light px-5">
            <a class="btn border-0" id="menu-btn">
              <img class="icon" src="images/menu.svg" alt="Menu Icon">
              <span class="mx-2 table-title">Register Account</span>
            </a>
          </nav>         

          <div class="container-lg-12" >
            <div class="row justify-content-start align-items-start">
                <div class="col-lg-7">

                    <!-- register form -->             
                        <form method="post">
                                      <div class="row justify-content-start form-group">
                                          <div class="col-lg-4 justify-content-start" id="tr-settings">
                                              <strong>NAME</strong>
                                          </div>
                                          <div class="col-lg-1 d-none d-lg-block">
                                            <strong>:</strong>
                                          </div>            
                                          <div class="col-lg-7"  id="tr-settings">
                                              <input type="text" class="form-control" type="text" name="name" id="input-style" autocomplete="off"
                                              required>                                             
                                          </div>                                      
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                          <div class="col-lg-4 justify-content-start" id="tr-settings">
                                              <strong>SV_ID</strong>
                                          </div>
                                          <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                              <strong>:</strong>
                                          </div>
                                          <div class="col-lg-7" name="id" id="tr-settings">
                                          <input type="text" style="background-color:darkgray" class="form-control"       type="text" name="SV_ID" id="input-style" value="<?php echo $rID; ?>" disabled 
                                           >                                       
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                        <div class="col-lg-4 justify-content-start" id="tr-settings">
                                          <strong>GENDER</strong>
                                        </div>
                                        <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                          <strong>:</strong>
                                        </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input type="radio" name="gender" class="form-check-input" id="male" value="Male" required>
                                              <label for="male"  class="form-input-label">Male</label>
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <input type="radio" name="gender" class="form-check-input" id="female" value="Female" required>
                                              <label for="female"  class="form-input-label">Female</label>  
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                        <div class="col-lg-4 justify-content-start" id="tr-settings">
                                              <strong>AGE</strong>
                                        </div>
                                        <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                          <strong>:</strong>
                                        </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input type="text" class="form-control" type="number" name="age" id="input-style" autocomplete="off" required>                                        
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                          <div class="col-lg-4 justify-content-start" id="tr-settings">
                                                <strong>IC NO/Passport NO</strong>
                                          </div>
                                          <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                            <strong>:</strong>
                                          </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input type="text" class="form-control" type="number" name="icno" id="input-style" autocomplete="off" required>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                          <div class="col-lg-4 justify-content-start" id="tr-settings">
                                            <strong>PHONE NO</strong>
                                          </div>
                                          <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                            <strong>:</strong>
                                          </div>
                                          <div class="col-1 countryno" id="tr-settings">
                                            60-
                                          </div>
                                          <div class="col-lg-6" id="tr-settings">
                                          <input type="text" class="form-control" name="phoneno" id="input-style" autocomplete="off"
                                          required>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                        <div class="col-lg-4 justify-content-start" id="tr-settings">
                                          <strong>E-Mail</strong>
                                        </div>
                                          <div class="col-lg-1 d-none d-lg-block" id="tr-settings">
                                            <strong>:</strong>
                                          </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input class="form-control" type="email" name="email" id="input-style" autocomplete="off" required>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                        <div class="col-lg-4 justify-content-start" id="tr-settings">
                                              <strong>UNIT</strong>
                                        </div>
                                          <div class="col-1 d-none d-lg-block" id="tr-settings">
                                              <strong>:</strong>
                                          </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input type="text" class="form-control" type="text" name="unit" id="input-style" autocomplete="off" required>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row justify-content-start form-group">
                                        <div class="col-lg-4 justify-content-start" id="tr-settings">
                                           <strong>VEHICLE NO</strong>
                                        </div>
                                          <div class="col-1 d-none d-lg-block" id="tr-settings">
                                              <strong>:</strong>
                                          </div>
                                          <div class="col-lg-7" id="tr-settings">
                                              <input type="text" class="form-control" type="text" name="vecno" id="input-style" autocomplete="off" required>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row form-group">
                                          <div><button type="submit" class="btn btn-lg col-lg-12 btn-save" id="btn-next" name="submit">Save</button>
                                          </div>
                                   </div>
                                  </form>                                          
                  <!-- end of register form -->
                </div>             
                
                <!-- human icon -->
                <div class="col-lg-5 justify-content-center  align-items-start text-center d-none d-lg-block update-pg-icon">
                    <img id="humanicon" src="images/humanicon.svg" alt="Human Icon">                          
                </div>
            </div>
          </div>
         </div>
      </div>
      <br><br>

    <!-- footer -->  
    <?php
      include 'footer.php';
    ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- custom js -->
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>