<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; 
$cart = $_SESSION['cart'];
$discount = 0;
if(isset($_SESSION['discount'])) {
	$discount = $_SESSION['discount'];
}
?>
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h1 class="page-header"><?php echo _CART_HEADER; ?></h1>
					</div>
					<!-- COUPON -->
					<div class="space20">
						<form class="" method='post' action='couponprocess.php'>
							<input type="text" name="couponcode" value="" class="s-cart" placeholder="<?php echo _CART_REDEEM_COUPON; ?>" required>
							<button type="submit"><?php echo _CART_COUPON_BTN ?></button>
							<?php
								if(isset($_GET['message']) && !empty($_GET['message'])) {
									if ($_GET['message'] == 1) {
										echo "<span class='alert alert-warning'>Please enter your coupon code</span>";
									} else if($_GET['message'] == 2) {
										echo "<span class='alert alert-warning'>There are no items in your cart</span>";
									} else if($_GET['message'] == 3) {
										echo "<span class='alert alert-danger'>Please enter a valid coupon code</span>";
									} else if($_GET['message'] == 4) {
										echo "<span class='alert alert-danger'>The coupon entered is not valid anymore</span>";
									}else if($_GET['message'] == 5) {
										echo "<span class='alert alert-success'>Discount applied!</span>";
									} else if($_GET['message'] == 6){
										echo "<span class='alert alert-danger'>Coupons cannot be accumulated</span>";
									} else {
										echo "<span class='alert alert-warning'>Your shopping cart is currently empty. No items to checkout</span>";
									}
								}
							?>
						</form>
					</div>
					<div class="col-md-12">
						<table class="cart-table table table-bordered">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th><?php echo _CART_PRODUCT; ?></th>
									<th><?php echo _CART_PRICE; ?></th>
									<th><?php echo _CART_QUANTITY; ?></th>
									<th><?php echo _CART_TOTAL; ?></th>
								</tr>
							</thead>
							<tbody>
							<?php
								if(empty($_SESSION['cart'])){
									echo "<tr><td colspan='6'><b>"._CART_EMPTY."</b></td></tr>";
								}
							?>
							<?php
							$total = 0;
							$secondhand = array();
							$newproducts = array();
								foreach ($cart as $key => $value) {
									$cartsql = "SELECT * FROM products WHERE id=$key";
									$cartres = mysqli_query($connection, $cartsql);
									$cartr = mysqli_fetch_assoc($cartres);
									if($cartr['catid'] == 2) {
										array_push($secondhand, $cartr);
									} else {
										array_push($newproducts, $cartr);
									}
									$total = $total + (($cartr['price']*$value['quantity'])*_EX_RATE);
								}

								foreach ($newproducts as $item) {
							?>
								<tr>
									<td>
										<a class="remove" href="delcart.php?id=<?php echo $item['id']; ?>"><i class="fa fa-times"></i></a>
									</td>
									<td>
										<a href="#"><img src="admin/<?php echo $item['thumb']; ?>" alt="" height="90" width="90"></a>					
									</td>
									<td>
										<a href="single.php?id=<?php echo $item['id']; ?>"><?php echo substr($item['name'], 0 , 30); ?></a>					
									</td>
									<td>
										<span class="amount"><?php echo _CURR." ".$item['price']*_EX_RATE; ?></span>					
									</td>
									<td>
										<div class="quantity"><?php echo $cart[$item['id']]['quantity']; ?></div>
									</td>
									<td>
										<span class="amount"><?php echo _CURR." ".(($item['price']*$cart[$item['id']]['quantity'])*_EX_RATE); ?></span>				
									</td>
								</tr>
							<?php 
								}
						
							if(count($secondhand) > 0) {
								?>
								<table class="cart-table table table-bordered">
									<thead>
									<br><br>
									<h4>Second hand section</h4>
										<tr>
											<th>&nbsp;</th>
											<th>&nbsp;</th>
											<th><?php echo _CART_PRODUCT; ?></th>
											<th><?php echo _CART_PRICE; ?></th>
											<th><?php echo _CART_QUANTITY; ?></th>
											<th><?php echo _CART_TOTAL; ?></th>
										</tr>
									</thead>
									<tbody>
								<?php
								foreach($secondhand as $item) {
									?>
									<tr>
										<td>
											<a class="remove" href="delcart.php?id=<?php echo $item['id']; ?>"><i class="fa fa-times"></i></a>
										</td>
										<td>
											<a href="#"><img src="admin/<?php echo $item['thumb']; ?>" alt="" height="90" width="90"></a>					
										</td>
										<td>
											<a href="single.php?id=<?php echo $item['id']; ?>"><?php echo substr($item['name'], 0 , 30); ?></a>					
										</td>
										<td>
											<span class="amount"><?php echo _CURR." ".$item['price']*_EX_RATE; ?></span>					
										</td>
										<td>
											<div class="quantity"><?php echo $cart[$item['id']]['quantity']; ?></div>
										</td>
										<td>
											<span class="amount"><?php echo _CURR." ".(($item['price']*$cart[$item['id']]['quantity'])*_EX_RATE); ?></span>				
										</td>
									</tr>
									<?php
								}
							}
							?>
							</tbody>
						</table>
						<div class="cart-btn">
							<?php
								if(count($cart) > 0) {
								?>
									<a href="checkout.php" class="button btn-md" style="background: lightgrey" ><?php echo _CART_CHECKOUT; ?></a>
								<?php
								}
							?>
						</div>
						<br><br>
						<div class="cart_totals">
							<div class="col-md-6 push-md-6 no-padding">
								<h4 class="heading"><?php echo _CART_TOTALS; ?></h4>
								<table class="table table-bordered col-md-6">
									<tbody>
										<tr>
											<th><?php echo _CART_SUBTOTAL; ?></th>
											<td><span class="amount"><?php echo _CURR." ".$total; ?></span></td>
										</tr>
										<tr>
											<th><?php echo _CART_SHIPPING; ?></th>
											<td>
												<?php echo _FREE_SHIPPING; ?>				
											</td>
										</tr>
										<tr>
											<th><?php echo _ORDER_TOTAL; if(isset($_SESSION['discount'])) { echo " ("._CART_DISCOUNT_APPLIED.")"; } ?></th>
											<td><strong><span class="amount"><?php echo _CURR." ".($total- ($discount*_EX_RATE)); ?></span></strong> </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>										
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
