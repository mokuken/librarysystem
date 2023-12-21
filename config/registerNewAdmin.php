<?php
	require 'connectToDatabase.php'; // Connect to the database

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

	$sql = "INSERT INTO admin (name, username, password) VALUES ('$name', '$username', '$password')";
	$result = mysqli_query($database, $sql);

	if ($result) {
		header('Location: ../adminLogin.php'); // Redirect to login page on successful registration
	} else {
		echo 'Registration failed. Please try again.';
	}
?>