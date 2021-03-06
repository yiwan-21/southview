<?php include "../checkLogin.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../southview_payment/images/Logo SV.png">
    <title>South View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../southview_payment/payment.css">
</head>

<body>
    <!-- nav bar -->
    <script src="/navigation/navigation.js"></script>
    
    <div class="container">
    <div class="mx-5 my-5 card white_boundary">
        <h1>Payment</h1>
        <div class="row mt-3 mb-5 mx-5 my-5">
            <div class="col-lg-4  col-md-12  border-0 card-setting">
                <a href="../southview_payment/payment-management1.php">
                    <div class="card py-3 card-color">
                        <img class="card-img-top card-img img-fluid" src="../southview_payment/images/management.png"
                            alt="managment icon">
                        <div class="card-body">
                            <h2 class="card-title text-center">Management</h2>
                            <!-- <p class="fw-bold">Endless Cup $2.00</p>
                  <p class="card-text">Regular house blend, decaffeinated coffee, or flavor of the day.</p> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12  border-0 card-setting">
                <a href="../southview_payment/payment-sewage1.php">
                    <div class="card py-3 card-color">
                        <img class="card-img-top card-img img-fluid" src="../southview_payment/images/sewage.png"
                            alt="sewage icon">
                        <div class="card-body">
                            <h2 class="card-title text-center">Sewage</h2>
                            <!-- <p class="fw-bold">Single $2.00 Double $3.00</p>
                  <p class="card-text">House blended coffee infused into a smooth, steamed milk.</p> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12 border-0 card-setting">
                <a href="../southview_payment/payment-parking1.php">
                    <div class="card py-3 card-color">
                        <!-- <img class="card-img-top card-img" src="/southview/southview_payment/images/parking.png" -->
                        <svg class="card-img-top card-img img-fluid" width="209" height="209" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="209" height="209" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_175_495" transform="scale(0.0111111)"/>
                            </pattern>
                            <image id="image0_175_495" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAFGElEQVR4nO2cT2xURRzHP9TSbbcqkCZiitFEIHAiMYqKRqOJVznoCb1LYjQxBlMu0sLFGhONBw9yFzwa4GA8oURMjARPKrboxTVBA9p/a0u1cJi36XY7M29mdt68t/X3SX55W968+X1/X96+N292dkEQBEEQBEEQBEEQBGHjsClBjt3AIeBpYC8wAgwmyGtjEbgO/Ah8BZwCrpaqqAv2AOeAFeBWxeM/4AzqpOgpXgOWKN9A31gEXi3Aj0L4gPIN6zbei+5KZN6ifJNixZuRvYnGPuAm5RsUK5aBh6I6FIkLmEU3gfeBR4EtZQlsYyvwGOoy18Ss+8uyBJrYj1nsL8CD5UnLZSfwK2b9+8uTtp6T6EXOAveXqMuVB1BadTWcLFHXGgZQg3+dyHFN+zpwAphGDQGngePAkEOed4HfgQYwmf2bDZ9c44YabjjkScJB9AJvop4C26kD3xjaX8Ru9qTmmElLe99cI5jH/gcteZJxCr24s5q2JwxtWzFhydPQtG9Y2ofkOmtoe9qSJwl3AvPoxb2saT9taNuKKUsuX6NDcr1kaLuQ1VoaJmHz6IXlPZYvWnLpLh3vWNqH5BrG78RJhu9bLe8s+9mSawBldgO3m2FoLtOl8JwlV6GMYH4SNN08jhvat0I3SgklNNfzhva6m3sSDhsEXcd8pg2h7vi6474mf4jnQ2gu23D1cER9zpw3iMkb4A+h7vhTqOvoFOrsimlyt7lMD2DnC9BoZRQ1Wa4T80xqMQXwLPraVlBPkck4YhDSAPpSCimIPvTDyVuo2pNxySDis5QiCuYM+hovhXQW8uHsHuAnw75rqJm6pmH/MLADuDfbbs9iG2r6dAtwd7ato25Mw23H3wX0Z6//Beba9i2gRgZNYAY1STSTxV+ZtmvAb9m2kR2jo46a0bvHsH8vcMWwT0t/fpN1HLLs2466YXwI3AHs6ohtAflM9Hf0F9L3DdR4+2q2nUbde97AbDIoD2zTBVG4gn18+n8I21RBFB6pQJFViYd9jPMdIbzi2X4jU8jDyyDwKeWfRVWL00CtC1/XMAB8UYGiqhqfA5uD3W3j4woUU/X4KNjdjOcqUEQvxArqsT2Y7ypQRK/Et4Ee82QFxPdaPG4y0za8e8GyT9DzommHzegDjp03gWOoR+xath0H/nFVh5qjGEPNf2yKFDuAo1nfrnRbi6tna/iT/LfKAua3ywHs69raYyxEoCNjjhpi1PJHiMBlh47fzunDtPqnM0ZDBDoy6qghRi3LIQJdxO3M6WOXYz9VMDpWLd64dJq3Jq3m2E+Rl46jjhpi1eJNjLNgt2M/SyizY57Zo1mfrt+liVWLNy6dHsvpY8KxnypErFq8cem0iXlI8wTuo44qRKxavPEROI66WQxk2wnU2LNs80LM7rYWLbYPZ4P+dwS9pxthDUZPIEYnQoxOhBidCDE6EWJ0IsToRIjRiRCjEyFGJyJk2a6Jp1BLx7ai5m6HUeuZa6g1z/XsdWuNc+vvQdR3Sjaz+t3EPtb/3ETnWmlYXRPdzgxqnQWo7wwuo+YqFlFTpk1W11a3/p7NXs9lfS4Bf2fHXPDwwEjMuY4UvzhWBlF8kEtHIsToRNiMnvfoZ7ZbIRUmig82o3/wSODTtteI4oPN6E88Evi07TUK96EGfE/+RzeXqchP4RREEh/uy0lyGbXGbaOTxIca8Drq94nmsriI+v3RjXwmdyI+CIIgCIIgCIIgCIIgCIIghHMbn0uOYmjAnw8AAAAASUVORK5CYII="/>
                            </defs>
                            </svg>
                            
                            <!-- alt="parking icon"> -->
                        <div class="card-body">
                            <h2 class="card-title text-center">Parking</h2>
                            <!-- <p class="fw-bold">Single $4.75 Double $5.75</p>
                  <p class="card-text">Sweetened espresso blended with icy-cold milk and served in a chilled glass.</p> -->
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- footer -->
    <script type="text/javascript" src="../southview_payment/payment.js"></script>
    </div>
</body>

</html>
