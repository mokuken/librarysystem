<?php
	include("connectToDatabase.php");

	if (isset($_POST['submit'])) {
		if ($_FILES['image']['size'] > 0) {
			// User uploaded an image
			$image_size = $_FILES['image']['size'];
			$image_data = file_get_contents($_FILES['image']['tmp_name']);
			$image_data = mysqli_real_escape_string($database, $image_data);
		} else {
			// User did not upload an image, use a default image from a folder
			$default_image_path = '../images/none.png'; // Update this with the path to your default image
			$image_data = file_get_contents($default_image_path);
			$image_data = mysqli_real_escape_string($database, $image_data);
		}
		
		$studentID = $_POST['studentID'];
		$studentName = $_POST['studentName'];
		$studentCourse = $_POST['studentCourse'];

		$verify_query = mysqli_query($database, "SELECT studentID FROM students WHERE studentID='$studentID'");
				
		if(mysqli_num_rows($verify_query) != 0 ) {
			$errorText = "Student ID is already exist, please try different ID number";
			$errorStyle = "font-weight: bold;color: #ff6a6a;text-align: center;";
			$error = "<div id='confirmation' style='display: block;'><div class='dimBackground'></div><div class='okConfimation'><h2 style='$errorStyle'>$errorText</h2><button onclick='ok()'>Ok</button></div></div>";
		} else {
			mysqli_query($database, "INSERT INTO students(studentID, studentProfile, studentName, studentCourse) VALUES('$studentID', '$image_data', '$studentName', '$studentCourse')");
			$errorText = "Student Added Succesfully";
			$errorStyle = "display: block;";
			$error = "<div id='confirmation' style='$errorStyle'><div class='dimBackground'></div><div class='okConfimation'><h2>$errorText</h2><button onclick='ok()'>Ok</button></div></div>";
		}
		
	}
	$nothing = "<! -- Just Blank -->";
	if(!empty($error)) {
		$notice = $error;
	} else {
		$notice = $nothing;	
	}

	$database->close();
?>
