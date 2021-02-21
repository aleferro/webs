<?php
	session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['customer']);
	if(isset($_SESSION['discount'])) { unset($_SESSION['discount']); }
	header('location: login.php');
?>