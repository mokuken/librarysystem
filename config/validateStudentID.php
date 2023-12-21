<?php
	include("connectToDatabase.php");
	
	if(isset($_POST['submit'])) {
		$getStudentID = mysqli_real_escape_string($database, $_POST['studentID']);
							
		$findStudentID = mysqli_query($database, "SELECT * FROM students WHERE studentID='$getStudentID'") or die("Student ID doesn't exist!");
		$validateStudentID = mysqli_fetch_assoc($findStudentID);
							
		if(is_array($validateStudentID) && !empty($validateStudentID)) {
			$_SESSION['validStudentID'] = $validateStudentID['studentID'];
		} else {
			$errorText = "ID Number Doesn't Exist, Please Try Again!";
			$errorStyle = "font-weight: bold;color: #ff6a6a;";
			$error = "<p style='$errorStyle'>$errorText</p>";
		}

		if(isset($_SESSION['validStudentID'])) {
			header("Location: info.php");
		}
	} else {
		$warningText = "Please fill this up before proceeding to ibrary";
		$warningStyle = "font-weight: bold;";
		$warning = "<p style='$warningStyle'>$warningText</p>";
	}
	
	if(!empty($warning)) {
		$notice = $warning;
	} else {
		$notice = $error;	
	}
	
	$database->close();
?>