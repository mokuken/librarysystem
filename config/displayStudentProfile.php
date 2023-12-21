<?php
	$getStudentProfile = mysqli_query($database, "SELECT * FROM students WHERE studentID='$studentID'");

	while($findStudentProfile = mysqli_fetch_assoc($getStudentProfile)) {
		$studentProfile = $findStudentProfile["studentProfile"];

		$displayStudentProfile = '<img class="profile" src="data:image/jpeg;base64,' . base64_encode($studentProfile) . '" alt="profile" id="profile">';
	}
?>