<?php
	
	$username ="root";
	$password ="";
	$databaseName = "librarysystem";
	
	$database = mysqli_connect("localhost", $username, $password, $databaseName) or die("unable to connect");

?>