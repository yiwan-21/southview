<?PHP
session_start();
include "../checkLogin.php";
include "INCLUDES/dbh.inc.php";
include "INCLUDES/user.inc.php";
include "../connect.php";
// echo "<script>console.log('Svid: " . $_SESSION['svid'] . "');</script>";

$query = "SELECT COUNT(*) FROM `covid-19 patient` WHERE `Resident_svID` = '" . $_SESSION['svid'] . "'";
$result = mysqli_query($conn, $query);
while ($res = mysqli_fetch_array($result)) {
    $count = $res[0];
}

mysqli_close($conn);

if ($count == 1) {
    header("Location: ./covidStatus.php");
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
    <link rel="stylesheet" href="healthyCovidStatus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="tab">
        <div class="grid">
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

            <div class="health">HEALTH DECLARATION</div>
            <div class="report">I AM TESTED POSITIVE</div>
        </div>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script>
        const health = document.querySelector('.health');
        const report = document.querySelector('.report');
        health.addEventListener('click', () => {
            window.location.href = 'health.php';
        });
        report.addEventListener('click', () => {
            window.location.href = 'report.php';
        });
    </script>
</body>

</html>