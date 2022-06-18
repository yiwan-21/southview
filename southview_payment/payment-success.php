<?php
    include '../connect.php';
    include '../checkLogin.php';
    //session_start();
    // $_SESSION['svid'] = 1;
    // $_SESSION['paymentid'] =3;

    $sql="SELECT * FROM payment ORDER BY Payment_ID DESC LIMIT 1"; 
    $result=mysqli_query($conn, $sql);
    $singleRow  = mysqli_fetch_assoc($result);
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    <?php
        include "../southview_payment/payment.css";
        // echo $_SESSION['svid'];
    ?>
</style>
<body>
  <!-- nav bar -->
  <script src="/navigation/navigation.js"></script>
  
  <div class="container white_boundary my-5">
    <div class="mx-5 my-5" id="downloadarea">
      <div>
        <div class="row text-center">
          <div class="payment-banner col-lg-2">
          </div>
          <div class="payment-banner col-lg-1">
            <img src="/southview_payment/images/tick.png" class="tick">
          </div>
          <div class="payment-banner col-lg-8 mt-5">
            Payment Successful
          </div>
          <div class="payment-banner col-lg-1">
          </div>
        </div>
        <div class="mx-5 py-1 " id="grey-bg" style="background-color: #C4C4C4;">
          <div class="mx-5">
            <div class="payment-detail">
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-1"></div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                  <strong>Payment Type</strong>
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1">
                  <strong>:</strong>
                </div>
                <div class="col-lg-5 col-sm-5 col-md-5">
                  <?php echo $singleRow['Payment_Category'];?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2 col-sm-1 col-md-1"></div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                  <strong>SV-ID</strong>
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1">
                  <strong>:</strong>
                </div>
                <div class="col-lg-5 col-sm-5 col-md-5">
                  <?php
                    echo $singleRow['Resident_svID'];
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-1"></div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                  <strong>Amount</strong>
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1">
                  <strong>:</strong>
                </div>
                <div class="col-lg-5 col-sm-5 col-md-5">
                  RM <?php 
                  echo $singleRow['Payment_Amount']
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-1"></div>
                <div class="col-lg-4 col-sm-4 col-md-4">
                  <strong>Email</strong>
                </div>
                <div class="col-lg-1 col-sm-1 col-md-1">
                  <strong>:</strong>
                </div>
                <div class="col-lg-5 col-sm-5 col-md-6">
                  <?php 
                  echo $singleRow['Email'];
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row my-3">
          <div class="col-lg-6 col-12 text-center">
            <button type="button" class="btn" id="btn-pdf">
              Download as PDF
            </button>
          </div>
          <div class="col-lg-6 col-12 text-center">
            <a href="../Homepage/indexHomepage.php"><button type="button" class="btn" id="btn-setting2">Back to
                Home</button></a>
          </div>
        </div>

      </div>
  </div>
  <!-- footer -->
  <script type="text/javascript" src="../southview_payment/payment.js"></script>
</body>

</html>