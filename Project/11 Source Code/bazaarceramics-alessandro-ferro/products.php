<?php
include "inc/header.php";
include "inc/navbar.php";
?>

<?php

	if(!isset($_GET['category'])) {
		$description = "homeware";
	}
	else {
		$description = $_GET['category'];
	}
	
	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM categories WHERE description = :description");
		$stmt->execute(['description' => $description]);
		$cat = $stmt->fetch();
		$catid = $cat['categoryId'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>


<?php
$viewDetails = "Go to Details";
?>
<div class="container-fluid bottom-20">
<h1 class="d-flex justify-content-center display-5">Catalogue</h1>
<br>


<?php     			
	$conn = $pdo->open();

	try{
	   	$inc = 3;	
			$stmt = $conn->prepare("SELECT * FROM products WHERE categoryId = :catid");
			$stmt->execute(['catid' => $catid]);
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
								<a href='product-details.php?product=".$row['productId']."' class='btn btn-primary'>".$viewDetails."</a>
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

		$pdo->close();
?> 
</div>
</div>
<?php
include "inc/footer.php";
?>