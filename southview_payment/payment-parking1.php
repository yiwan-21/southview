<?php
    session_start();
    include_once("../connect.php");
    include '../checkLogin.php';
    // $_SESSION['svid'] = 3;
    $result = mysqli_query($conn, "SELECT * FROM resident WHERE Resident_svID='" . $_SESSION['svid'] . "'");
    $singleRow  = mysqli_fetch_assoc($result);  
    $payment_amount = 20.00;


    if(isset($_POST['paid'])){
      $svid=$_SESSION['svid'];
      $Email =$singleRow['Email'];
      $paymentCat = 'Parking';
        
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
            <h1>Payment - Parking</h1>
            <div class="mx-5 mt-5 mb-3 " id="grey-bg" style="background-color: rgb(0,0,0,0.5);">
                <div class="row justify-content-center">
                    <div class="col-lg-4  col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-parking1.php"><button type="button" class="btn active"
                                id="self-pay">Pay My Bills</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-parking2.php"><button type="button" class="btn"
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
                            <svg width="148" height="148" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="209" height="209" fill="url(#pattern0)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_488_791" transform="scale(0.0111111)"/>
                                </pattern>
                                <image id="image0_488_791" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAFGElEQVR4nO2cT2xURRzHP9TSbbcqkCZiitFEIHAiMYqKRqOJVznoCb1LYjQxBlMu0sLFGhONBw9yFzwa4GA8oURMjARPKrboxTVBA9p/a0u1cJi36XY7M29mdt68t/X3SX55W968+X1/X96+N292dkEQBEEQBEEQBEEQBGHjsClBjt3AIeBpYC8wAgwmyGtjEbgO/Ah8BZwCrpaqqAv2AOeAFeBWxeM/4AzqpOgpXgOWKN9A31gEXi3Aj0L4gPIN6zbei+5KZN6ifJNixZuRvYnGPuAm5RsUK5aBh6I6FIkLmEU3gfeBR4EtZQlsYyvwGOoy18Ss+8uyBJrYj1nsL8CD5UnLZSfwK2b9+8uTtp6T6EXOAveXqMuVB1BadTWcLFHXGgZQg3+dyHFN+zpwAphGDQGngePAkEOed4HfgQYwmf2bDZ9c44YabjjkScJB9AJvop4C26kD3xjaX8Ru9qTmmElLe99cI5jH/gcteZJxCr24s5q2JwxtWzFhydPQtG9Y2ofkOmtoe9qSJwl3AvPoxb2saT9taNuKKUsuX6NDcr1kaLuQ1VoaJmHz6IXlPZYvWnLpLh3vWNqH5BrG78RJhu9bLe8s+9mSawBldgO3m2FoLtOl8JwlV6GMYH4SNN08jhvat0I3SgklNNfzhva6m3sSDhsEXcd8pg2h7vi6474mf4jnQ2gu23D1cER9zpw3iMkb4A+h7vhTqOvoFOrsimlyt7lMD2DnC9BoZRQ1Wa4T80xqMQXwLPraVlBPkck4YhDSAPpSCimIPvTDyVuo2pNxySDis5QiCuYM+hovhXQW8uHsHuAnw75rqJm6pmH/MLADuDfbbs9iG2r6dAtwd7ato25Mw23H3wX0Z6//Beba9i2gRgZNYAY1STSTxV+ZtmvAb9m2kR2jo46a0bvHsH8vcMWwT0t/fpN1HLLs2466YXwI3AHs6ohtAflM9Hf0F9L3DdR4+2q2nUbde97AbDIoD2zTBVG4gn18+n8I21RBFB6pQJFViYd9jPMdIbzi2X4jU8jDyyDwKeWfRVWL00CtC1/XMAB8UYGiqhqfA5uD3W3j4woUU/X4KNjdjOcqUEQvxArqsT2Y7ypQRK/Et4Ee82QFxPdaPG4y0za8e8GyT9DzommHzegDjp03gWOoR+xath0H/nFVh5qjGEPNf2yKFDuAo1nfrnRbi6tna/iT/LfKAua3ywHs69raYyxEoCNjjhpi1PJHiMBlh47fzunDtPqnM0ZDBDoy6qghRi3LIQJdxO3M6WOXYz9VMDpWLd64dJq3Jq3m2E+Rl46jjhpi1eJNjLNgt2M/SyizY57Zo1mfrt+liVWLNy6dHsvpY8KxnypErFq8cem0iXlI8wTuo44qRKxavPEROI66WQxk2wnU2LNs80LM7rYWLbYPZ4P+dwS9pxthDUZPIEYnQoxOhBidCDE6EWJ0IsToRIjRiRCjEyFGJyJk2a6Jp1BLx7ai5m6HUeuZa6g1z/XsdWuNc+vvQdR3Sjaz+t3EPtb/3ETnWmlYXRPdzgxqnQWo7wwuo+YqFlFTpk1W11a3/p7NXs9lfS4Bf2fHXPDwwEjMuY4UvzhWBlF8kEtHIsToRNiMnvfoZ7ZbIRUmig82o3/wSODTtteI4oPN6E88Evi07TUK96EGfE/+RzeXqchP4RREEh/uy0lyGbXGbaOTxIca8Drq94nmsriI+v3RjXwmdyI+CIIgCIIgCIIgCIIgCIIghHMbn0uOYmjAnw8AAAAASUVORK5CYII="/>
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