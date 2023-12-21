<?php
	session_start();

	include("../config/connectToDatabase.php");
	if(!isset($_SESSION['user_id'])) {
		header("location: ../adminLogin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../styles/adminPanel.css">
	</head>
	<body>
		<div class="sidebox">
			<a href="../main.php">
				<img src = "../svg/user-plus.svg" alt="add a user"/>
			</a>
			<a href="#">
				<img src = "../svg/identification.svg" alt="info"/>
			</a>
			<a href="#" class="active">
				<img src = "../svg/adjustments-horizontal.svg" alt="admin panel"/>
			</a>
		</div>
		
		<div class="card">
			<div class="column">
				<div class="container">
					<a class="active">History</a>
					<a href="../admin/adminPanelStudentList.php">Student List</a>
					<a href="../admin/adminPanelAddStudent.php">Add Student</a>
					<a href="../config/clearVisit.php">Logout</a>
				</div>
			</div>
			<div class="column">
				<div class="container">
					<div class="historyList">
						<?php
							include("../config/historyList.php");
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
