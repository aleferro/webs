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
	
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<h1 class="page-header"><?php echo _ACCOUNT_DETAILS; ?></h1><br><br>
					<div class="col-md-12">

			<h3><?php echo _ORDERS; ?></h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th><?php echo _ORDER; ?></th>
						<th><?php echo _DATE; ?></th>
						<th><?php echo _STATUS; ?></th>
						<th><?php echo _PAYMENT_METHOD; ?></th>
						<th><?php echo _TOTAL; ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['uid']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							<?php echo _CURR." ".$ordr['totalprice']*_EX_RATE; ?>
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $ordr['id']; ?>"><?php echo _VIEW; ?></a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="cancel-order.php?id=<?php echo $ordr['id']; ?>"><?php echo _CANCEL; ?></a>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			<div class="ma-address">
						<h3><?php echo _MY_ADDRESSES; ?></h3>
						<p><?php echo _ADDRESSES_MESSAGE; ?></p>

			<div class="row">
				<div class="col-md-6">
								<h4><?php echo _MY_ADDRESS; ?><a href="edit-address.php"><?php echo _EDIT; ?></a></h4>
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
