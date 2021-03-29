<?php
	include 'inc/session.php';

	$conn = $pdo->open();

    $productId = $_GET['product'];

	if(isset($_SESSION['customer'])){
		try{
			$stmt = $conn->prepare("DELETE FROM item_cart WHERE itemId=:productId");
			$stmt->execute(['productId'=>$productId]);
			header('location: shopping-cart.php');
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['productId'] == $productId){
				unset($_SESSION['cart'][$key]);
			}
		}
		header('location: shopping-cart.php');
	}

	$pdo->close();

?>