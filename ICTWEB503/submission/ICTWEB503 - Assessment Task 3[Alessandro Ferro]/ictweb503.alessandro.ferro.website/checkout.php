<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}
include 'inc/header.php'; 
include 'inc/nav.php'; 
$uid = $_SESSION['customerid'];

if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];

	if(count($cart) == 0) {
		header("location: cart.php?message=7");
	}
} else {
	header("location: login.php");
}

if(isset($_SESSION['discount'])) {
	$discount = $_SESSION['discount'];
} else {
	$discount = 0;
}


if(isset($_POST['agree']) & !empty($_POST['agree'])){
	if($_POST['agree'] == true){
		$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
		$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
		$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);

		$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);
		if($count == 1){
			//update data in usersmeta table
			$usql = "UPDATE usersmeta SET country='$country', firstname='$fname', lastname='$lname', address1='$address1', address2='$address2', city='$city', state='$state',  zip='$zip', company='$company', mobile='$phone' WHERE uid=$uid";
			$ures = mysqli_query($connection, $usql) or die(mysqli_error($connection));
			if($ures){

				$total = 0;
				foreach ($cart as $key => $value) {
					$ordsql = "SELECT * FROM products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + (($ordr['price']*$value['quantity'])*_EX_RATE);
				}

				$total -= $discount;
				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						$ordsql = "SELECT * FROM products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
					}
				}
				// unset($_SESSION['cart']);
				$_SESSION['cart'] = array();
				if(isset($_SESSION['discount'])) { unset($_SESSION['discount']); }
				header("location: my-account.php");
			}
		}else{
			$isql = "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
			$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					$ordsql = "SELECT * FROM products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}
				$total -= $discount;
				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						$ordsql = "SELECT * FROM products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
					}
				}
				// unset($_SESSION['cart']);
				$_SESSION['cart'] = array();
				if(isset($_SESSION['discount'])) { unset($_SESSION['discount']); }
				header("location: my-account.php");
			}

		}
	}

}

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>

	
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<h1 class="page-header"><?php echo _CHECKOUT_HEADER; ?></h1><br><br>
			<form method="post">
			<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="billing-details">
									<h3 class="uppercase"><?php echo _CHECKOUT_BILLING_DETAILS; ?></h3>
									<div class="space30"></div>
										<label class=""><?php echo _CHECKOUT_COUNTRY; ?> </label>
										<select name="country" class="form-control">
											<option value=""><?php echo _CHECKOUT_SELECT_COUNTRY; ?></option>
											<option value="AX">Aland Islands</option>
											<option value="AF">Afghanistan</option>
											<option value="AL">Albania</option>
											<option value="DZ">Algeria</option>
											<option value="AD">Andorra</option>
											<option value="AO">Angola</option>
											<option value="AI">Anguilla</option>
											<option value="AQ">Antarctica</option>
											<option value="AG">Antigua and Barbuda</option>
											<option value="AR">Argentina</option>
											<option value="AM">Armenia</option>
											<option value="AW">Aruba</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
											<option value="AZ">Azerbaijan</option>
											<option value="BS">Bahamas</option>
											<option value="BH">Bahrain</option>
											<option value="BD">Bangladesh</option>
											<option value="BB">Barbados</option>
										</select>
										<div class="clearfix space20"></div>
										<div class="row">
											<div class="col-md-6">
												<label><?php echo _CHECKOUT_FIRST_NAME; ?> </label>
												<input name="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($fname)){ echo $fname; } ?>" type="text">
											</div>
											<div class="col-md-6">
												<label><?php echo _CHECKOUT_LAST_NAME; ?> </label>
												<input name="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>" type="text">
											</div>
										</div>
										<div class="clearfix space20"></div>
										<label><?php echo _CHECKOUT_COMPANY; ?></label>
										<input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>" type="text">
										<div class="clearfix space20"></div>
										<label><?php echo _CHECKOUT_ADDRESS; ?> </label>
										<input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; } elseif(isset($address1)){ echo $address1; } ?>" type="text">
										<div class="clearfix space20"></div>
										<input name="address2" class="form-control" placeholder=<?php echo _CHECKOUT_ADDRESS_PLACEHOLDER; ?> value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2; } ?>" type="text">
										<div class="clearfix space20"></div>
										<div class="row">
											<div class="col-md-4">
												<label><?php echo _CHECKOUT_CITY; ?> </label>
												<input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
											</div>
											<div class="col-md-4">
												<label><?php echo _CHECKOUT_STATE; ?></label>
												<input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>" placeholder="State" type="text">
											</div>
											<div class="col-md-4">
												<label><?php echo _CHECKOUT_POSTCODE; ?> </label>
												<input name="zipcode" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zip)){ echo $zip; } ?>" type="text">
											</div>
										</div>
										<div class="clearfix space20"></div>
										<label><?php echo _CHECKOUT_PHONE; ?> </label>
										<input name="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['mobile'])){ echo $r['mobile']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">	
								</div>
							</div>
						</div>
						<div class="space30"></div>
						<div class="clearfix space30"></div>
						<h4 class="heading"><?php echo _CHECKOUT_PAYMENT; ?></h4>
						<div class="clearfix space20"></div>
						
						<div class="payment-method">
							<div class="row">
								
			<!-- // Design 3 payment methods -->
									<div class="col-md-4">
										<input name="payment" id="radio1" class="css-checkbox" type="radio" value="Paypal"><span><?php echo _PAYPAL; ?></span>
									</div>
									<div class="col-md-4">
										<input name="payment" id="radio2" class="css-checkbox" type="radio" value="Card"><span><?php echo _CARD; ?></span>
									</div>
									<div class="col-md-4">
										<input name="payment" id="radio3" class="css-checkbox" type="radio" value="Afterpay"><span><?php echo _AFTERPAY; ?></span>
									</div>
								
								</div>
								<div class="space30"></div>							
									<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span><?php echo _READ_AND_ACCEPT; ?> <a href="#"><?php echo _TERMS; ?> &amp; <?php echo _CONDITIONS; ?></a></span>
							<div class="space30"></div>
							<input type="submit" class="button btn-lg" value=<?php echo _PAY_NOW ?>>
						</div>
					</div>		
			</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
