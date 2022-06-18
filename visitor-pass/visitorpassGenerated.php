<?php
session_start();
include '../checkLogin.php';
include '../connect.php';

$visitorID = $_SESSION['Visitor_ID'];

$sql = "SELECT * FROM visitor ORDER BY Visitor_ID DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$singleRow  = mysqli_fetch_assoc($result);

$visitorID = $singleRow['Visitor_ID'];
$vname = $singleRow['Visitor_Name'];
$vehicle = $singleRow['Vehicle_No'];
$mob = $singleRow['Phone_No'];
$date = $singleRow['Date'];
$stime = $singleRow['Start_Time'];
$etime = $singleRow['End_Time'];

$data = "Visitor ID : " . $visitorID
    . "%0A" . "Visitor Name : " . $vname
    . "%0A" . "Vehicle No : " . $vehicle
    . "%0A" . "Phone No : " . $mob
    . "%0A" . "Date : " . $date
    . "%0A" . "Start Time : " . $stime
    . "%0A" . "End Time : " . $etime;

$width = "200";
$height = "200";

$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$data}";
$output["img"] = $url;

?>

<!DOCTYPE html>
<html lan="en" and dir="Itr">

<head>
    <meta charset="utf-8">
    <title>Visitor Pass Generated</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>

<body>

    <script src="/navigation/navigation.js"></script>

    <div class="box2">
        <div id="content" class="background">
            <img id="image1" src="images/Logo SV transaparent.png">
            <h1>
                Visitor Pass
            </h1>
            <h2>SOUTH VIEW Serviced Apartments</h2>

            <?php if (isset($output)) {
                echo '<div class="mb-3">
                <img src="' . $url . '" alt="QR Code" width="30%" height="50%">
                </div>';
            } ?>

            <h5>Visitor Pass ID : <?php echo $singleRow['Visitor_ID']; ?></h5>
            <p style="font-style: italic;">
                This is the property of the management. Please shows the QR code when you received at the guardhouse for identification purpose. Thank you for your kind co-operation.
            </p>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </div>
        <button class="btn" id="download" onclick="downloadPDF()"><i class="fa fa-download"></i> Download</button>
    </div>
    <script>
        function downloadPDF() {
            const content = this.document.getElementById("content");
            var opt = {
                margin: 1,
                filename: 'visitor pass.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    allowTaint: false,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'cm',
                    format: 'letter',
                    orientation: 'landscape'
                }
            };
            html2pdf().from(content).set(opt).save();

        }
    </script>
</body>

</html>