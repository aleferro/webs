<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php';
include 'inc/nav.php'; ?>

	<!-- CONTENT -->
	<section id="content">
	<div class="content-wrapper">
	    <div class="container">
	      <section class="content about-page">
	        <div class="row">
					<div class="row">
						<h1 class="page-header"><?php echo _ABOUT_US_HEADER; ?></h1>
						<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
						Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui 
						ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, 
						adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
						Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
						consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel 
						illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
					</div>
					<div class="row">
						<img src="admin/uploads/about.jpg" class="img-responsive">
					</div>
	        	</div>
	        </div>
	      </section>
	    </div>
	  </div>
	</section>
<?php include 'inc/footer.php' ?>
