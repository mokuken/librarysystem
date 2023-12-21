<?php
	require 'connectToDatabase.php'; // Connect to the database

	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE username='$username'";
		$result = mysqli_query($database, $sql);

		if (mysqli_num_rows($result) > 0) { // Check if username exists
			$user = mysqli_fetch_assoc($result);

			if (password_verify($password, $user['password'])) { // Verify password
				session_start(); // Start a session
				$_SESSION['user_id'] = $user['id'];
				header('Location: admin/adminPanelHistory.php'); // Redirect to protected page
			} else {
				$incPassText = "Incorrect password.";
				$incPassStyle = "font-weight: bold;color: #ff6a6a;";
				$incPass = "<p style='$incPassStyle'>$incPassText</p>";
			}
		} else {
			$userNtFndText = "Username not found.";
			$userNtFndStyle = "font-weight: bold;color: #ff6a6a;";
			$userNtFnd = "<p style='$userNtFndStyle'>$userNtFndText</p>";
		}
	} else {
		$userNtFnd = '<! -- Just Blank -->';
	}
  
	if(!empty($userNtFnd)) {
		$notice = $userNtFnd;
	} else {
		$notice = $incPass;	
	}
	
	$database->close();
?>
