<?php
	include("../config/connectToDatabase.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../styles/adminLogin.css">
	</head>
	<body>
		<div class="sidebox">
			<a href="#" class="active">
				<img src = "svg/user-plus.svg" alt="add a user"/>
			</a>
			<a href="#">
				<img src = "svg/identification.svg" alt="info"/>
			</a>
			<a href="#">
				<img src = "svg/adjustments-horizontal.svg" alt="admin panel"/>
			</a>
		</div>
		
		<div class="card">
			<div class="column">
				<div class="container">

				</div>
			</div>
			<div class="column">
				<div class="container">
					<form action="registerNewAdmin.php" method="post" class="idInput">
					
						<label><h1>Register Admin</h1></label>
						<input type="text" id="name" name="name" placeholder="full name" required>
						<input type="text" name="username" placeholder="username" required id="studentID">
						<input type="password" id="password" name="password" placeholder="password" required>
						
						<input class="submit" type="submit" name="submit" value="register" required>
					</form>	
				</div>
			</div>
		</div>
	</body>
</html>
