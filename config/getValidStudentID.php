<?php
	$getValidStudentID = $_SESSION['validStudentID'];
	$getValidStudentData = mysqli_query($database, "SELECT * FROM students WHERE studentID='$getValidStudentID'");

	while($findValidStudentData = mysqli_fetch_assoc($getValidStudentData)) {
		$studentID = $findValidStudentData['studentID'];
		$studentName = $findValidStudentData['studentName'];
		$studentCourse = $findValidStudentData['studentCourse'];
	}
				
	date_default_timezone_set('Asia/Manila');	
	$time = date('H:i:s');				
	$date = date('Y-m-d');
						
	mysqli_query($database, "INSERT INTO historylogs(studentID, studentName, studentCourse, time, date) VALUES('$studentID', '$studentName', '$studentCourse','$time', '$date')");
?>