<?php 
ob_start();
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; 
if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
	$prodsql = "SELECT * FROM products WHERE id=$id";
	$prodres = mysqli_query($connection, $prodsql);
	$prodr = mysqli_fetch_assoc($prodres);
}else{
	header('location: index.php');
}

$uid = $_SESSION['customerid'];
if(isset($_POST) & !empty($_POST)){
	
	$review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

	$revsql = "INSERT INTO reviews (pid, uid, review) VALUES ($id, $uid, '$review')";
	$revres = mysqli_query($connection, $revsql);
	if($revres){
		$smsg = "Review Submitted Successfully";
	}else{
		$fmsg = "Failed to Submit Review";
	}
}

?>
	
	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<h1 class="page-header"><?php echo _SINGLE_HEADER; ?></h1><br><br>
					<div class="col-md-10 col-md-offset-1">
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?><br><br>
			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?><br><br>
					<div class="row">
						<div class="col-md-5">
							<div class="gal-wrap">
								<div id="gal-slider" class="flexslider">
									<ul class="slides">
										<li><img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/></li>
									</ul>
								</div>
								<ul class="gal-nav">
									<li>
										<div>
											<img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/>
										</div>
									</li>
								</ul>
								<div class="clearfix"></div>
							
							</div>
						</div>
						<div class="col-md-7 product-single">
							<h2 class="product-single-title no-margin"><?php echo $prodr['name']; ?></h2>
							<div class="space10"></div>
							<div class="p-price"> <?php echo _CURR." ".$prodr['price']*_EX_RATE; ?></div>
							<p><?php echo $prodr['description']; ?></p>
							<form method="get" action="addtocart.php">
							<div class="product-quantity">
								<span><?php echo _SINGLE_QUANTITY ?>:</span> 
									<input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
									<input type="text" name="quant" placeholder="1">
							</div>
							<div class="shop-btn-wrap">
								<input type="submit" class="button btn-small" value=<?php echo _SINGLE_ADD; ?>>
							</div>
							</form>
							<a href="addtowishlist.php?id=<?php echo $prodr['id']; ?>"><?php echo _ADD_TO_WISHLIST ?></a>
							<div class="product-meta">
								<span><?php echo _SINGLE_CATEGORIES; ?>: 
								<?php 
								$prodcatsql = "SELECT * FROM category WHERE id={$prodr['catid']}"; 
								$prodcatres = mysqli_query($connection, $prodcatsql);
								$prodcatr = mysqli_fetch_assoc($prodcatres);
								?>
								<a href="#"><?php echo $prodcatr['name']; ?></a></span><br>
							</div>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab"><?php echo _SINGLE_OVERVIEW; ?></a>
								</li>
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab"><?php echo _SINGLE_REVIEWS; ?></a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $prodr['description']; ?></p>
							</div>
							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$id";
									$revcountres = mysqli_query($connection, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> <?php echo _SINGLE_REVIEWS_FOR; ?> <?php echo substr($prodr['name'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.firstname, u.lastname, r.`timestamp`, r.review FROM reviews r JOIN usersmeta u WHERE r.uid=u.uid AND r.pid=$id";
										$selrevres = mysqli_query($connection, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/quote/1.jpg" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($connection, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 1){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20"><?php _SINGLE_ADD_REVIEW; ?></h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u1.firstname, u1.lastname FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
										$userres = mysqli_query($connection, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['firstname'] . " " . $userr['lastname'];?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										<?php echo _SINGLE_SUBMIT_REVIEW; ?>
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div>
					<div class="space30"></div>
					<div class="related-products">
						<h4 class="heading"><?php echo _SINGLE_RELATED_PRODUCTS; ?></h4>
						<hr>
						<div class="row">
							<div id="shop-mason" class="shop-mason-3col">

							<?php
								$relsql = "SELECT * FROM products WHERE id != $id ORDER BY rand() LIMIT 3";
								$relres = mysqli_query($connection, $relsql);
								while($relr = mysqli_fetch_assoc($relres)){
							 ?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/<?php echo $relr['thumb']; ?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
												<a href="single.php?id=<?php echo $relr['id']; ?>" class="fa fa-link"></a>
												<a href="#" class="fa fa-shopping-cart"></a>
												</span>					
											</div>
										</div>
										<div class="rating">
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
										</div>
										<h2 class="product-title"><a href="#"><?php echo $relr['name']; ?></a></h2>
										<div class="product-price"><?php echo _CURR." ".$relr['price']*_EX_RATE; ?>/-<span></span></div>
									</div>
								</div>
							<?php } ?>
							</div>
					
						</div>
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
