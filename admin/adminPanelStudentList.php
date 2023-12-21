<?php
	session_start();

	include("../config/connectToDatabase.php");
	if(!isset($_SESSION['user_id'])) {
		header("location: ../adminLogin.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../styles/adminPanel.css">
	</head>
	<style>
		#confirmation {
			display: none;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.dimBackground {
			background-color: black;
			opacity: 70%;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 100vw;
			height: 100vh;
		}
		.deleteConfimation {
			opacity: 100%;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 400px;
			height: auto;
			background-color: white;
			text-align: center;
			padding: 0 10px 10px 10px;
			border-radius: 15px;
			box-shadow: 0px 0px 5px 1px black;
		}
		
		.deleteConfimation button {
			font-size: 30px;
			width: 100px;
		}
	</style>
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
					<a class="active">Student List</a>
					<a href="../admin/adminPanelAddStudent.php">Add Student</a>
					<a href="../config/clearVisit.php">Logout</a>
				</div>
			</div>
			<div class="column">
				<div class="container">
					<form id="searchForm" action="search.php" method="post">
						<input type="text" id="searchTerm" name="searchTerm" placeholder="Enter a Name">
						<input type="submit" value="Search">
					</form>	
					<div class="historyList" id="historyList">
						<?php
							include("../config/studentList.php");
						?>
					</div>
				</div>
			</div>
		</div>
			<div id="confirmation">
				<div class="dimBackground"></div>
				<div class="deleteConfimation">
					<h2>Are you sure you want to delete this student?</h2>
					<button onclick="handleYes()">Yes</button>
					<button onclick="handleNo()">No</button>
				</div>
			</div>
		<script>
			const searchForm = document.getElementById('searchForm');
			searchForm.addEventListener('submit', (event) => {
				event.preventDefault();
				const searchTerm = document.getElementById('searchTerm').value;

				// Send the search term to the PHP script using AJAX
				const xhr = new XMLHttpRequest();
				xhr.open('POST', 'search.php');
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.onload = () => {
					if (xhr.status === 200) {
						// Replace the table content with the filtered results
						const filteredResults = xhr.responseText;
						const tableContainer = document.getElementById('historyList');
						tableContainer.innerHTML = filteredResults;
					} else {
						console.error('An error occurred while searching');
					}
				};
				xhr.send('searchTerm=' + searchTerm);
			});
				
			let idToDelete;
			function showConfirm(studentId) {
				document.getElementById("confirmation").style.display = "block";
				idToDelete = studentId;
			}
			
			function handleYes() {
				// Perform an AJAX request to delete the student record with the specified ID
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "../config/deleteStudent.php");
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhr.send("studentId=" + idToDelete);

				// Upon successful deletion, remove the corresponding table row
				xhr.onload = function() {
					if (xhr.status === 200) {
						location.reload();
					} else {
						alert("Failed to delete student.");
					}
				};
			}
			
			function handleNo() {
				document.getElementById("confirmation").style.display = "none";
			}
		</script>
	</body>
</html>
