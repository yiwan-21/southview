<?php
session_start();
include "../checkLogin.php";
// if(isset($_SESSION["svid"])) {
//     echo "<script>console.log('Session svid: " . $_SESSION["svid"] . "' );</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Southview Condominium Website</title>
	<link rel="stylesheet" href="styleHomepage.css">
	<link rel="icon" href="images/Logo SV.png">
	<script src="scriptHomepage.js"></script>
	<!-- CSS only -->
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	 <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<!-- FontAwesome CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</head>

<body>
	<!-- Home Section Styling -->
	<section class="home" id="home">
		<div class="box1">
			<img class="sv_1_general" src="images/Southview-Background-Normal.png" style="width: 100%"
				alt="southview-background">
			<div class="overview">
				<img class="svswimpool rounded-corners" src="images/svswimmingpool.webp" alt="">
				<div class="desc">
					<h4>SOUTH VIEW SERVICED APARTMENT</h4>
					<p>South View Serviced Apartments is a freehold high-end high-rise luxury serviced residence in the affluent locale of Bangsar South in Kampung Kerinchi. Sitting strategically on the border of Kuala Lumpur and Petaling Jaya, South View Serviced Apartments enjoy the ease of accessibility and connectivity, and convenience and choices are aplenty......</p>
				</div>
			</div>
		</div>
	</section>

	<section class="officehour" id="officehour">
		<div class="box2"><img class="sv_2_white" src="images/svfrontwhite.png" style="width: 100%"
				alt="southviewfront"></div>
		<div class="opendays">
			<h3>Office Operating Hours</h3><br><br>
			<p>Here is our office hours:<br><br>

				<strong>Monday - Thursday</strong><br>
				9:00 a.m. - 6:00 p.m.<br>
				
				<strong>Friday</strong><br>
				9:00 a.m. - 12:00 p.m.<br>
				Rest<br>
				2:30 p.m. - 5:30 p.m.<br>
				<strong>Weekend</strong><br>
				9:00 a.m. - 4:00 p.m.
			</p>
		</div>
	</section>

	<section class="facilities" id="facilities">
		<div class="text-facilities">
			<h4>We are providing the <span>best facilities</span> to fit your life</h4>
			<p>In South View, we have any kind of facilities to suit to the busy lifestyle of the citizens, including
				entertainment and health. South View definitely attracts the citizens to come as it has complete
				equipments in which the people are not required to hangout just for daily events and sports.</p>
			<button id="myButton" class="float-right submit-button">Learn More</button>
		</div>
		<div class="box3"><img class="sv_3_facilities" src="images/facilities.jpg" style="width: 100%"
			alt="southviewfront"></div>
	</section>

	<section class="announcement" id="announcement">
		<div class="box4">
			<img class="sv_pet" src="images/sv_pet.jpg" style="width: 100%" alt="southviewpet">
			<div class="titletext"><h2>Announcement</h2></div>
			<div class="innerbox">
				<h4>Warning! No Pets Allowed!</h4>
				<p>South View Serviced Apartment receives reports that there are some residents who bring pets into the condominium. This has affected other residents??? life significantly as the bark sounds disturb them from sleeping. The residents have to move their pets out of South View before 20 April 2022.</p>
			</div>
		</div>
	</section>

	<script src="../navigation/navigation.js"></script>
	<script type="text/javascript">
		document.getElementById("myButton").onclick = function () {
			location.href = "../Facilities/facilities.php";
		};
	</script>
</body>
</html>