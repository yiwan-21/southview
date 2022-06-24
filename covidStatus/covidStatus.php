<?php
session_start();
include "../checkLogin.php";
include 'INCLUDES/dbh.inc.php';
include 'INCLUDES/user.inc.php';
include "../connect.php";


if (isset($_POST['service_submit'])) {
    $dbh = new dbh();
    $connect = $dbh->connect();
    $Resident_svID = $_SESSION['svid'];
    $service = $_POST['service'];
    $text = trim($_POST['message']);
    $sql = "INSERT INTO `message` (Resident_svID, Service_Type, Message_Content) VALUES (" . $Resident_svID . ", '" . $service . "', '" . $text . "')";
    $connect->query($sql);
    $connect->close();
}


$query = "SELECT * FROM `covid-19 patient` WHERE `Resident_svID` = '" . $_SESSION['svid'] . "'";
$result = mysqli_query($conn, $query);
$startDate = "";
$endDate = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $startDate = $row['Date_Start'];
        $endDate = $row['Date_End'];
    }
}

$query2 = "SELECT Ans_1 FROM health_declaration WHERE Resident_svID = '" . $_SESSION['svid'] . "' ORDER BY Form_ID DESC LIMIT 1";
$result2 = mysqli_query($conn, $query2);
$symptom = "";
if (mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $Ques1 = $row2['Ans_1'];
    if (
        strpos($Ques1, 'Fever') !== FALSE ||
        strpos($Ques1, 'Shortness of breath') !== FALSE ||
        strpos($Ques1, 'Difficulty breathing') !== FALSE ||
        strpos($Ques1, 'Cough') !== FALSE
    ) {
        $symptom = "Severe";
    } else if (strpos($Ques1, 'None of the above') !== FALSE) {
        $symptom = "Symptomless";
    } else {
        $symptom = "Slight";
    }
}


mysqli_close($conn);

if (isset($_POST['submit']) && count($_FILES) > 0) {
    include "../connect.php";
    $data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $type = $_FILES['file']['type'];
    $query = "UPDATE `covid-19 patient` SET `Testkit_Result` = '" . $data . "', `Mime` = '" . $type . "' WHERE `Resident_svID` = '" . $_SESSION['svid'] . "'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Status</title>
    <link rel="icon" href="/images/Logo SV.png">
    <link rel="stylesheet" href="covidStatus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tab">
        <h1>I AM CURRENTLY UNDER QUARANTINE</h1>
        <div class="grid">
            <div class="day"></div>
            <h2 class="until"></h2>

            <div class="progress">
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>

            <div class="symptom">
                <h4>Symptom</h4>
                <div class="symptom-block">Symptomless</div>
                <div class="symptom-block">Slight</div>
                <div class="symptom-block">Severe</div>
            </div>

            <form class="upload" enctype="multipart/form-data" method="post">
                <input type="file" name="file" accept="image/*" />
                <button type="submit" id="submit" name="submit">Submit</button>
            </form>

            <div class="actions">
                <div class="action">QUARANTINE SERVICES</div>
                <div class="action">HEALTH DECLARATION</div>
                <div class="action">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="31" height="31" fill="url(#pattern0)" />
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_237_906" transform="scale(0.01)" />
                            </pattern>
                            <image id="image0_237_906" width="100" height="100" xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                    Test Kit Result
                </div>
            </div>

            <div class="daily">
                <h2>Daily</h2>
                <p class="cases">
                    <span>Active Cases</span>
                    <span><?php $users = new User();
                            $users->dailyCase(); ?></span>
                </p>
                <p class="cases">
                    <span>Recovered</span>
                    <span><?php $users = new User();
                            $users->dailyRecovered(); ?></span>
                </p>
            </div>
            <div class="weekly">
                <h2>Weekly</h2>
                <p class="cases">
                    <span>Active Cases</span>
                    <span><?php $users = new User();
                            $users->weeklyCase(); ?></span>
                </p>
                <p class="cases">
                    <span>Recovered</span>
                    <span><?php $users = new User();
                            $users->weeklyRecovered(); ?></span>
                </p>
            </div>
            <h2 class="total">
                <span>Total Active Cases</span>
                <span><?php $users = new User();
                        $users->getAllCase(); ?></span>
            </h2>
        </div>

    </div>
    <div class="service">
        <form action="covidStatus.php" method="post">
            <div class="selection">
                <h3>Service needed: </h3>
                <select name="service" id="service">
                    <option value="Taking Delivery">Taking Delivery</option>
                    <option value="Food and Drink Order">Food and Drink Order</option>
                    <option value="Daily Necessities">Daily Necessities</option>
                    <option value="Clinical Assist">Clinical Assist</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="message">
                <h3>Message: </h3>
                <textarea name="message" id="message" cols="45" rows="7"></textarea>
            </div>
            <div class="service-buttons">
                <button onclick="closeService()">Close</button>
                <button type="submit" name="service_submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script>
        const startDate = new Date('<?php echo $startDate; ?>');
        const endDate = new Date('<?php echo $endDate; ?>');
        const currentDate = new Date(new Date().toLocaleDateString());
        currentDate.setHours(8);
        const currDay = currentDate.getDate() - startDate.getDate() + 1;
        const totalDay = endDate.getDate() - startDate.getDate() + 1;
        const day = document.querySelector('.day');
        const progress = document.querySelector('.progress');

        day.innerHTML = `<h1>Day ${currDay}</h1>`;
        const progressInnerHTML = progress.innerHTML;
        progress.innerHTML = `<p class="day-count">Day ${currDay}/${totalDay}</p>${progressInnerHTML}`;

        const until = document.querySelector('.until');
        const month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        until.innerHTML = `Until Day ${totalDay}, ${endDate.getDate()} ${month[endDate.getMonth()]} ${endDate.getFullYear()}`;

        const dayCount = document.querySelector('.day-count');
        const progressFill = document.querySelector('.progress-fill');
        dayCount.style.marginLeft = `${((currDay - 1) / totalDay) * 100}%`;
        progressFill.style.width = `${currDay / totalDay * 100}%`;

        const symptomBlocks = document.querySelectorAll('.symptom-block');
        const symptomClasses = ['symptomless', 'slight', 'severe'];
        symptom = "<?php echo $symptom ?>";
        if (symptom.toLowerCase() == "severe") {
            symptomBlocks[2].classList.add(symptomClasses[2]);
        } else if (symptom.toLowerCase() == "slight") {
            symptomBlocks[1].classList.add(symptomClasses[1]);
        } else {
            symptomBlocks[0].classList.add(symptomClasses[0]);
        }
        //// Let resident set their own symptom
        // symptomBlocks[0].classList.add(symptomClasses[0]);
        // symptomBlocks.forEach((block, index) => {
        //     block.addEventListener('click', () => {
        //         symptomBlocks.forEach(block => {
        //             block.classList.remove('symptomless', 'slight', 'severe');
        //         });
        //         block.classList.add(symptomClasses[index]);
        //     });
        // });

        const service = document.querySelector('.service');
        const tab = document.querySelector('.tab');
        const upload = document.querySelector('.upload');
        const actions = document.querySelectorAll('.action');
        //quarantine service
        actions[0].addEventListener('click', () => {
            service.classList.add('service-active');
            tab.classList.add('tab-open');
            setTimeout(() => {
                const tabListener = tab.addEventListener('mousedown', () => {
                    service.classList.remove('service-active');
                    tab.classList.remove('tab-open');
                    tab.removeEventListener('mousedown', tabListener);
                });
            }, 100)
        })
        //health declaration
        actions[1].addEventListener('click', () => {
            window.location.href = 'health.php';
        })
        //test kit
        actions[2].addEventListener('click', () => {
            upload.classList.toggle('upload-active');
        })

        function handleFileUpload(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const file = Array.from(formData.values())[0]
            // console.log(file);
        }

        function closeService() {
            service.classList.remove('service-active');
            tab.classList.remove('tab-open');
        }
    </script>
</body>

</html>