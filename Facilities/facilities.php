<?php include "../checkLogin.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Southview Condominium Website</title>
	<link rel="stylesheet" href="styleFacilities.css">
	<link rel="icon" href="images/Logo SV.png">
	<script src="scriptFacilities.js"></script>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<section>
		<!-- Facilities Page -->
		<section class="faci-content" id="faci-content"></section>
		<div class="max-width">
			<div class="carousel owl-carousel">
				<div class="card">
					<div class="box">
						<img src="images/swimmingsv.jpg" alt="">
						<div class="text">SWIMMING POOL</div>
						<p><strong><span>Operating Hours:</span></strong><br>9:00 a.m. - 9:00
							p.m.<br><br><strong><span>Location:</span></strong><br>3rd floor</p>
					</div>
				</div>
				<div class="card">
					<div class="box">
						<img src="images/gymsv.jpg" alt="">
						<div class="text">GYMNASIUM</div>
						<p><strong><span>Operating Hours:</span></strong><br>9:00 a.m. - 9:00
							p.m.<br><br><strong><span>Location:</span></strong><br>3rd floor</p>
					</div>
				</div>
				<div class="card">
					<div class="box">
						<img src="images/multipurposehall.jpg" alt="">
						<div class="text">MULTIPURPOSE HALL</div>
						<p><strong><span>Operating Hours:</span></strong><br>9:00 a.m. - 9:00
							p.m.<br><br><strong><span>Location:</span></strong><br>3rd floor</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- JavaScript Coding -->
	<script src="/navigation/navigation.js"></script>
	<script type="text/javascript">
		document.getElementById("myButton").onclick = function () {
			location.href = "indexHomepage.php";
		};
	</script>
</body>
</html>