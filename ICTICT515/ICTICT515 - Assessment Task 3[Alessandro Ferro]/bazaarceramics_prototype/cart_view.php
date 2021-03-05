<?php include 'includes/header.php'; ?>
<?php include 'includes/item.php'; ?>
<?php include_once 'includes/users.php'; ?>
<?php include_once 'includes/session.php'; ?>
<?php
if(isset($_GET['quantity'])) {
	$qty = $_GET['quantity'];
}
if(isset($_SESSION['cartItems'])) {
	$itemsInCart = $_SESSION['cartItems'];
}

?>
<body>
	<?php include 'includes/navbar.php'; ?> 
	<div class="content-wrapper">
	    <div class="container">
	        <section class="content">
	        	<div class="row">
	        		<div class="col-sm-9">
						<?php include 'cart_body.php';?>
						<?php
							if(isset($_SESSION['user'])){
     							echo "
									<div>
									<button class='checkout-button'>Checkout</button><br><br>
									<p id='checkout-message'></p>
									</div>
   								";
	        				}
							else{
	        					echo "
									<h4 style='margin-top: 2em'>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        					";
							}
						?>
					</div>
				</div>
			</section>     
		</div>
	</div>
<?php include 'includes/footer.php'; ?>
<script>
$(function(){
	$('.checkout-button').click(function(e) {
		$('#checkout-message').text("Checkout method will be implemented once the checkout options will be defined")
	});
});
</script>
</body>
</html>