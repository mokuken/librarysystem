<?php
	date_default_timezone_set('Asia/Manila');	
	$date = date('Y-m-d');
							
	$countTodayVisits = "SELECT COUNT(*) AS visits FROM historylogs WHERE date = '$date'";
	$totalTodayVisits = $database->query($countTodayVisits);

	if ($totalTodayVisits->num_rows > 0) {
		$row = $totalTodayVisits->fetch_assoc();
		$todayVisits = $row['visits'];
	} else {
		echo "No results found";
	}

	$countTotalVisits = "SELECT COUNT(*) FROM historylogs";
	$totalTotalVisits = mysqli_query($database, $countTotalVisits);
	$totalVisits = mysqli_fetch_row($totalTotalVisits)[0];
	
	$database->close();
?>