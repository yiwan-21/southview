<?php
    include_once("config.php");
    if(isset($_POST['paid'])){
        $Resident_svID = mysqli_real_escape_string($mysqli, $_POST['Resident_svID']);
        $Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
        $Payment_Amount = mysqli_real_escape_string($mysqli, $_POST['Payment_Amount']);
        $paymentCat = 'Management';
        if(empty($Resident_svID)||empty($Email)||empty($Payment_Amount)){
            if(empty($Resident_svID)) {
                echo "<font color='red'>Resident SV ID field is empty.</font><br/>";
            }
            
            if(empty($Email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
            
            if(empty($Payment_Amount)) {
                echo "<font color='red'>Amount field is empty.</font><br/>";
            }
        }else{
            $result = mysqli_query($mysqli, "INSERT INTO payment (Resident_svID,Payment_Category,Payment_Amount,Email,Payment_Date) VALUES ('$Resident_svID','$paymentCat','$Payment_Amount','$Email',curdate())");
            header("Location: http://localhost:8000/southview_payment/payment-success.php");
        }
        
    }
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
    <form name="paymentMForm2" method="post" action = "payment-management2.php">
        <div class="mx-5 my-5 card white_boundary">
            <h1>Payment - Management</h1>
            <div class="mx-5 my-5 " id="grey-bg" style="background-color: rgb(0,0,0,0.5);">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-management1.php"><button type="button" class="btn"
                                id="self-pay">Pay My Bills</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <a href="../southview_payment/payment-management2.php"><button type="button" class="btn active"
                                id="anyone-pay">Pay For Anyone</button></a>
                    </div>
                </div>
                <div class="mx-5 my-5 " id="grey-bg2" style="background-color: #C4C4C4;">
                    <div class="container">
                        
                            <div class="row">
                                <div class="col" id="p-text-2">
                                    <label>Payee SV-ID</label><br><input type="text" class="form-control" required name="Resident_svID"><br>
                                    <label>Payer E-Mail</label><br><input type="email" class="form-control" required name="Email">
                                </div>
                                <div class="col" id="p-text-2">
                                    <label><strong>RM<strong></label><input type="text" placeholder="0.00"
                                        class="form-control" required name="Payment_Amount">
                                </div>
                                <div class="col" id="p-text-2">

                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-9 col-md col-sm"></div>
                    <div class="col-lg-3 mb-3 col-md-5 col-sm-9 col-xs-12">
                        <button type="submit" class="btn" id="btn-setting" name="paid" value="paid" onclick="return val()">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- footer -->
    <script type="text/javascript" src="../southview_payment/payment.js"></script>
</body>

</html>