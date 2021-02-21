<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php';
include 'inc/nav.php'; ?>

	<!-- CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<h1 class="page-header"><?php echo _WHAT_WE_DO; ?></h1>
					
					<div class="about-section paddingTB60">
		                <div class="container">
							<div class="row">
								<div class="prod-serv">
									<ul style="display:inline-block; ">
										<li><img src="admin/uploads/prod-serv-1.jpg" style="height:150px; margin: 10px 100px"></li>
										<li><h4><?php echo _WE_EDUCATE; ?></h4></li>
									</ul>
									<ul style="display:inline-block; ">
										<li><img src="admin/uploads/prod-serv-2.jpg" style="height:150px; margin: 10px 100px"></li>
										<li><h4><?php echo _WE_CONNECT; ?></h4></li>
									</ul>
									<ul style="display:inline-block; ">
										<li><img src="admin/uploads/prod-serv-3.jpg" style="height:150px; margin: 10px 100px"></li>
										<li><h4><?php echo _WE_DELIVER; ?></h4></li>
									</ul>
								</div>
								
							</div>
		                </div>
		            </div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
