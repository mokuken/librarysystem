<?php
	session_start();
	include("config/connectToDatabase.php");
	include("config/visitCounter.php");
	include("config/validateStudentID.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/main.css">
	</head>
	<body>
		<div class="sidebox">
			<a href="#" class="active">
				<img src = "svg/user-plus.svg" alt="add a user"/>
			</a>
			<a href="#">
				<img src = "svg/identification.svg" alt="info"/>
			</a>
			<a href="adminLogin.php">
				<img src = "svg/adjustments-horizontal.svg" alt="admin panel"/>
			</a>
		</div>

		<div class="card">
			<div class="column">
				<div class="container">
					<img class="logo" src="images/logo.png" />
					<h1>CAPSU LIBRARY</h1>
					<h2>WELCOME</h2>
				</div>
			</div>
			<div class="column">
				<div class="container">
					<div class="statistics">
						<div class="box">
							<h3>Today's Visits</h3>
							<h1>
								<?php
									echo $todayVisits;
								?>
							</h1>
						</div>
						<div class="box">
							<h3>Total Visits</h3>
							<h1>
								<?php
									echo $totalVisits;
								?>
							</h1>
						</div>
					</div>
					<?php
						echo $notice;
					?>
					<form action="" method="post" class="idInput">
						<input type="text" name="studentID" placeholder="Enter Student ID" required id="studentID">
						<input class="submit" type="submit" name="submit" value="Confirm" required>
					</form>				
				</div>
			</div>
		</div>
		<script>
			// Focus on the input element
			document.addEventListener('DOMContentLoaded', function() {
			  var myInput = document.getElementById('studentID');

			  myInput.focus();
			});
		</script>
	</body>
</html>
