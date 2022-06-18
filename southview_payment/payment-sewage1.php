<?php
    session_start();
    include_once("../connect.php");
    include '../checkLogin.php';
    // $_SESSION['svid'] = 3;
    $result = mysqli_query($conn, "SELECT * FROM resident WHERE Resident_svID='" . $_SESSION['svid'] . "'");
    $singleRow  = mysqli_fetch_assoc($result);  
    $payment_amount = 30.00;


    if(isset($_POST['paid'])){
      $svid=$_SESSION['svid'];
      $Email =$singleRow['Email'];
      $paymentCat = 'Sewage';
        
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
            <h1>Payment - Sewage</h1>
            <div class="mx-5 mt-5 mb-3 " id="grey-bg" style="background-color: rgb(0,0,0,0.5);">
                <div class="row justify-content-center">
                    <div class="col-lg-4  col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-sewage1.php"><button type="button" class="btn active"
                                id="self-pay">Pay My Bills</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-sewage2.php"><button type="button" class="btn"
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
                            <svg width="148" height="148" viewBox="0 0 148 148" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="148" height="148" fill="url(#pattern0)"/>
                                <rect width="148" height="148" fill="url(#pattern1)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_488_790" transform="scale(0.0111111)"/>
                                </pattern>
                                <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_488_790" transform="scale(0.0111111)"/>
                                </pattern>
                                <image id="image0_488_790" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAFMElEQVR4nO2cTWhdRRTHf0mqNlarxaoUa9X6XbFuBBG1gqitCykiCG01iBvBhSsrghSKrgR3dummaje60Y0fS7WiIqIiTZs2DVITpIr9SJqUtsmLi8PD2/dm7rv3zpmZd2/mBwPhMu/Mef8c5p43c2YgkUgkEoklzkBsBwKwEtgCbALWIt95CtgPfA6ciudaM7gMeBM4DSxa2hngLeDySD7WnuuQiLUJ3Nl+RqI9UYJh4EeKi9xuB4GrIvhbW/ZQXuR22xvB31pyK3Ce6kIvABt9ODbow2hEXgAucfj8IDCi5Euj+Y7q0dxuvwf3uoZM4S70jA/HmjZ1aOTDw3jQpWlCH1ey0VKwcxFNE/oXBRu/KtjoomlCf9onNhrPEDBK9RfhJGndozCPA/OUF7kFbI3gb615BRGujNBvRPG0ATwD/EtvgU8BOyL52BhWIevNh+kWeAJ4B1gdwpEQOyy7gYcK9v0GeNuTH2uQNedB5KU35WmcaJyg+Dx5IpKP3gmRR79fom/KYR24HpijWEQ/HMnHxvAevUUeY2nsynvlRuAc+UK/Hs27AISMoA+RfNU25k9IaUBI5pDs41ukxiP0+OpsRH4YuC7K+2zTwC5guScNvHMlME58IYu2H5Ccu3bsJb54ZdsBpJSsNjxLfNGqtjL5f1SWA38QX7CqbR64R0uMZVqGDLwM3OTw+deA30p+Zg9wp8OYWYaAF4GdSva8MAgcwS2ivqwwbpWau7zW9zUej6LzRe8tOa620Go1Hr4WlbYo2XlJyU5VrkDqrJ3xJfQmJTubley4oPLr2ZfQ65Ts3IVSRMXGl9DXKtkZQKr3a48voc8q2ppVtBUNX0KPKtn5CzipZCsqvoT+WMnOJ0ialbAwjCzMuOSwx5FtsDJo59GL1GDZdC3wPdW+3CGqnSXpW6F9rnVMAg8C91EuC5lGzv0t+HAqFj6FblN2YaiRNK0+um9JQgciCR2IJHQgNITeDHwAfAQ8pmCvk6eAfcgm7xMe7NeC57m4sr4FbFO0P2Kwvz2nf9/m0a6YtqsOKtofK2m/sULPYHZulYLtayy2867myRO6hRTFPwcczemXbWeRTdromI4sLAIPKNh+xGL7QM5n8oTen+m3Padftn2l8D0A95fhYcvzOxztAmywPK+6BPtn5u9jBfofQk53qbCUhD5p+dvECLIDf7TiWF34Evp2R7tgFzpv6sgjez6ml9BjSKWSGv0c0bZyLI2IDn7XnU+hXbbpr8ZcOjuPpJRVyAo9h5xACIar0FPIJX2drABucLBri+ZxqgvUOV0EjWpXoRexR5jL9KH9IoRuoYNu+mqsdfiYp++2PHcRuvOwaGOEdsk8QkR0raYOsAvtUqecpg4D2lPHSswXsi7kjNWLC3RXPNVO6DHL81uASyvY24A5NZygeqlZ++hdltoJfRr42/B8GSJ2WXxMG6ZbE2o3R4M9qqtMH7aMo+pPbzBHb+0iGnTnaVtEu2woJKENhMg4IPDUoVWpZJs6diDXo7U5h6wzdDLD/6tlpiNzLWR9uComUYNGtJbQtmNiK4D1CvbHMf+DitKYqWMCt5dVL75w/Hz0qUOzgGaXoq0s08C7BfvaotR0I9g09nOE5wuOF43d6G71zwJPlhj/VYONGewF7fsM/Sdxu74+GFuRUl0XgS8An2HPqW0MIbcStO38Azyd03818HWm/xHg/pJjFsLnVT/rgJsp/zN8FknlXK7dWYNsPIzS+yU6ANyGHAcZRXmvMJFIJBKJRCKRSCT6nv8An0iLZQK5OewAAAAASUVORK5CYII="/>
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