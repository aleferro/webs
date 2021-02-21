<?php
	include "currencies.php";
?>
<?php
// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])) {
 $_SESSION['lang'] = $_GET['lang'];

    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if(isset($_SESSION['lang'])) {
    include "lang-".$_SESSION['lang'].".php";
   } else {
    include "lang-en.php";
}

?>

<div class="menu-wrap">
		<!-- MENU -->
  			<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
	  				<li>
						<a width="65" height="65" href="index.php"><img class="tool-logo" src="logored.jpg"></a>
	  				</li>
				<!-- HOME -->
      				<li>
						<a href="index.php">Home</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
		  				<ul>
	        				<li><a href="about-us.php"><?php echo _ABOUT_US; ?></a></li>
		    				<li><a href="products-services.php"><?php echo _PRODUCTS_AND_SERVICES; ?></a></li>
		    				<li><a href="contact-us.php"><?php echo _CONTACT_US; ?></a></li>
		  				</ul>
	  				</li>
				<!-- CATEGORIES -->
	  				<li>
						<a href="#"><?php echo _CATEGORIES; ?></a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<?php
								$catsql = "SELECT * FROM category";
								$catres = mysqli_query($connection, $catsql);
								while($catr = mysqli_fetch_assoc($catres)){
							?>
		  					<li><a href="index.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
		  					<?php } ?>
						</ul>
	  				</li>
				<!-- ACCOUNT -->
	  				<li>
						<a href="#"><?php echo _ACCOUNT; ?></a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="my-account.php"><?php echo _MY_ACCOUNT; ?></a></li>
							<li><a href="wishlist.php"><?php echo _WISH_LIST; ?></a></li>
							<?php
								if(isset($_SESSION['customer'])) { echo "<li><a href='logout.php'>"?><?php echo _LOGOUT; ?><?php echo "</a></li>";	}
								else { echo "<li><a href='login.php'>Login</a></li>"; }
							?>
						</ul>
	  				</li>
				<!-- LANGUAGES -->
					<li>
						<a href="#"><?php echo _LANGUAGES; ?></a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="?lang=en" ><?php echo _LANG_EN; ?><img src="admin/uploads/lang-en.jpg" width="25" style="margin-left: 15px" ></a></li>
							<li><a href="?lang=it"><?php echo _LANG_IT; ?><img src="admin/uploads/lang-it.jpg" width="25" style="margin-left: 15px" ></a></li>
						</ul>
	  				</li>
				<!-- CURRENCIES -->
					<li>
						<a href="#"><?php echo _CURRENCIES; ?></a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="?currency=AUD" ><?php echo "AUD"; ?></a></li>
							<li><a href="?currency=USD"><?php echo "USD"; ?></a></li>
							<li><a href="?currency=EUR"><?php echo "EUR"; ?></a></li>
						</ul>
	  				</li>
				</ul>
  			</div>
  		<!-- CART-->
			<?php if(isset($_SESSION['cart'])){ ?> <!-- & !empty($_SESSION['cart']) -->
			<div class="header-xtra">
				<?php $cart = $_SESSION['cart']; ?>
				<div class="s-cart">
					<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em>
						<?php	echo count($cart); ?></em>
					</div>
					<div class="cart-info">
						<small><?php echo _YOU_HAVE; ?> <em class="highlight">
						<?php echo count($cart); ?> <?php echo _ITEMS; ?></em> <?php echo _IN_SHOPPING_CART; ?></small>
						<br><br>
						<?php
							$total = 0;
							$counter = 1;
							foreach ($cart as $key => $value) {
								$navcartsql = "SELECT * FROM products WHERE id=$key";
								$navcartres = mysqli_query($connection, $navcartsql);
								$navcartr = mysqli_fetch_assoc($navcartres);
								if($counter <= count($cart) && $counter < 4) {

								
						?>
						<div class="ci-item">
							<img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
							<div class="ci-item-info">
								<h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0 , 20); ?></a></h5>
								<p><?php echo $value['quantity']; ?> x <?php echo " "._CURR." ".$navcartr['price']*_EX_RATE; ?></p>
								<div class="ci-edit">
									<a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
								</div>
							</div>
							<?php 
								}
								$counter++;
								$total = $total + (($navcartr['price']*$value['quantity'])*_EX_RATE);
							}
							if(count($cart) >= 4) {
								echo "<br><p><em>And more...</em></p>";
							}
							?>
							<div class="ci-total"><?php echo _SUBTOTAL; ?>: <?php echo " "._CURR." ".$total; ?></div>
								<div class="cart-btn">
									<a href="cart.php"><?php echo _VIEW_CART; ?></a>
									<a href="checkout.php"><?php echo _CHECKOUT; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
<?php } ?>