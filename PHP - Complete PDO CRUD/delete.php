<?php
	if(ISSET($_GET['id'])){
		require_once 'conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `user` WHERE `user_id`='$id'");
		$sql->execute();
		header('location:index.php');
	}
?>