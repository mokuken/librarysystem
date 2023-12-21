<?php
	session_start();

	include("../config/connectToDatabase.php");
	include("../config/addStudent.php");
	if(!isset($_SESSION['user_id'])) {
		header("location: ../adminLogin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../styles/adminPanelAddStudent.css">
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
					<a href="adminPanelHistory.php">History</a>
					<a href="../admin/adminPanelStudentList.php">Student List</a>
					<a class="active">Add Student</a>
					<a href="../config/clearVisit.php">Logout</a>
				</div>
			</div>
			<div class="column">
				<div class="container">
					<form action="" method="post" enctype="multipart/form-data">
						<label for="image">Choose Image:</label>
						<input type="file" name="image" id="image">
						<br>
						<label form="studentID">Student ID</label>
						<input type="text" name="studentID" id="schoolID" required>
						<br>
						<label form="studentName">Student Name</label>
						<input type="text" name="studentName" id="studentName" required>
						<br>
						<label form="studentName">Course</label>
						<select name="studentCourse" id="studentCourse" required>
							<option value="Computer Science">Computer Science</option>
							<option value="English Language">English Language</option>
							<option value="Food Technology">Food Technology</option>
							<option value="Office Administration">Office Administration</option>
						</select>
						<br>
						<input type="submit" name="submit" value="Add Student" required>
					</form>
					<?php
						echo $notice;
					?>
				</div>
			</div>
		</div>
	</body>
</html>
