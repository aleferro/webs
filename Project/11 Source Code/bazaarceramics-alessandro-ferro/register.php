<?php
	include 'inc/session.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		if($password != $repassword){
			$_SESSION['error'] = '**Passwords did not match**';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = '**Email already taken**';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (firstName, lastName, role, email, password) VALUES (:firstName, :lastName, :role, :email, :password)");
					$stmt->execute(['firstName'=>$firstname, 'lastName'=>$lastname, 'role'=>"customer", 'email'=>$email, 'password'=>$password]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$_POST['password']."</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/bazaarceramics-alessandro-ferro/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					";

					//Load phpmailer
		    		require 'PHPMailer-master/src/Exception.php';
					require 'PHPMailer-master/src/PHPMailer.php';

					//PHPMailer Object
					$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
					try {
						//From email address and name
						$mail->From = "bazaar@ceramics.com"; // example!!! It won't work
						$mail->FromName = $userName;

						//Recipients
						$mail->addAddress($email);              
						$mail->addReplyTo('testsourcecodester@gmail.com');

						//Content
						$mail->isHTML(true);                                  
						$mail->Subject = 'Bazaar Ceramics Sign Up';
						$mail->Body    = $message;

						unset($_SESSION['firstname']);
						unset($_SESSION['lastname']);
						unset($_SESSION['email']);

						$_SESSION['success'] = '**Account created. Proceed to login**';
						header('location: signup.php');

			    	} 
			    	catch (Exception $e) {
			        	$_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			        	header('location: signup.php');
			    	}

				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>