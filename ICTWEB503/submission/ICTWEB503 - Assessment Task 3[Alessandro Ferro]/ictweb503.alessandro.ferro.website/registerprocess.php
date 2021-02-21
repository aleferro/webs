<?php 
session_start();
require_once 'config/connect.php'; 

if(isset($_POST) & !empty($_POST)){

	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['password'];
	$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

	$result = mysqli_query($connection, $sql);

	if($result){
		$_SESSION['customer'] = $email;
		$_SESSION['customerid'] = mysqli_insert_id($connection);
		$_SESSION['cart'] = array();
		header("location: index.php");
	} else {
		header("location: login.php?message=2");
	}

}

?>