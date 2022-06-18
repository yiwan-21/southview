<?php
session_start();
include '../checkLogin.php';
include 'INCLUDES/dbh.inc.php';
$dbh = new dbh();
$conn = $dbh->connect();

$Resident_svID = $_SESSION['svid'];
$stmt = $conn->prepare("SELECT Resident_svID FROM `covid-19 patient` WHERE `Resident_svID` = ?");
$stmt->bind_param("s", $Resident_svID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (isset($row['Resident_svID'])) {
    $patient_svID = $row['Resident_svID'];
    if ($patient_svID == $Resident_svID) {
        Header("Location: ../covidStatus/covidStatus.php");
    }
}

if (isset($_POST['submit'])) {
    $sql = 'SELECT Unit, `Name` FROM resident WHERE Resident_svID = \'' . $Resident_svID . '\'';
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $Unit = $row["Unit"];
    $Name = $row["Name"];

    $Q1 = implode(",", $_POST['Q1']);
    $Q2 = $_POST['Q2'];
    $Q3 = $_POST['Q3'];
    $Q3_end = date("Y-m-d", strtotime($Q3 . "+1 week"));
    $Q4 = $_POST['Q4'];
    $Q5 = $_POST['Q5'];

    if (empty($Q1)) {
        echo "<script>alert('Please filled in required field');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO `covid-19 patient` (Resident_svID, Unit, `Name`, Symptom, Self_Living, Date_Start, Date_End, Test_Type, `Pre-Existing_Disease`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssissss', $Resident_svID, $Unit, $Name, $Q1, $Q2, $Q3, $Q3_end, $Q4, $Q5);
        $stmt->execute();
        $stmt->close();
        echo '<script>window.location.href = \'covidStatus.php\';</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Positive</title>
    <link rel="icon" href="/images/Logo SV.png">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tab">
        <h2>REPORT POSITIVE</h2>
        <form action='report.php' class="form" method='post'>
            <div class="question">
                <label for="Q1">1. Do you have any of the following symptoms?<span class="red">*</span></label>
                <div class="answer checkbox required">
                    <input type="checkbox" name="Q1[]" value="Fever" id="remove">
                    <label for="fever">Fever</label>
                    <input type="checkbox" name="Q1[]" value="Cough" id="remove">
                    <label for="cough">Cough</label>
                    <input type="checkbox" name="Q1[]" value="Shortness of breath" id="remove">
                    <label for="shortness">Shortness of breath</label>
                    <input type="checkbox" name="Q1[]" value="Sore throat" id="remove">
                    <label for="sore">Sore throat</label>
                    <input type="checkbox" name="Q1[]" value="Difficulty breathing" id="remove">
                    <label for="difficulty">Difficulty breathing</label>
                    <input type="checkbox" name="Q1[]" value="Runny nose" id="remove">
                    <label for="runny">Runny nose</label>
                    <input type="checkbox" name="Q1[]" value="Loss of taste or smell" id="remove">
                    <label for="taste">Loss of taste or smell</label>
                    <input type="checkbox" name="Q1[]" value="Other" id="remove">
                    <label for="other">Other</label>
                    <input type="checkbox" name="Q1[]" value="None of the above" id="remove">
                    <label for="none">None of the above</label>
                </div>
            </div>
            <div class="question">
                <label for="Q2">2. Are you staying alone in the appartment?<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Q2" value=1 id="yes" required>
                    <label for="saliva">Yes</label>
                    <input type="radio" name="Q2" value=0 id="no">
                    <label for="nasal">No</label>
                </div>
            </div>
            <div class="question">
                <label for="Q3">3. When did symptoms start?<span class="red">*</span></label>
                <div class="answer">
                    <input type="date" name="Q3" id="date" required>
                </div>
            </div>
            <div class="question">
                <label for="Q4">4. Type of test<span class="red">*</span></label>
                <div class="answer">
                    <input type="radio" name="Q4" value="Self-test-saliva" id="saliva" required>
                    <label for="saliva">Self test saliva</label>
                    <input type="radio" name="Q4" value="Self-test-nasal" id="nasal">
                    <label for="nasal">Self test nasal</label>
                    <input type="radio" name="Q4" value="PCR" id="pcr">
                    <label for="pcr">PCR</label>
                    <input type="radio" name="Q4" value="Other" id="other-4">
                    <label for="other-4">Other</label>

                </div>
            </div>
            <div class="question">
                <label for="Q5">5. Pre-existing disease (eg asthma, high blood pressure)</label>
                <div class="answer">
                    <input type="text" name="Q5" id="disease">
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
</body>

</html>