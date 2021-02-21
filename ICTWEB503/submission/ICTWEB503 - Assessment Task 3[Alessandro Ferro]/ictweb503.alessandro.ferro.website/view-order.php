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
?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 5px;
  text-align: left;
}
th {
	background: rgb(158, 64, 64);
	width: 100px;
	max-width: 100%;
}
td {
	width:400px;
	max-width: 100%;
}
</style>
	
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<h1 class="page-header"><?php echo _VIEW_ORDER_HEADER; ?></h1>
					<div class="col-md-12">

			<h3><?php echo _VIEW_ORDER_RECENT_ORDERS ?></h3>
			<br>
		<!-- TABLE -->
			<table class="cart-table account-table table table-bordered">
				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: my-account.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<th><?php echo _VIEW_ORDER_PRODUCT_NAME ?></th>
						<td><a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_QUANTITY ?></th>
						<td><?php echo $orditmr['pquantity']; ?></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_PRICE ?></th>
						<td><?php echo _CURR." ".$orditmr['productprice']*_EX_RATE; ?></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_TOTAL_PRICE ?></th>
						<td><?php echo _CURR." ".($orditmr['pquantity']*$orditmr['productprice'])*_EX_RATE; ?></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_ORDER_TOTAL ?> </th>
						<td><?php echo _CURR." ".$ordr['totalprice']*_EX_RATE; ?></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_STATUS ?></th>
						<td><?php echo $ordr['orderstatus']; ?></td>
					</tr>
					<tr>
						<th><?php echo _VIEW_ORDER_PLACED_ON ?></th>
						<td><?php echo $ordr['timestamp']; ?></td>
					</tr>
				<?php } ?>
			</table>		

			<br>
			<br>
			<br>

			<div class="ma-address">
						<h3><?php echo _VIEW_ORDER_MY_ADDRESS ?></h3>
						<p><?php echo _VIEW_ORDER_ADDRESS_MESSAGE ?></p>

			<div class="row">
				<div class="col-md-6">
								<h4><?php echo _VIEW_ORDER_MY_ADDRESS ?><a href="edit-address.php"><?php _VIEW_ORDER_EDIT ?></a></h4>
					<?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
							echo "<p>".$cr['address1'] ."</p>";
							echo "<p>".$cr['address2'] ."</p>";
							echo "<p>".$cr['city'] ."</p>";
							echo "<p>".$cr['state'] ."</p>";
							echo "<p>".$cr['country'] ."</p>";
							echo "<p>".$cr['company'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p>".$cr['mobile'] ."</p>";
							echo "<p>".$cr['email'] ."</p>";
						}
					?>
				</div>

				<div class="col-md-6">

				</div>
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
