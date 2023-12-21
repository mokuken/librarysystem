<?php
	include("../config/connectToDatabase.php");
	$searchTerm = $_POST['searchTerm'];

	$columnNames = ["id", "studentID", "studentName", "studentCourse"];
	$sql = "SELECT " . implode(',', $columnNames) . " FROM students";

	// Filter the results based on the search term
	if ($searchTerm) {
		$sql .= " WHERE studentName LIKE '%$searchTerm%'"; // Replace 'column_name' with the actual column name for search
	}

	include("../config/connectToDatabase.php");
	$result = $database->query($sql);

	// Generate the filtered table content
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
		echo "No matching results found";
	}
	
	$database->close();
?>
