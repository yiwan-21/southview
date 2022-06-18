<?php
session_start();
include '../checkLogin.php';
include 'INCLUDES/dbh.inc.php';
$dbh = new dbh();
$conn = $dbh->connect();

$Resident_svID = $_SESSION['svid'];

if (isset($_POST['submit'])) {
    $Ques1 = $_POST['Ques1'];
    $Ques2 = $_POST['Ques2'];
    $Ques3 = $_POST['Ques3'];
    $Ques4 = $_POST['Ques4'];
    $Ques5 = $_POST['Ques5'];

    $Ques1 = implode(', ', $Ques1);
    if (empty($Ques1)) {
        echo "<script>alert('Please filled in required field');</script>";
    } else {
        //// Update Symptom in covid-19 patient table
        $symptom = "";
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
        $stmt = $conn->prepare("UPDATE `covid-19 patient` SET `Symptom` = ? WHERE `Resident_svID` = ?");
        $stmt->bind_param("ss", $symptom, $Resident_svID);
        $stmt->execute();

        //// Insert into health declaration table
        $stmt = $conn->prepare("INSERT INTO health_declaration (Resident_svID, Ans_1, Ans_2, Ans_3, Ans_4, Ans_5) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssss', $Resident_svID, $Ques1, $Ques2, $Ques3, $Ques4, $Ques5);
        $stmt->execute();

        //// Update Date_End in covid-19 patient table
        $stmt = $conn->prepare("SELECT Date_End FROM `covid-19 patient` WHERE `Resident_svID` = ?");
        $stmt->bind_param("s", $Resident_svID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $Date_End = $row['Date_End'];
        $Days = date_diff(date_create($Date_End), date_create('now'), 'Asia/Singapore')->format("%a");
        if ($Days === 0) {
            $newDays = date_create('now', new DateTimeZone('Asia/Singapore'));
            if ($symptom === "Severe") {
                $newDays->modify('+3 day');
                $newDays = $newDays->format('Y-m-d');
                $stmt = $conn->prepare("UPDATE `covid-19 patient` SET `Date_End` = ? WHERE `Resident_svID` = ?");
                $stmt->bind_param("ss", $newDays, $Resident_svID);
                $stmt->execute();
            } else if ($symptom === "Slight") {
                $newDays->modify('+2 day');
                $newDays = $newDays->format('Y-m-d');
                $stmt = $conn->prepare("UPDATE `covid-19 patient` SET `Date_End` = ? WHERE `Resident_svID` = ?");
                $stmt->bind_param("ss", $newDays, $Resident_svID);
                $stmt->execute();
            } else {
                $newDays->modify('+1 day');
                $newDays = $newDays->format('Y-m-d');
                $stmt = $conn->prepare("UPDATE `covid-19 patient` SET `Date_End` = ? WHERE `Resident_svID` = ?");
                $stmt->bind_param("ss", $newDays, $Resident_svID);
                $stmt->execute();
            }
        }

        $stmt->close();
        echo '<script>window.location.href = \'healthyCovidStatus.php\';</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Declaration</title>
    <link rel="icon" href="/images/Logo SV.png">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tab">
        <h2>HEALTH DECLARATION</h2>
        <form action='health.php' class="form" method='post'>
            <div class="question">
                <label for="Ques1">1. Do you have any of the following symptoms?<span class="red">*</span></label>
                <div class="answer checkbox">
                    <input type="checkbox" name="Ques1[]" value="Fever" id="fever">
                    <label for="fever">Fever</label>
                    <input type="checkbox" name="Ques1[]" value="Cough" id="cough">
                    <label for="cough">Cough</label>
                    <input type="checkbox" name="Ques1[]" value="Shortness of breath" id="shortness">
                    <label for="shortness">Shortness of breath</label>
                    <input type="checkbox" name="Ques1[]" value="Sore throat" id="sore">
                    <label for="sore">Sore throat</label>
                    <input type="checkbox" name="Ques1[]" value="Difficulty breathing" id="difficulty">
                    <label for="difficulty">Difficulty breathing</label>
                    <input type="checkbox" name="Ques1[]" value="Runny nose" id="runny">
                    <label for="runny">Runny nose</label>
                    <input type="checkbox" name="Ques1[]" value="Loss of taste or smell" id="taste">
                    <label for="taste">Loss of taste or smell</label>
                    <input type="checkbox" name="Ques1[]" value="None of the above" id="none">
                    <label for="none">None of the above</label>
                </div>
            </div>
            <div class="question">
                <label for="Ques2">2. Have you had close contact with person confirmed or suspected to have COVID-19 within the last 14 days?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Ques2" value="Yes" id="yes-1" required>
                    <label for="yes-1">Yes</label>
                    <input type="radio" name="Ques2" value="No" id="no-1">
                    <label for="no-1">No</label>
                </div>
            </div>
            <div class="question">
                <label for="Ques3">3. Have you attended any event / areas associated with known COVID-19 cluster?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Ques3" value="Yes" id="yes-2" required>
                    <label for="yes-2">Yes</label>
                    <input type="radio" name="Ques3" value="No" id="no-2">
                    <label for="no-2">No</label>
                </div>
            </div>
            <div class="question">
                <label for="Ques4">4. Have you travelled overseas within the last 14 days?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Ques4" value="Yes" id="yes-3" required>
                    <label for="yes-3">Yes</label>
                    <input type="radio" name="Ques4" value="No" id="no-3">
                    <label for="no-3">No</label>
                </div>
            </div>
            <div class="question">
                <label for="Ques5">5. Are you a MOH COVID-19 volunteer in the last 14 days?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Ques5" value="Yes" id="yes-4" required>
                    <label for="yes-4">Yes</label>
                    <input type="radio" name="Ques5" value="No" id="no-4">
                    <label for="no-4">No</label>
                </div>
            </div>
            <div class="comfirmation">
                <input type="checkbox" name="confirmation" value="confirmation" required>
                <span>
                    I hereby declare that all the information given in this form is true and correct.<br>
                    Action can be taken if the information provded is false.
                </span>
            </div>
            <button type="submit" name="submit" class="submit">Submit</button>
        </form>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script>
        const required = document.querySelectorAll('.required');

        function handleFormSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            let isValid = false;
            Array.from(required[0].children).forEach(child => {
                if (child.checked) {
                    isValid = true;
                }
            });
            if (!isValid) {
                alert('Please fill out all required fields');
                return;
            }
            formData.forEach((value, key) => {
                console.log(key, value);
            });
            window.location.href = '/covidStatus/healthyCovidStatus.php';
        }
    </script>
</body>

</html>