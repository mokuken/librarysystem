<?php
	// Connect to the database
	include("connectToDatabase.php");

	// Get the student ID from the AJAX request
	$studentId = $_POST["studentId"];

	// Prepare and execute the DELETE query
	$sql = "DELETE FROM students WHERE id = ?";
	$stmt = $database->prepare($sql);
	$stmt->bind_param("i", $studentId);
	$stmt->execute();

	// Close the statement and database connection
	$stmt->close();
	$database->close();
?>
