<?php include 'inc/header.php'; ?>
<?php include 'inc/navbar.php'; ?>

	 
<div class="container-fluid">
	<br>
	    <?php
			$conn = $pdo->open();

	       	$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE productName LIKE :keyword");
	       	$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       	$row = $stmt->fetch();
	       	if($row['numrows'] < 1){
	       		echo "<h1 class='d-flex justify-content-center display-5'>No results found for &nbsp <i>".$_POST['keyword']."</i></h1>";
	    	}
			else{
	       		echo "<h1 class='d-flex justify-content-center display-5'>Search results for &nbsp <i>".$_POST['keyword']."</i></h1>";
				try{
		       		$inc = 3;	
					$stmt = $conn->prepare("SELECT * FROM products WHERE productName LIKE :keyword");
				    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);

					foreach ($stmt as $row) {
						$image = (!empty($row['productImage'])) ? $row['productImage'] : 'img/noimage.jpg';
						$productPrice = $row['price'];
						$inc = ($inc == 3) ? 1 : $inc + 1;
						if($inc == 1) echo "<div class='row justify-content-center' style='margin-bottom:3%;'>";
							echo "
						   	    <div class='col-sm-3'>
									<div class='card'>
										<div class='card-body'>
											<h5 class='card-title'>".$row['productName']."</h5>
											<img class='card-img-top' src='".$image."' alt='Card image cap'>
											<p class='card-text'>$".$productPrice."</p>
											<a href='product-details.php?product=".$row['productId']."' class='btn btn-primary'>View Details</a>
								   		</div>
							 		</div>
						   		</div>
						 	";
						if($inc == 3) echo "</div>";
					}
							
				}
				catch(PDOException $e){
					echo "There is some problem in connection: " . $e->getMessage();
				}
			}

		$pdo->close();

	?> 
</div>
<?php
include "inc/footer.php";
?>