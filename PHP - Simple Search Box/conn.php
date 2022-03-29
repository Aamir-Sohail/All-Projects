<?php
	$conn = mysqli_connect('localhost', 'root', '', 'db_box') or die(mysqli_error());
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>