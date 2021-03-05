<?php
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
?>