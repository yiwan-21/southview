<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

$mail = new PHPMailer();
    $mail->isSMTP();                                               //Send using SMTP
    $mail->SMTPDebug  = 3;
    $mail->Host       = "smtp.outlook.com";                     //Set the SMTP server to send through
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
    $mail->addAddress("aiyinn0621@gmail.com");               //Name is optional
    $mail->addReplyTo("southview22@outlook.my");

    $mail->Subject = "Verification Code";
    $mail->Body = "TEST";

    if($mail->send()){
        echo "Email sent";
    }else{
        echo "Email not sent";
    }

?>
