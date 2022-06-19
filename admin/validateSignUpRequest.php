<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
include '../connect.php';
include '../checkLogin.php';

function send_SVID_email($SV_ID,$name,$email){
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
    );//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("southview22@outlook.my");
    $mail->addAddress($email);               //Name is optional
    $mail->addReplyTo("southview22@outlook.my");

    $mail->Subject = "You have successfully registered as the SOUTHVIEW apartment resident!";

    $email_template = "Hello, $name! Your SV_ID is $SV_ID.";

    $mail->Body = $email_template;
    $mail->send();

    }

if(isset($_GET['validateSignUpRequestid'])){
    $id=$_GET['validateSignUpRequestid'];
    $email=$_GET['email'];
    // $send_email=mysqli_real_escape_string($conn,$email);
    $sql="insert into `resident` (`Name`,`Password`,`Gender`,`IC_No/Passport_No`,`Phone_No`,`Email`,`Age`,`Unit`,`Vehicle_No`) select `Name`,`Password`,`Gender`,`IC_No/Passport_No`,`Phone_No`,`Email`,`Age`,`Unit`,`Vehicle_No` from `resident_signup` where `signup_ID`=$id";
    $result=mysqli_query($conn,$sql);

    
    $sql_newSVID="select * from `resident` where Email='$email'";
    $result_newSVID=mysqli_query($conn,$sql_newSVID);
    $row=mysqli_fetch_assoc($result_newSVID);
    $SV_ID=$row['Resident_svID'];
    $name=$row['Name'];

    if($result)
    {
        if($result_newSVID){
            send_SVID_email($SV_ID,$name,$email);
        }
        
        $sql_delete="delete from `resident_signup` where `signup_ID`=$id";
        $result_delete=mysqli_query($conn,$sql_delete);
        if($result_delete){
        echo '<script type="text/javascript">'; 
        echo 'alert("Validated Successfully! An email has been sent to the respective resident.");'; 
        echo 'window.location.href = "viewsignup.php";';
        echo '</script>';
        }    
    }
    else{
        die("Connection failed: " . $conn->connect_error);
    }



}

?>