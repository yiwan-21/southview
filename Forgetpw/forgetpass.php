<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

$conn = mysqli_connect('localhost','root',"",'south view',3325);
    if($conn->connect_error){
        die(mysqli_connect_error() );
    }
session_start();
if (isset($_POST["passwordresetlink"])){    
    $_SESSION['otp'] = $six_digit_random_number = random_int(100000, 999999);
    $targetEmail = $_POST['email'];
    $_SESSION['targetEmail'] = $targetEmail;
    header("Location:../Forgetpw/forgetpassnoti.php?targetEmail=$targetEmail");

    $query = mysqli_query($conn, "UPDATE resident SET OTP= $six_digit_random_number WHERE Email='$targetEmail'");
    if (!$query) {
        echo "Please check your email!";
      } 
    $mail = new PHPMailer();
        //Server settings
    $mail->isSMTP();                                               //Send using SMTP
    $mail->Host       = "smtp.office365.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "southview22@outlook.my";                     //SMTP username
    $mail->Password   = "sv2022";                               //SMTP password
    $mail->SMTPSecure = "STARTTLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("southview22@outlook.my");
    $mail->addAddress($targetEmail);               //Name is optional
    $mail->addReplyTo("southview22@outlook.my");

    $mail->Subject = "Verification Code";
    $mail->Body = $six_digit_random_number;

    if($mail->send()){
        echo "Email sent";
    }else{
        echo "Email not sent";
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
        <link rel="stylesheet" href="forgetpass.css">
      
          
        <!--Bootstrap CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
        
        <body class="bg-img">
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
                                    <form action="forgetpass.php" method="post" class="box">
                                    <img id="pwlogo" src="../Forgetpw/pwlogo.png">

                                <h3 class="text-center">Forget Your Password?</h3>
                               
                                <div class="emailbox">
                                    <h5>Please enter the email address you'd like the verification code sent to:</h5>
                                    <h6>Enter email address:</h6>
                                <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                                </div>
                                <tr class="text-center">
                                    <td>
                                        <button type="submit" name="passwordresetlink"class="requestlink">Request verification code</button>                                    
                                 </td>
                                </tr>
                                    <tr class="text-center">
                                        <td>
                                            <a id="loginlink" href="../login/login.php">
                                            <button type="button" class="backtologin">Back to Login</button>
                                            </a>
                                     </td>
                                    </tr>
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
                        window.location.href="../Forgetpw/forgetpassnoti.html"
        
                        var emailID = document.getElementById("email");
                        localStorage.setItem("email",emailID.value);
        
                    }
        
                </script>
        </body>
</html>