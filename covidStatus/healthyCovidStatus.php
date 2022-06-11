<?PHP
    include "../connect.php";
    session_start();
    // echo "<script>console.log('Svid: " . $_SESSION['svid'] . "');</script>";
    // echo "<script>console.log('Password: " . $_SESSION['password'] . "');</script>";

    $query = "SELECT COUNT(*) FROM `covid-19 patient` WHERE `Resident_svID` = '" . $_SESSION['svid'] . "'";
    $result = mysqli_query($conn, $query);
    while($res = mysqli_fetch_array($result)){
        $count = $res[0];
        // echo "<script>console.log('count: " . $count . "');</script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="tab">
        <div class="grid">
            <div class="daily">
                <h2>Daily</h2>
                <p class="cases">
                    <span>Active Cases</span>
                </p>
                <p class="cases">
                    <span>Recovered</span>
                </p>
            </div>
            <div class="weekly">
                <h2>Weekly</h2>
                <p class="cases">
                    <span>Active Cases</span>
                </p>
                <p class="cases">
                    <span>Recovered</span>
                </p>
            </div>
            <h2 class="total">
                <span>Total Active Cases</span>
            </h2>

            <div class="health">HEALTH DECLARATION</div>
            <div class="report">I AM TESTED POSITIVE</div>
        </div>
    </div>

    <script src="/navigation/navigation.js"></script>
    <script>
        const cases = document.querySelectorAll('.cases');
        const total = document.querySelector('.total');
        let totalCases = 0;
        let amount = Math.floor(Math.random() * 20);
        totalCases += amount;
        cases[0].appendChild(document.createTextNode(amount));
        cases[1].appendChild(document.createTextNode(`${Math.abs(amount - Math.floor(Math.random() * 20))}`));
        amount = Math.floor(Math.random() * 150);
        totalCases += amount;
        cases[2].appendChild(document.createTextNode(amount));
        cases[3].appendChild(document.createTextNode(`${Math.abs(amount - Math.floor(Math.random() * 150))}`));
        total.appendChild(document.createTextNode(totalCases));

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