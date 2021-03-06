<?php
    session_start();
    include_once("../connect.php");
    include '../checkLogin.php';
    // $_SESSION['svid'] = 3;
    $result = mysqli_query($conn, "SELECT * FROM resident WHERE Resident_svID='" . $_SESSION['svid'] . "'");
    $singleRow  = mysqli_fetch_assoc($result);  
    $payment_amount = 100.00;


    if(isset($_POST['paid'])){
      $svid=$_SESSION['svid'];
      $Email =$singleRow['Email'];
      $paymentCat = 'Management';
        
      $result = mysqli_query($conn, "INSERT INTO payment (Resident_svID,Payment_Category,Payment_Amount,Email,Payment_Date) VALUES ('$svid','$paymentCat','$payment_amount','$Email',curdate())");
      header("Location: http://localhost:8000/southview_payment/payment-success.php");
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>South View</title>
    <link rel="icon" href="../southview_payment/images/Logo SV.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../southview_payment/payment.css">
</head>
<style>
    <?php
        include "../southview_payment/payment.css";
    ?>
</style>
<body>
    <!-- nav bar -->
    <script src="/navigation/navigation.js"></script>
    <!-- action="payment-management1.php" -->
    <form name="paymentMForm" method="post">
        <div class="mx-5 my-5 card white_boundary">
            <h1>Payment - Management</h1>
            <div class="mx-5 mt-5 mb-3 " id="grey-bg" style="background-color: rgb(0,0,0,0.5);">
                <div class="row justify-content-center">
                    <div class="col-lg-4  col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-management1.php"><button type="button" class="btn active"
                                id="self-pay">Pay My Bills</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-management2.php"><button type="button" class="btn"
                                id="anyone-pay">Pay For Anyone</button></a>
                    </div>
                </div>

                <!-- id="grey-bg2" -->
                <div class="mx-5 my-5 " id="grey-bg2" style="background-color: #C4C4C4;">
                    <div class="container">
                        <div class="row">
                            <div class="mx-5 col-lg-1 col-sm-6 form-check mt-5 justify-content-center">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio-btn"
                                    required>
                            </div>
                            <div class="col-lg-3 col-sm-6 justify-content-center">
                                <svg class="" width="148" height="148" viewBox="0 0 148 148" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="148" height="148" fill="url(#pattern0)" />
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_478_789" transform="scale(0.0111111)" />
                                        </pattern>
                                        <image id="image0_478_789" width="90" height="90"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAACY0lEQVR4nO3Yz07UQADH8S8GoqzRo4kn7ryLF0S9+QzevRuUo94VDgjqzSfgAXgO0GhIdJWoRDhsCQ1hut1O59fO9vdJeuvuTr/bP9MBMzMzMzMzi7IMrAHvgSPgO/AJeALc7nBcc+EW8ADYBn4AZ4HtBPgMPAXudDLSDNWN6+gNxMZ19Aqp4jo6+riDij4C1oE9YExcoF9czjQuZiA/W/jOD8UYR4kaJDUC3tBO3I/AY66fxpWnfbHRx8Dr4juzsUW6uCFtRX/b6Ig7cBP4S7NL+BHtXMIx0f8Ux9B7y8Ap9S7VNuNWjechsEu96P+YPLizsEs47h7dPXzK0UPPj50OxtXYXSb36RPgmMmBxcQtz16+At+I/8PK0Y+Lsb4rxj4odefdv5nDeXFqsS81jl4h1Rujo6N/HR9U9L6sdcxl9L7EncvofY+bdfRc42YTfQnYJH6Vrs/bGHgFLLbUrJFNug+h2jZiQi3EfBj4AtyL/I5cHAH3m374RuSP/59x/wPgObBasc9CYGtr/9ViDAe1R90DG0y/5PaBZ8DKlc+G9g9Jsf9KMbb9GsfxouK3klsCXgKH9CNciv0PmZxQUQ/D2Ht0WeggQr+R+/4zib1HW00OLaK4deTOt46cOLSIQ4s4tIhDiyiW/nJ5AUk6a/IZLeLQIg4t4tAiDi3itY7pvNaRE4cWcWgRhxZxaBGvdUzfvxU+o0UcWsShRRxaxKFFvNYxndc6cuLQIg4t4tAiDi2S01rHrLzWMUQOLeLQIg4t4tAiillH39ZAOhmPz2gRhxZxaBGHFnFoMzMzMzOzoTsHZjb15kts/FEAAAAASUVORK5CYII=" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="col-lg mt-5 col-sm-12 justify-content-center" id="p-text">
                                <strong><?php echo $singleRow['Resident_svID']?></strong>
                            </div>
                            <div class="col-lg mt-5 col-sm-12 justify-content-center" id="p-text">
                                <strong>RM</strong> <?php echo $payment_amount?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-9 col-md col-sm"></div>
                    <div class="col-lg-3 mb-3 col-md-5 col-sm-9 col-xs-12">
                        <button type="submit" class="btn" id="btn-setting" name="paid" value="paid">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- footer -->
    <script type="text/javascript" src="../southview_payment/payment.js"></script>
</body>

</html>