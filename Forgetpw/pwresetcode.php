<?php
    session_start();
    $conn = mysqli_connect('localhost','root',"",'south view',3325);
    if($conn->connect_error){
        die(mysqli_connect_error() );
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';
    
    $mail = new PHPMailer();
        //Server settings
    $mail->isSMTP();                                               //Send using SMTP
    $mail->Host       = "smtp.office365.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "aiyinn0621@outlook.my";                     //SMTP username
    $mail->Password   = "aiyin010621";                               //SMTP password
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
    $mail->setFrom("aiyinn0621@outlook.my", "Hay");
    $mail->addAddress($targetEmail);               //Name is optional
    $mail->addReplyTo("aiyinn0621@outlook.my", "Hay");

    $mail->Subject = "Verification Code";
    $mail->Body = $six_digit_random_number;

    if($mail->send()){
        echo "Email sent";
    }else{
        echo "Email not sent";
    }


    if(isset($_POST['passwordresetlink'])){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT Email FROM Resident WHERE Email ='$email' LIMIT 1 ";
        $check_email_run = mysqli_query ($conn, $check_email);

    if(mysqli_num_rows($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        $get_id = $row['Resident_svID'];
        $get_email = $row['email'];

        $update_token = "UPDATE resident SET verify_token = '$token' WHERE Email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);

        if($update_token_run){
            send_password_reset($get_id,$get_email,$token);
            $_SESSION['status'] = "We e-mailed you a password reset link";
            header("../Forgetpw/resetpass.php");
            exit(0);
        }else{
            $_SESSION['status'] = "Something went wrong. #1";
            header("../Forgetpw/resetpass.php");
            exit(0);
        }


    }else{
        $_SESSION['status'] = "No Email Found";
        header("../Forgetpw/resetpass.php");
        exit(0);
    }

    }

?>