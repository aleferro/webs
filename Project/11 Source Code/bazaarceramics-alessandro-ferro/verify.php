<?php
	include 'inc/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();

			if($row['numrows'] > 0){
				if(password_verify($password, $row['password'])){
					if($row['role']=="admin"){
						$_SESSION['admin'] = $row['userId'];
						header("location: admin/admin-dash.php");
					}
					else{
						$_SESSION['customer'] = $row['userId'];
						$_SESSION['success'] = "**Login Successfull**";
						if(isset($_SESSION['cart'])) {
							$stmt = $conn->prepare("SELECT itemId, quantity FROM item_cart WHERE userId =:userid");
							$stmt->execute(['userid'=>$_SESSION['customer']]);
							$exist = array();

							foreach($stmt as $row) {
								foreach($_SESSION['cart'] as $sRow) {
									if($row['itemId'] == $sRow['productId']) {
										$newQuantity = $row['quantity'] + $sRow['quantity'];
										$stmt2 = $conn->prepare("UPDATE item_cart SET quantity=:qty WHERE itemId=:prodId");
										$stmt2->execute(['qty'=>$newQuantity, 'prodId'=>$row['itemId']]);
										array_push($exist, $row['itemId']);
									}
								}
							}
							foreach($_SESSION['cart'] as $row) {
								if(!in_array($row['productId'], $exist)) {
									$stmt3 = $conn->prepare("INSERT INTO item_cart (userId, itemId, quantity) VALUES (:user_id, :product_id, :quantity)");
									$stmt3->execute(['user_id'=>$_SESSION['customer'], 'product_id'=>$row['productId'], 'quantity'=>$row['quantity']]);
								}
							}
							unset($_SESSION['cart']);
						}

						header('location: shopping-cart.php');
					}
				}
				else{
						$_SESSION['error'] = '**Incorrect Password**';
						header('location: login.php');
				}
			}
			else{
				$_SESSION['error'] = '**Email not found**';
				header('location: login.php');
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = '**Input login credentails first**';
		header('location: login.php');
	}

	$pdo->close();

?>