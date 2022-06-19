<?php 

$conn = mysqli_connect('localhost','root',"",'south view');
    if($conn->connect_error){
        die(mysqli_connect_error() );
    }
session_start();
// $_SESSION["targetEmail"] = $_GET['targetEmail'];
// echo "<script>console.log('otp: " . $_SESSION["otp"] . "' );</script>";

if(isset($_POST["submit"])){
$dbotp = $_SESSION["otp"];
$targetEmail = $_SESSION['targetEmail'];
// $query = mysqli_query($conn, "SELECT * FROM resident WHERE Email='$targetEmail' LIMIT 1");
// $row = mysqli_fetch_assoc($query);
    if(!empty($_POST['code'])) {
        $otp = $_POST['code'];
        if ((int)$dbotp === (int)$otp){
            header("Location:../Forgetpw/resetpass.php?targetEmail=$targetEmail");
        }else{
            header("location: ../Forgetpw/forgetpassnoti.php?error=Wrong OTP");

        }
    }
}

?>


<!DOCTYPE html>
<html lan="en" and dir="Itr">
    <head>   
        <meta charset="UTF-8">
        <meta  name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forget Password</title>
        <link rel="icon" href="../images/Logo SV transaparent.png">
        <link rel="stylesheet" href="forgetpassnoti.CSS">
       
          
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
        
        <body class="bg-img" onload="hi()">
            <section>
                <div class="container-fluid pad-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">             
                        </div>
                            <div class="d-flex col-lg-4 col-md-4 justify-content-center">
                                <img id="image" class="im-fluid" src="../images/Logo SV.png">
                            </div>
                            <div class="col-lg-4 col-md-4">

                            </div>
                    </div>
                </div>
                <div class="container-fluid pad-top">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">       
                        </div>
                        <div class="col-lg-4 col-md-4 bg">
                            <div class="info-container">
                                <table class="table table-borderless">
                                <!-- onsubmit="handleFormSubmit(event)" -->
                                    <form class="box" action='forgetpassnoti.php' method='post'>

                                <h2 class="text-center title">Email Sent</h2>
                               
                                <div class="text-center emailbox">
                                    <h5>We just sent a verification code over to <span id="saveEmail"></span>.</h5> 

                                    <h6>Enter verification code:</h6>
                                    <input type="type" name="code" class="form-control" placeholder="Verification code" id="code" required>
                                         
                                     <a href="../login/login.php">
                                         <button type="submit" name="submit">Send</button>
                                </div>
                                <?php if (isset($_GET['error'])) { ?>  
                                        <p style='color:red;'><?php echo $_GET['error']; ?></p>
                                     <?php } ?> 
                                    </form>
                            </table>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">       
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function handleFormSubmit(event) {
                    event.preventDefault();
                    window.location.href="resetpass.html"
                }
            
                function hi(){
                    var email = localStorage.getItem("email");
                    document.getElementById("saveEmail").innerHTML = email;
                }
            </script>
        </body>
</html>

