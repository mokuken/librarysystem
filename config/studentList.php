<?php
	include("connectToDatabase.php");
	
	$columnNames = ["id", "studentID", "studentName", "studentCourse"];
	$sql = "SELECT " . implode(',', $columnNames) . " FROM students ORDER BY id DESC";

	$result = $database->query($sql);

	if ($result->num_rows > 0) {
		echo "<table style='width: 100%;'>";
		echo "<tr>";

		// Get the field names from the first row
		$fields = $result->fetch_fields();
		foreach ($fields as $field) {
			echo "<th>" . $field->name . "</th>";
		}
		echo "<th></th>";
		echo "</tr>";

		// Fetch each row of data and print its contents
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			foreach ($row as $key => $value) {
				echo "<td>" . $value . "</td>";
			}
			
			$studentIdToDelete = $row["id"];
			echo "<td><button style='width: 100%' onclick='showConfirm($studentIdToDelete)'>Delete</button></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No data found in table";
	}

	$database->close();


?>