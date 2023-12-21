<?php
	session_start();
	
	include("config/connectToDatabase.php");
	include("config/getValidStudentID.php");
	if(!isset($_SESSION['validStudentID'])) {
		header("location: main.php");
	}

	include("config/displayStudentProfile.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/info.css">
	</head>
	<body>
		<div class="sidebox">
			<a href="#">
				<img src = "svg/user-plus.svg" alt="add a user"/>
			</a>
			<a href="#" class="active">
				<img src = "svg/identification.svg" alt="info"/>
			</a>
			<a href="#">
				<img src = "svg/adjustments-horizontal.svg" alt="admin panel"/>
			</a>
		</div>
		<div class="card" id="card">
			<div class="row">
				<div class="left">
					<?php
						echo $displayStudentProfile;
					?>
				</div>
				<div class="right">
					<?php
						echo "<h1 id='test'>$studentName</h1>";
						echo "<h2 id='testC'>$studentCourse</h2>";
					?>
				</div>
			</div>
			<div class="row">
				<div class="bottom">
					<a>
						<h3>ID Number</h3>
						<h2 id="studentIDNumber">
							<?php
								echo $studentID;
							?>
						</h2>
					</a>
					<a>
						<h3>Time - In</h3>
						<h2>
							<?php
								echo date('h:i A');
							?>
						</h2>
					</a>
					<a href="config/clearVisit.php">
						<button id="countdown">Continue (10)</button>
					</a>
				</div>
			</div>
		</div>
		<script>
			var myInput = document.getElementById('countdown');		
			var studentIDNumber = document.getElementById("studentIDNumber");
			var card = document.getElementById("card");
			var profile = document.getElementById('profile');
			
			let count = 9;
			let interval = setInterval(() => {
				// Focus on the input element
				myInput.focus();
				
				myInput.textContent = `Continue (${count})`;
				if (count === 0) {
					clearInterval(interval);
					window.location.href = "config/clearVisit.php";
				} else {
					count--;
				}
			}, 1000);
			
			if (studentIDNumber.innerText === "2021-131430") {
				card.style.backgroundImage = "url('images/bg.gif')";
				card.style.border = "3px solid #df5055";
				profile.style.backdropFilter = "blur(5px)";
				profile.style.backgroundColor = "rgba(223, 80, 85, 0.3)";
				myInput.style.backgroundColor = "rgba(223, 80, 85, 0.2)";
				myInput.style.backdropFilter = "blur(5px)";
				document.getElementById('test').style.fontFamily = "CloneAge";
				document.getElementById('test').style.fontSize = "40px";
			}
		</script>
	</body>
</html>
