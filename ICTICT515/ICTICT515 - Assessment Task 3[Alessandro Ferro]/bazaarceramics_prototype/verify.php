<?php
	require_once 'includes/users.php';

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		$this_user;
		foreach($_SESSION['users'] as $user) {
			if($user->email == $email) {
				$this_user = $user;
			}
		}

		if(isset($this_user)) {
			if($this_user->password == $password) {
				if($this_user->email == "admin@admin.com") {
					$_SESSION['admin'] = $this_user;
					$_SESSION['success'] = "Welcome Admin";
					header('location: admin_home.php');
				} else {
					$_SESSION['user'] = $this_user;
					$_SESSION['success'] = "Welcome ".$this_user->first_name;
					header('location: cart_view.php');
				}
			} else {
				$_SESSION['error'] = "Incorrect password";
				header('location: login.php');
			}
		} else {
			$_SESSION['error'] = "Email not found";
			header('location: login.php');
		}
	}
?>