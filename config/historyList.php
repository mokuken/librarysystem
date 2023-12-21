<?php
	include("connectToDatabase.php");
	
	$sql = "SELECT * FROM historyLogs ORDER BY id DESC";

	$result = $database->query($sql);

	if ($result->num_rows > 0) {
		echo "<table style='width: 100%;'>";
		echo "<tr>";

		// Get the field names from the first row
		$fields = $result->fetch_fields();
		foreach ($fields as $field) {
			echo "<th>" . $field->name . "</th>";
		}
		echo "</tr>";

		// Fetch each row of data and print its contents
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			foreach ($row as $key => $value) {
				echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No data found in table";
	}

	$database->close();


?>