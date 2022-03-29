<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$user_id = $_POST['user_id'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `user`SET `firstname` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>