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
						<img src="../images/none.PNG" alt="Image Preview" class="image-preview" id="imagePreview">
						<br>
						<input type="file" name="image" id="image" onchange="previewImage()">
						<br>
						<input type="text" name="studentID" id="schoolID" required placeholder="Student ID">
						<br>
						<input type="text" name="studentName" id="studentName" required placeholder="Student Name ">
						<br>
						<label form="studentName">Course</label>
						<select name="studentCourse" id="studentCourse" required>
							<option value="Computer Science">Computer Science</option>
							<option value="English Language">English Language</option>
							<option value="Food Technology">Food Technology</option>
							<option value="Office Administration">Office Administration</option>
						</select>
						<input type="submit" name="submit" value="Add Student" required class="submitBtn">
					</form>
				</div>
			</div>
		</div>
		<?php
			echo $notice;
		?>
		<script>
			function previewImage() {
				var fileInput = document.getElementById('image');
				var imagePreview = document.getElementById('imagePreview');

				var file = fileInput.files[0];

				if (file) {
					var reader = new FileReader();

					reader.onload = function (e) {
					imagePreview.src = e.target.result;
					};

					reader.readAsDataURL(file);
				} else {
					imagePreview.src = '#'; // Clear the preview if no file is selected
				}
			}

			function ok() {
				var ok = document.getElementById('ok');
				var confirmation = document.getElementById('confirmation');

				confirmation.style.display = 'none';
			}
		</script>
	</body>
</html>
