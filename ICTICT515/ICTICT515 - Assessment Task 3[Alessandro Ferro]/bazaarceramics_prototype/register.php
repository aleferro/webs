<?php
	include 'includes/users.php';
	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password; // Use only for prototyping purposes.

		if(!isset($_SESSION['users'])) {
			$_SESSION['users'] = $users;
		}

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
		}
		else{
			$success = true;
			foreach($_SESSION['users'] as $user) {
				if($email == $user->email) {
					$success = false;
				}
			}
			
			if(!$success) {
				$_SESSION['error'] = 'Email already taken';
			} else {
				$new_user = new User('images/no-picture.png', $firstname, $lastname, $email, $password);
				array_push($_SESSION['users'], $new_user);
				$_SESSION['success'] = 'Account created.';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
	}
	header('location: signup.php');
?>